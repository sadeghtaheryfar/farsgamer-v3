<div>
    <x-admin.subheader title="واحد پول" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="واحد پول" :mode="$mode">
                <x-admin.forms.input id="title" type="text" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input id="amount" type="number" label="قیمت" required="true" wire:model.defer="amount"/>
            </x-admin.forms.form>

        </div>
    </div>
</div>