<div>
    <x-admin.subheader title="مقاله" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>
            <x-admin.forms.form title="مقاله" :mode="$mode">
                <x-admin.forms.input type="number" id="article_id" label="شماره مقاله" required="true" wire:model.defer="article_id"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
            </x-admin.forms.form>

        </div>
    </div>
</div>