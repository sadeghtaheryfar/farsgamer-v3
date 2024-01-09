<div>
    <x-admin.subheader title="مقاله" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>
            <x-admin.forms.form title="مقاله" :mode="$mode">
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input type="text" id="slug" label="آدرس" required="true" wire:model.defer="slug"/>
				<x-admin.forms.dropdown id="parent_id" label="دسته " :options="$data['category_id']" required="true"  wire:model.defer="parent_id"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
                <x-admin.forms.text-editor id="description" label="توضیحات" required="true" wire:model.defer="description"/>
                <x-admin.forms.input type="text" id="seo_keywords" label="کلمات کلیدی سئو" required="true" help="کلمات کلیدی را با کاما از هم جدا کنید" wire:model.defer="seo_keywords"/>
                <x-admin.forms.input type="text" id="seo_description" label="توضیحات سئو" required="true" wire:model.defer="seo_description"/>
            </x-admin.forms.form>

        </div>
    </div>
</div>