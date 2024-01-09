
<h1 class="mb-4 text-2xl font-bold">ورود به فارس گیمر</h1>
<div wire:init="checkSession">
<form action="" wire:submit.prevent="verify" >

	<?php if ($is_registration === true)
    	 echo "<p>کد ارسالی به شماره $mobile را وارد کنید</p>";
	?>

    <label class="font-semibold mt-4" for="password"> <?php $is_registration === true ? print('کد تایید را وارد نمایید') : print('گذرواژه را وارد نمایید') ?>  </label>
    <input type="text" id="password" placeholder="<?php $is_registration === true ? print('کد تایید ') : print('گذرواژه ') ?>  " class="text-field" wire:model.defer="password">
    @error('mobile')
    <small class="text-red">{{ $message }}</small>
    @enderror
	<br>
	@if ($is_registration === false)
		@if($sent)
			<div>
                <small class="px-1 text-info mt-2 font-12 vazir" wire:ignore>
                    زمان باقی مانده تا ارسال مجدد:
                    <span id="clock"></span>
                </small>
        	</div>
		@else
			<div class="d-flex align-items-center py-1 px-0 text-primary">
				<small class="btn btn-link btn-sm text-secondary p-0 text-decoration-none" wire:click="sendOtp()"> ورود با رمز یکبار مصرف از طریق اس ام اس</small>
				<small class="text-info px-2" wire:loading wire:target="sendOtp"> (در حال ارسال...)</small>
				<i class="fas fa-chevron-left pe-1" style="font-size:12px" aria-hidden="true"></i>
			</div>
			<div class="d-flex align-items-center py-1 px-0 text-primary">
				<small class="btn btn-link btn-sm text-secondary p-0 text-decoration-none"  wire:click="sendOtpEmail()"> ورود با رمز یکبار مصرف از طریق ایمیل</small>
				<small class="text-info px-2" wire:loading wire:target="sendOtpEmail"> (در حال ارسال...)</small>
				<i class="fas fa-chevron-left pe-1" style="font-size:12px" aria-hidden="true"></i>
			</div>
			
		@endif
	@endif
	
	

    <button class="btn btn-xl w-full form-submit btn-primary mt-4 font-semibold" type="submit">ورود</button>
</form>
</div>

