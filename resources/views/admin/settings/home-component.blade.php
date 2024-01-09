<div>
    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <x-admin.modal id="imageWithUrl" size="modal-xl" title="افزودن آیتم">
                <div>
                <x-admin.forms.validation-errors/>
            	</div>
                <x-admin.forms.input type="text" id="url" label="آدرس" required="true" wire:model.defer="url"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>

                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeImageWithUrl()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>



            <x-admin.modal id="imageWithUrlEdit" size="modal-xl" title="ویرایش آیتم">
                <div>
                <x-admin.forms.validation-errors/>
            	</div>
                <x-admin.forms.input type="text" id="url" label="آدرس" required="true" wire:model.defer="url"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
				<x-admin.forms.input type="number" id="priority" label="نمایش" required="true" wire:model.defer="priority"/>
				<x-admin.forms.input type="hidden" id="idcase" label="" required="false" wire:model.defer="idcase"/>


                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="editImageWithUrl()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>


            <x-admin.modal id="productUrl" size="modal-xl" title="افزودن آیتم">
                <div>
                    <x-admin.forms.validation-errors/>
                </div>
                <x-admin.forms.input type="text" id="p-url" label="آدرس" required="true" wire:model.defer="url"/>

                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeProductUrl()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>

            <x-admin.subheader title="صفحه اصلی" :mode="$mode" :createAble="false"/>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="صفحه اصلی" :mode="$mode">
                <x-admin.forms.header title="اسلایدر صفحه اصلی" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('home_slider')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($home_slider as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item['url']}}</td>
                                <td><img src="{{asset($item['image'])}}" alt="" width="75px" height="75px"></td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
									<x-admin.edit-table wire:click="editBanner({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="4">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="آیتم های سه گانه" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('triple_item')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($triple_item as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item['url']}}</td>
                                <td><img src="{{asset($item['image'])}}" alt="" width="75px" height="75px"></td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="4">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="محصولات پر فروش" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addProductUrl('best_seller')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bestSeller as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="گیفت کارت" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('gift_carts')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($giftCarts as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item['url']}}</td>
                                <td><img src="{{asset($item['image'])}}" alt="" width="75px" height="75px"></td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="4">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="تخفیفات ویژه" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('gift_carts')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <x-admin.forms.lfm-standalone id="image_special_discount" label="تصویر" :image="$imageSpecialDiscount" required="true" wire:model="imageSpecialDiscount"/>
                <x-admin.forms.input type="text" id="slugOneSpecialDiscount" label="آدرس محصول یک" required="true" wire:model.defer="slugOneSpecialDiscount"/>
                <x-admin.forms.input type="text" id="slugTwoSpecialDiscount" label="آدرس محصول دو" required="true" wire:model.defer="slugTwoSpecialDiscount"/>
                <x-admin.forms.input type="text" id="slugThreeSpecialDiscount" label="آدرس محصول سه" required="true" wire:model.defer="slugThreeSpecialDiscount"/>
{{--                <x-admin.forms.input type="text" id="slugFourSpecialDiscount" label="آدرس محصول چهار" required="true" wire:model.defer="slugFourSpecialDiscount"/>--}}

                <x-admin.forms.separator/>
                <x-admin.forms.header title="محصولات فورتنایت" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addProductUrl('fortnite')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($fortnite as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="محصولات فیزیکی" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addProductUrl('physical')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($physical as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.header title="محصولات استیم" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addProductUrl('steam')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($steam as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
				<x-admin.forms.separator/>
				<x-admin.forms.header title="پست های اموزشی" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addProductUrl('home_article')">افزودن</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام مستعار</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($article as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item}}</td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="3">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>


                <x-admin.forms.separator/>
                <x-admin.forms.header title="شبکه اجتماعی" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('telegram')">تلگرام</button>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('instagram')">اینستا</button>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('facebook')">فیس بوک</button>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('twitter')">توییتر</button>
                    </div>
                </x-admin.forms.header>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($social as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item['url']}}</td>
                                <td><img src="{{asset($item['image'])}}" alt="" width="75px" height="75px"></td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="4">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.separator/>
                <x-admin.forms.text-editor id="footer_description" label="توضیحات فوتر" required="true" wire:model.defer="footer_description"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف تنظیمات!',
                text: 'آیا از حذف تنظیمات اطمینان دارید؟',
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