<div>
    <x-admin.subheader title="سفارش" :mode="$mode" :createAble="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="سفارش" :mode="$mode">
                <div class="form-group col-6">
                    <div class="row">
                        <x-admin.forms.header title="اطلاعات کاربر"/>
                        <div class="form-group col-12">
                            <p>نام : {{$model->name ?? ''}}</p>
                        </div>
                        <div class="form-group col-12">
                            <p>نام خانوادگی : {{$model->family ?? ''}}</p>
                        </div>
                        <div class="form-group col-12">
                            <p>موبایل : {{$model->mobile ?? ''}}</p>
                        </div>
                        <div class="form-group col-12">
                            <p>ایمیل : {{$model->email ?? ''}}</p>
                        </div>
                        <div class="form-group col-12">
                            <p>توضیحات : {{$model->description ?? ''}}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group col-6">
                    <div class="row">
                        <x-admin.forms.header title="اطلاعات پرداخت"/>
                        <div class="form-group col-12">
                            <p>مجموع : {{number_format($model->price ?? 0)}} تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>تخفیف : {{number_format($model->discount ?? 0)}} تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>کیف پول : {{number_format($model->wallet_pay ?? 0)}} تومان</p>
                        </div>
                        <div class="form-group col-12">
                            <p>پرداخت شده : {{number_format($model->total_price ?? 0)}} تومان</p>
                        </div>
                    </div>
                </div>
                <x-admin.forms.dropdown id="type" label="وضعیت سفارش" :options="[
            \App\Models\Order::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
            \App\Models\Order::STATUS_SPEED_PLUS => 'اسپید پلاس',
            \App\Models\Order::STATUS_DELAY => 'تاخیر در انجام',
            \App\Models\Order::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
            \App\Models\Order::STATUS_STORE => 'درحال آماده سازی در انبار',
            \App\Models\Order::STATUS_FAILED => 'در حال بررسی توسط مشتری',
            \App\Models\Order::STATUS_POST => 'ارسال توسط پست',
            \App\Models\Order::STATUS_CANCELLED => 'لغو شده - پرداخت نشده',
            \App\Models\Order::STATUS_REFUNDED => 'مسترد شده',
            \App\Models\Order::STATUS_COMPLETED => 'تکمیل شده',
			 \App\Models\Order::STATUS_BREAKED => 'لغو شده',
        ]" required="true" wire:model.defer="orderStatus"/>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="محصولات"/>

                @foreach($model->details ?? [] as $item)
                    <div class="form-group col-3 p-3 bg-secondary">
                        #{{iteration($loop, $perPage)}}
                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        نام : {{$item->product->title}}
                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        تعداد : {{$item->quantity}}
                    </div>
                    <div class="form-group col-3 p-3 bg-secondary">
                        مبلغ :{{number_format($item->price)}} تومان
                    </div>

                    <div class="form-group col-6">
                        @if($item->licenses != '')
                            <div class="row">
                                <div class="form-group col-12 d-flex justify-content-between">
                                    <div>فرم</div>
                                </div>
                                @foreach($item->form as $form)
                                    <div class="form-group col-4">
                                        <td>{!! $form['label'] !!}</td>
                                    </div>
                                    <div class="form-group col-4">
                                        <td>{{$form['value']}}</td>
                                    </div>
                                    <div class="form-group col-4">
                                        <td>{{number_format($form['price'] ?? 0)}} تومان</td>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-6">
                        <div class="row">
                            @if($item->product->type == \App\Models\Product::TYPE_INSTANT_DELIVERY)
                                <div class="form-group col-12 d-flex justify-content-between">
                                    <div>لایسنسیس</div>
                                    @if($item->quantity != sizeof($item->licenses))
                                        <button class="btn btn-success" wire:click="completeLicenses({{$item->id}})">کامل کردن لاینسیس ها</button>
                                    @endif
                                </div>
                                @foreach($item->licenses as $license)
                                    <div class="form-group col-12">
                                        {{$license}}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach

                <x-admin.forms.separator/>
                <x-admin.forms.header title="یادداشت ها"/>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>یادداشت</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($notes ?? [] as $key => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item->note}}</td>
                                <td>{{$item->is_user_note ? 'عمومی' : 'خصوصی'}}</td>
                                <td>
                                    <x-admin.delete-table wire:click="deleteNote({{$key}})"/>
                                </td>
                            </tr>
                            @empty
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.textarea id="note" label="یادداشت" rows="5" wire:model.defer="sendNote"/>
                <x-admin.forms.dropdown id="note_type" label="نوع یادداشت" :options="['0'=>'خصوصی', '1'=>'عمومی']" wire:model.defer="noteType"/>
                <div class="form-group col-12">
                    <button class="btn btn-success" wire:click="sendNote">ثبت</button>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="پیامک ها"/>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>پیامک</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sms ?? [] as $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.textarea id="sms" label="پیامک" rows="5" wire:model.defer="sendSms"/>
                <div class="form-group col-12">
                    <button class="btn btn-success" wire:click="sendSms">ثبت</button>
                </div>

            </x-admin.forms.form>

            <div class="card">
                <div class="card-body">

                    <div class="form-group col-12 d-flex justify-content-between">
                        @foreach(\App\Models\Order::getOrdersStatus() as $key => $item)
                            @if($status == $key)
                                <button type="button" class="btn btn-link disabled" wire:click="$set('status', '{{$key}}')">{{$item}} ({{$statusCount[$key]}})</button>
                            @else
                                <button type="button" class="btn btn-link" wire:click="$set('status', '{{$key}}')">{{$item}} ({{$statusCount[$key]}})</button>
                            @endif
                        @endforeach
                    </div>

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>وضعیت</th>
                                <th>مبلغ</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->tracking_code}}</td>
                                    <td>{{$item->status_label}}</td>
                                    <td>{{number_format($item->price)}} تومان</td>
                                    <td>{{jalaliDate($item->created_at)}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="6">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>