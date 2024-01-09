<div>
    <x-admin.subheader title="قانون" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="قانون" :mode="$mode">
                <x-admin.forms.text-editor id="rule" label="قانون" required="true" wire:model.defer="rule"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>