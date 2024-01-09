<h1 class="mb-8 text-2xl font-bold">ثبت نام در فارس گیمر</h1>

<form action="" wire:submit.prevent="register">

    <label class="font-semibold mr-2" for="mobile">شماره همراه</label>
    <div class="relative">
        <input type="tel" id="mobile" placeholder="*********09" class="text-field" maxlength="11" wire:model.defer="mobile">
        <svg class="absolute left-4 inset-y-center w-4 h-4">
            <use xlink:href="#svg-iran-flag"></use>
        </svg>
    </div>
    @error('mobile')
    <small class="text-red">{{ $message }}</small>
    @enderror

    <label class="font-semibold mt-4 mr-2" for="username">نام کاربری</label>
    <input type="text" id="username" placeholder="نام کاربری" class="text-field" wire:model.defer="username">
    @error('username')
    <small class="text-red">{{ $message }}</small>
    @enderror


	<label class="font-semibold mt-4 mr-2" for="passwords">گذرواژه</label>
    <input type="password" id="passwords" placeholder="گذرواژه" class="text-field" wire:model.defer="passwords">
    @error('passwords')
    <small class="text-red">{{ $message }}</small>
    @enderror

	<label class="font-semibold mt-4 mr-2" for="passwords_confirm">تایید گذرواژه</label>
    <input type="password" id="passwords_confirm" placeholder="تایید گذرواژه" class="text-field" wire:model.defer="passwords_confirm">
    @error('passwords_confirm')
    <small class="text-red">{{ $message }}</small>
    @enderror

    <button class="btn btn-xl w-full form-submit btn-primary mt-4 font-semibold" type="submit">ثبت نام</button>
</form>

<p class="mt-8">
    <span>حساب کاربری دارید؟</span>
    <button class="link link-transition font-semibold"
            wire:click="$set('mode', '{{\App\Http\Controllers\Site\Auth\AuthComponent::MODE_LOGIN}}')">وارد شوید
    </button>
</p>