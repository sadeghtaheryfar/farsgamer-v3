<div>
    <x-admin.subheader title="پروفایل" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>
            <x-admin.forms.form title="پروفایل" :mode="$mode">
                <x-admin.forms.input type="text" id="first_name" label="نام" required="true" wire:model.defer="first_name"/>
				<x-admin.forms.input type="text" id="last_name" label="نام خانوادگی" required="true" wire:model.defer="last_name"/>
				<x-admin.forms.input type="text" id="telegram" label="ادرس تلگرام" required="true" wire:model.defer="telegram"/>
				<x-admin.forms.input type="text" id="instagram" label="ادرس اینستاگرام" required="true" wire:model.defer="instagram"/>
				<x-admin.forms.input type="text" id="site_url" label="ادرس فروشگاه" required="true" wire:model.defer="site_url"/>
				<x-admin.forms.input type="text" id="site_name" label="نام فروشگاه" required="true" wire:model.defer="site_name"/>
				<x-admin.forms.input type="text" id="phone" label="شماره فروشنده" required="true" wire:model.defer="phone"/>
				<x-admin.forms.input type="text" id="support_phone1" label="شماره پشتیبان اول" wire:model.defer="support_phone1"/>
				<x-admin.forms.input type="text" id="support_phone2" label="شماره پشتیبان دوم" wire:model.defer="support_phone2"/>
				<x-admin.forms.input type="text" id="support_phone3" label="شماره پشتیبان چهارم" wire:model.defer="support_phone3"/>
            </x-admin.forms.form>

        </div>
    </div>
</div>