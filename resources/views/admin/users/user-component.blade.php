<div>
    <x-admin.subheader title="کاربران" :mode="$mode" :createAble="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="کاربر" :mode="$mode">
                <div class="form-group col-6">
                    <p>نام : {{$name}}</p>
                </div>
                <div class="form-group col-6">
                    <p>نام خانوادگی : {{$family}}</p>
                </div>
                <div class="form-group col-6">
                    <p>نام کاربری : {{$username}}</p>
                </div>
                <div class="form-group col-6">
                    <p>موبایل : {{$mobile}}</p>
                </div>
                <div class="form-group col-12">
                    <p>ایمیل : {{$email}}</p>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="نقش کاربر"/>
                @foreach($data['role'] as $item)
                    <x-admin.forms.checkbox id="permissions-{{$item['id']}}" col="2" value="{{$item['name']}}" wire:model.defer="roles">
                        {{$item['name']}}
                    </x-admin.forms.checkbox>
                @endforeach

                <x-admin.forms.separator/>
                <x-admin.forms.header title="کیف پول" class="d-flex justify-content-between">
                    <div>
                        موجودی : {{number_format($model->balance ?? 0)}} تومان
                    </div>
                </x-admin.forms.header>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>مبلغ</th>
                            <th>نوع تراکنش</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody wire:sortable="updateFormPosition()">
                        @forelse($userWallet as $item)
                            <tr>
                                <td>
                                    <div class="comment__date">
                                        <span class="comment__date-day">{{jalaliDate($item->created_at, '%d')}}</span>
                                        <span class="comment__date-month">{{jalaliDate($item->created_at, '%B')}}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                <span class="flex items-center gap-1"><span class="font-semibold">{{number_format($item->amount)}}</span><span
                                            class="text-sm">تومان</span></span>
                                </td>
                                <td>{{$item->type == \Bavix\Wallet\Models\Transaction::TYPE_WITHDRAW ? 'برداشت' : 'واریز'}}</td>
                                <td>{{$item->meta['description']}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.dropdown id="wallet_type" label="نوع" :options="[\Bavix\Wallet\Models\Transaction::TYPE_WITHDRAW => 'برداشت',
                 \Bavix\Wallet\Models\Transaction::TYPE_DEPOSIT => 'واریز']" required="true" wire:model.defer="walletType"/>
                <x-admin.forms.input id="wallet_amount" type="number" label="مبلغ" required="true" wire:model.defer="walletAmount"/>
                <x-admin.forms.textarea id="wallet_description" label="توضیح" required="true" wire:model.defer="walletDescription"/>
                <div class="form-group col-12">
                    <button type="button" class="btn btn-secondary" wire:click="walletAction">ثبت</button>
                </div>

            </x-admin.forms.form>


            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>موبایل</th>
                                <th>موجودی کیف پول</th>
                                <th>تعداد سفارشات</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->family}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{number_format($item->balance)}} تومان</td>
                                    <td>{{$item->orders_count}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$item->id}})"/>
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
                    {{ $users->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
