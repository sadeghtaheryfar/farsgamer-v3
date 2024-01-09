<div>
    <x-admin.subheader title="پیامک" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="پیامک" :mode="$mode">
                <x-admin.forms.header title="راهنمای پیامک"/>

                <div class="form-group col-4">
                    <p>{b_first_name} : نام کاربر</p>
                </div>
                <div class="form-group col-4">
                    <p>{b_last_name} : نام خانوادگی کاربر</p>
                </div>
                <div class="form-group col-4">
                    <p>{mobile} : موبایل کاربر</p>
                </div>
                <div class="form-group col-4">
                    <p>{email} : ایمیل کاربر</p>
                </div>
                <div class="form-group col-4">
                    <p>{status} : وضعیت سفارش</p>
                </div>
                <div class="form-group col-4">
                    <p>{all_items} : محصولات سفارش</p>
                </div>
                <div class="form-group col-4">
                    <p>{all_items_qty} : محصولات سفارش به همراه تعداد</p>
                </div>
                <div class="form-group col-4">
                    <p>{count_items} : تعداد محصولات سفارش</p>
                </div>
                <div class="form-group col-4">
                    <p>{price} : مبلغ سفارش</p>
                </div>
                <div class="form-group col-4">
                    <p>{order_id} : شماره سفارش</p>
                </div>
                <div class="form-group col-4">
                    <p>{product} : نام محصول</p>
                </div>
               				
                <x-admin.forms.separator/>
                <x-admin.forms.header title="کاربر"/>
                <x-admin.forms.textarea id="user_not_paid" label="در انتظار پرداخت" required="true" rows="5" wire:model.defer="sms.user_wc-pending"/>
                <x-admin.forms.textarea id="user_hold" label="در انتظار بررسی توسط پشتیبانی" required="true" rows="5" wire:model.defer="sms.user_wc-on-hold"/>
                <x-admin.forms.textarea id="user_processing" label="در حال انجام توسط تیم ثبت سفارشات" required="true" rows="5" wire:model.defer="sms.user_wc-processing"/>
                <x-admin.forms.textarea id="user_store" label="درحال آماده سازی در انبار" required="true" rows="5" wire:model.defer="sms.user_wc-custom-status"/>
                <x-admin.forms.textarea id="user_failed" label="در حال بررسی توسط مشتری" required="true" rows="5" wire:model.defer="sms.user_wc-failed"/>
                <x-admin.forms.textarea id="user_post" label="ارسال توسط پست" required="true" rows="5" wire:model.defer="sms.user_wc-post"/>
                <x-admin.forms.textarea id="user_cancelled" label="در انتظار بازگشت وجه" required="true" rows="5" wire:model.defer="sms.user_wc-cancelled"/>
                <x-admin.forms.textarea id="user_refunded" label="مسترد شده" required="true" rows="5" wire:model.defer="sms.user_wc-refunded"/>
                <x-admin.forms.textarea id="user_completed" label="تکمیل شده" required="true" rows="5" wire:model.defer="sms.user_wc-completed"/>

            </x-admin.forms.form>
        </div>
    </div>
</div>