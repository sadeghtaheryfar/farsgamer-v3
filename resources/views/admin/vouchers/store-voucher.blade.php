<div>
    <x-admin.subheader title="کد تخفیف" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="کد تخفیف" :mode="$mode">
                <x-admin.forms.input id="code" type="text" label="کد" required="true" wire:model.defer="code"/>
                <x-admin.forms.textarea id="description" label="توضیحات" wire:model="description"/>
                <x-admin.forms.dropdown id="type" label="نوع" :options="$data['type']" required="true" wire:model.defer="type"/>
                <x-admin.forms.input id="amount" type="number" label="مقدار" required="true" wire:model.defer="amount"/>
 {{--                <x-admin.forms.datepicker type="text" id="starts_at" label="تاریخ شروع" wire:model.defer="starts_at"/>--}}
                <x-admin.forms.datepicker type="text" id="expires_at" label="تاریخ پایان" wire:model.defer="expires_at"/>
                <x-admin.forms.input id="minimum_amount" type="number" label="حداقل میزان خرید" wire:model.defer="minimum_amount"/>
                <x-admin.forms.input id="maximum_amount" type="number" label="حداکثر میزان خرید" wire:model.defer="maximum_amount"/>
				<x-admin.forms.input id="value_limit" type="number" label="حداکثر مقدار تخفیف" wire:model.defer="value_limit"/>
                <x-admin.forms.input id="product_ids" type="text" label="محصولات مجاز" help="ایدی ها با کاما جدا کنید" wire:model.defer="product_ids"/>
                <x-admin.forms.input id="exclude_product_ids" type="text" label="محصولات غیرمجاز" help="ایدی ها با کاما جدا کنید" wire:model.defer="exclude_product_ids"/>
                <x-admin.forms.checkbox id="exclude_sale_items" value="1" wire:model.defer="exclude_sale_items">محصولات دارای تخفیف</x-admin.forms.checkbox>
                <x-admin.forms.input id="category_ids" type="text" label="دسته بندی های مجاز" help="ایدی ها با کاما جدا کنید" wire:model.defer="category_ids"/>
                <x-admin.forms.input id="exclude_category_ids" type="text" label="دسته بندی های غیرمجاز" help="ایدی ها با کاما جدا کنید" wire:model.defer="exclude_category_ids"/>
                <x-admin.forms.input id="usage_limit" type="number" label="حداکثر استفاده" wire:model.defer="usage_limit"/>
                <x-admin.forms.input id="usage_limit_per_user" type="number" label="حداکثر استفاده برای کاربر" wire:model.defer="usage_limit_per_user"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>