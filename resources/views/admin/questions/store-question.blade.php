<div>
    <x-admin.subheader title="پرسش و پاسخ" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="پرسش و پاسخ" :mode="$mode">
                <div class="col-12 mb-1">
                        <span>محصول : </span>
                        <a href="{{route('admin.products.store',
                        ['action'=>'edit', 'id' => $this->model->product->id])}}">{{$this->model->product->title}}</a>
                </div>
                <x-admin.forms.textarea id="parent_text" label="متن" required="true" wire:model.defer="parent_text"/>
                <x-admin.forms.textarea id="text" label="پاسخ" required="true" wire:model.defer="text"/>
                <x-admin.forms.checkbox id="is_confirmed" value="1" wire:model.defer="is_confirmed">تایید شده</x-admin.forms.checkbox>
            </x-admin.forms.form>
        </div>
    </div>
</div>