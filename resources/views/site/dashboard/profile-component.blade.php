<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
    <livewire:site.dashboard.sidebar />

    <section id="left-dashboard">
        <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
            @if ($message)
                <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
            @endif
            <form class="grid gap-8 md:grid-cols-2 lg:p-4" wire:submit.prevent="update()">
                <div>
                    <label for="name">نام</label>
                    <input id="name" class="text-field" type="text" placeholder="نام" wire:model.defer="name">
                    @error('name')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="family">نام خانوادگی</label>
                    <input id="family" class="text-field" type="text" placeholder="نام خانوادگی"
                        wire:model.defer="family">
                    @error('family')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="username">نام کاربری</label>
                    <input id="username" class="text-field" type="text" placeholder="نام کاربری"
                        wire:model.defer="username">
                    @error('username')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="email">ایمیل</label>
                    <input id="email" class="text-field" type="email" placeholder="ایمیل"
                        wire:model.defer="email">
                    @error('email')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="password">گذرواژه </label>
                    <input id="password" class="text-field" type="password" placeholder="گذرواژه"
                        wire:model.defer="password">
                    @error('password')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="account-name">نام صاحب حساب</label>
                    <input id="account-name" class="text-field" type="text" placeholder="نام صاحب حساب"
                        wire:model.defer="accountName">
                    @error('accountName')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="account-bank">نام بانک</label>
                    <input id="account-bank" class="text-field" type="text" placeholder="نام بانک"
                        wire:model.defer="accountBank">
                    @error('accountBank')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="account-cart">شماره کارت</label>
                    <input id="account-cart" class="text-field" type="text" placeholder="شماره کارت"
                        wire:model.defer="accountCart">
                    @error('accountCart')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>

                <div>
                    <label for="account-sheba">شماره شبا</label>
                    <input id="account-sheba" class="text-field" type="text" placeholder="شماره شبا"
                        wire:model.defer="accountSheba">
                    @error('accountSheba')
                        <small class="text-red">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div>
                    <button class="btn form-submit btn-primary btn-xl" type="submit">ثبت اطلاعات</button>
                </div>
            </form>
            <div class=" mx-auto col-12 mt-4">
                @if (auth()->user()->auth_status == App\Models\User::UESR_PENDING)
                    <div class="alert alert-info">
                        <h4> <strong> نتیجه احراز هویت :</strong> </h4>
                        <small class="mr-1"> در حال بررسی<small>
                    </div>
                @elseif (auth()->user()->auth_status == App\Models\User::USER_REJECT_AUTH)
                    <div class="alert alert-danger">
                        <h4> <strong> نتیجه احراز هویت :</strong> </h4>
                        <small class="mr-1">{{ auth()->user()->checkedBy->full_name ?? 'سیستم' }} :
                            {{ auth()->user()->auth_result }}<small>
                    </div>
                @elseif (auth()->user()->auth_status == App\Models\User::USER_OK)
                    <div class="alert alert-success">
                        <h4> <strong> نتیجه احراز هویت :</strong> </h4>
                        <small class="mr-1">{{ auth()->user()->checkedBy->full_name ?? 'سیستم' }} :
                            {{ auth()->user()->auth_result }}<small>
                    </div>
                @endif
            </div>

            @if (auth()->user()->auth_status == App\Models\User::USER_NEED_AUTH ||
                    auth()->user()->auth_status == App\Models\User::USER_REJECT_AUTH)
                <fieldset class="border ">
                    <legend class="float-none  w-auto"><small>احراز هویت:</small></legend>
                    <div class="row  lg:p-3 mx-1">
                        <div
                            class=" mx-auto col-12 shadow-none p-3 mb-4 bg-light rounded-lg border d-flex justify-content-center align-items-center">
                            <p class="text-center text-black p-0 m-0">
                                {{ $auth_description }}
                            </p>
                        </div>

                        <div class="row col-12">
                            <div
                                class="col-lg-6 mx-auto col-12 shadow-none overflow-hidden p-3 mb-4 bg-light rounded-lg border d-flex justify-content-center align-items-center">
                                @if (!is_null($file))
                                    <img class="w-50" src="{{ $file->temporaryUrl() }}">
                                @else
                                    <img class="w-50" src="{{ asset($auth_image_pattern) }}"
                                        alt="تصویر نمونه احراز هویت">
                                @endif

                            </div>

                            <div
                                class="col-lg-6 mx-auto col-12 shadow-none overflow-hidden p-3 mb-3 bg-light rounded-lg border d-flex justify-content-center align-items-center">
                                <div
                                    class="user_image rounded-lg overflow-hidden d-flex justify-content-center align-items-center">
                                    <form class="text-center py-5">
                                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <input type="file" wire:model="file"
                                                {{ auth()->user()->auth_status == App\Models\User::UESR_PENDING ? 'disabled' : '' }}
                                                id="user_image" class="d-none">



                                            <div class="text-center">
                                                <img class="mx-auto" src="{{ asset('site/svg/upload.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <h2>
                                                    <strong>
                                                        محل آپلود تصویر
                                                    </strong>
                                                </h2>
                                                <h6 class="pt-2">
                                                    حداکثر حجم آپلود عکس 1 مگابایت
                                                </h6>
                                                @error('file')
                                                    <p>
                                                        <small class="text-red">{{ $message }}</small>
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <label for="user_image" class="btn px-5 d-block">
                                                    انتخاب فایل
                                                </label>
                                            </div>
                                            <div class="mt-2" x-show="isUploading">
                                                در حال اپلود تصویر...

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div>

                                <div class="mb-3 p-0  col-12">
                                    <button class="btn form-submit btn-primary btn-xl" wire:click="auth()">ارسال احراز
                                        هویت </button>
                                </div>


                            </div>

                </fieldset>
            @endif
        </div>
    </section>
</section>
