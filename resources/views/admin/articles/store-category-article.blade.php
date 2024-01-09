<div>

    <x-admin.subheader title="دسته بندی جدید" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="دسته بندی" :mode="$mode">
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input type="text" id="slug" label="نام مستعار" required="true" wire:model.defer="slug"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
				 <x-admin.forms.dropdown id="parent_id" label="دسته مادر" :options="$data['category_id']" required="false"  wire:model.defer="parent_id"/>
            </x-admin.forms.form>

        </div>
    </div>
</div>