<div>
    @include('admin.products.modals')

    <x-admin.subheader title="محصول" :mode="$mode" :createAble="true"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="محصول" :mode="$mode">
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input type="text" id="slug" label="آدرس" required="true" wire:model.defer="slug"/>
                <x-admin.forms.text-editor id="short_description" label="توضیحات کوتاه" wire:model.defer="short_description"/>
                <x-admin.forms.text-editor id="description" label="توضیحات" wire:model.defer="description"/>
                <x-admin.forms.dropdown id="currency_id" label="واحد پول" :options="$data['currency_id']" help="درصورت خالی بودن بر حسب تومان محاسبه میشود" wire:model.defer="currency_id"/>
                <x-admin.forms.input type="number" id="amount" label="قیمت" required="true" help="بر اساس واحد پول محاسبه میشود" wire:model.defer="amount"/>
                <x-admin.forms.input type="number" id="partner_amount" label="قیمت همکاری" required="true" help="بر اساس واحد پول محاسبه میشود" wire:model.defer="partner_amount"/>
                <x-admin.forms.input type="number" id="quantity" label="تعداد" help="درصورت خالی بودن محدودیتی اعمال نمیشود" wire:model.defer="quantity"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model.defer="image"/>
                <x-admin.forms.lfm-standalone id="media" label="تصاویر" :image="$media" wire:model.defer="media"/>
                <x-admin.forms.dropdown id="type" label="نوع" :options="$data['type']" required="true" wire:model.defer="type"/>
                <x-admin.forms.input type="number" id="score" label="امتیاز" required="true" wire:model.defer="score"/>
                <x-admin.forms.dropdown id="status" label="وضعیت" :options="$data['status']" required="true" wire:model.defer="status"/>
                <x-admin.forms.input type="text" id="delivery_time" label="زمان تحویل" required="true" help="بر حسب ساعت" wire:model.defer="delivery_time"/>
                <x-admin.forms.dropdown id="category_id" label="دسته" :options="$data['category_id']" required="true" wire:model.defer="category_id"/>
                <x-admin.forms.input type="text" id="seo_keywords" label="کلمات کلیدی سئو" required="true" help="کلمات کلیدی را با کاما از هم جدا کنید" wire:model.defer="seo_keywords"/>
                <x-admin.forms.input type="text" id="seo_description" label="توضیحات سئو" required="true" wire:model.defer="seo_description"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="مدیر محصول"/>
                <x-admin.forms.input type="text" id="manager_mobile" label="موبایل مدیران محصول" help="موبایل ها را با کاما از هم جدا کنید" wire:model.defer="manager_mobile"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="تخفیف محصول"/>
                <x-admin.forms.dropdown id="discount_type" label="نوع تخفیف" :options="$data['discount_type']" required="true" wire:model.defer="discount_type"/>
                <x-admin.forms.input type="number" id="discount_amount" label="میزان تخفیف" required="true" wire:model.defer="discount_amount"/>
                <x-admin.forms.datepicker type="text" id="discount_starts_at" label="تاریخ شروع" help="در صورت خالی بودن محدودیتی در تاریخ شروع ندارد" wire:model.defer="discount_starts_at"/>
                <x-admin.forms.datepicker type="text" id="discount_expires_at" label="تاریخ پایان" help="در صورت خالی بودن محدودیتی در انقضاء شروع ندارد" wire:model.defer="discount_expires_at"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="فرم" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addForm('speedPlus')">speedPlus</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('paragraph')">paragraph</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('customRadio')">customRadio</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('radio')">radio</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('select')">select</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('textArea')">textArea</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('text')">text</button>
                    </div>
                </x-admin.forms.header>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody wire:sortable="updateFormPosition()">
                        @forelse($form as $key => $item)
                            <tr wire:sortable.item="{{ $item['name'] }}" wire:key="{{ $item['name'] }}">
                                <td wire:sortable.handle>{{ $item['position'] }}</td>
                                <td>{!! $item['label']!!}</td>
                                <td>
                                    <x-admin.edit-table wire:click="editForm({{$key}})"/>
                                    <x-admin.delete-table onclick="deleteFormItem({{$key}})"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="لاینسیس"/>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($product_license as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteLicenseItem({{$key}})"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.textarea id="licenses" label="لاینسیس ها" help="لاینسیس ها را با کاما از هم جدا کنید" wire:model.defer="licenses"/>
            </x-admin.forms.form>

            <div class="card">
                <div class="card-body">

                    <x-admin.forms.dropdown id="category" label="دسته بندی" :options="$category" wire:model="selectedCategory"/>

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td><a href="{{route('products.show', $item->slug)}}">{{$item->title}}</a></td>
                                    <td>{{number_format($item->price)}} تومان</td>
                                    <td>{{$item->status_label}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$item->id}})"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="5">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $products->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteFormItem(id) {
            Swal.fire({
                title: 'حذف فرم!',
                text: 'آیا از حذف فرم اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteForm', id)
                }
            })
        }

        function deleteLicenseItem(id) {
            Swal.fire({
                title: 'حذف لاینسیس!',
                text: 'آیا از حذف لاینسیس اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteLicense', id)
                }
            })
        }

        function deleteItem(id) {
            Swal.fire({
                title: 'حذف محصول!',
                text: 'آیا از حذف محصول اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('delete', id)
                }
            })
        }
    </script>
@endpush