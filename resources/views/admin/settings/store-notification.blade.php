<div>
    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <x-admin.subheader title="اعلانات" :mode="$mode" :create="false"/>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="اعلانات" :mode="$mode">
                <x-admin.forms.textarea id="message" label="اعلان" required="true" wire:model="message"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>