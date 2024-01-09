<div>
    <x-admin.subheader title="سوالات متداول" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="سوالات متداول" :mode="$mode">
                <x-admin.forms.input type="text" id="question" label="سوال" required="true" wire:model.defer="question"/>
                <x-admin.forms.text-editor id="answer" label="پاسخ" required="true" wire:model.defer="answer"/>
                <x-admin.forms.input type="text" id="category" label="دسته" required="true" wire:model.defer="category"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>