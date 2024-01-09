{{--for text & textArea--}}
<x-admin.modal id="text" size="modal-xl" title="{{$form[$formKey]['type'] ?? ''}}">
    <div>
        <x-admin.forms.validation-errors/>
    </div>
    <x-admin.forms.input type="text" id="text-name" label="name" wire:model.defer="formName" disabled/>
    <x-admin.forms.dropdown id="text-required" label="required" :options="['0' => 'خیر', '1' => 'بله']" required="true" wire:model.defer="formRequired"/>
    <x-admin.forms.dropdown id="text-width" label="width" :options="['1' => '50 درصد', '2' => '100 درصد']" required="true" wire:model.defer="formWidth"/>
    <x-admin.forms.text-editor id="text" label="label" required="true" wire:model.defer="formLabel"/>
    <x-admin.forms.input type="text" id="text-placeholder" label="placeholder" wire:model.defer="formPlaceholder"/>
    <x-admin.forms.input type="text" id="text-value" label="value" wire:model.defer="formValue"/>
    <x-admin.forms.form-conditions id="text" :conditions="$formConditions ?? []" :formKey="$formKey"/>

    <x-slot name="footer">
        <button type="button" class="btn btn-primary" wire:click="setFormData()">ثبت</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
    </x-slot>
</x-admin.modal>

{{--for select & radio & customRadio && speedPlus--}}
<x-admin.modal id="select" size="modal-xl" title="{{$form[$formKey]['type'] ?? ''}}">
    <div>
        <x-admin.forms.validation-errors/>
    </div>
    <x-admin.forms.input type="text" id="select-name" label="name" wire:model.defer="formName" disabled/>
    <x-admin.forms.dropdown id="select-required" label="required" :options="['0' => 'خیر', '1' => 'بله']" required="true" wire:model.defer="formRequired"/>
    <x-admin.forms.dropdown id="select-width" label="width" :options="['1' => '50 درصد', '2' => '100 درصد']" required="true" wire:model.defer="formWidth"/>
    <x-admin.forms.text-editor id="select" label="label" required="true" wire:model.defer="formLabel"/>
    <x-admin.forms.input type="text" id="select-value" label="value" wire:model.defer="formValue"/>
	<x-admin.forms.input type="number" id="select-base" label="base price" wire:model.defer="formBasePrice"/>
    <x-admin.forms.form-options :options="$formOptions ?? []" :formKey="$formKey"/>
    <x-admin.forms.form-conditions id="select" :conditions="$formConditions ?? []" :formKey="$formKey"/>

    <x-slot name="footer">
        <button type="button" class="btn btn-primary" wire:click="setFormData()">ثبت</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
    </x-slot>
</x-admin.modal>

{{--for paragraph--}}
<x-admin.modal id="paragraph" size="modal-xl" title="{{$form[$formKey]['type'] ?? ''}}">
    <div>
        <x-admin.forms.validation-errors/>
    </div>
    <x-admin.forms.input type="text" id="paragraph-name" label="name" wire:model.defer="formName" disabled/>
    <x-admin.forms.text-editor id="paragraph" label="label" required="true" wire:model.defer="formLabel"/>
    <x-admin.forms.form-conditions id="paragraph" :conditions="$formConditions ?? []" :formKey="$formKey"/>

    <x-slot name="footer">
        <button type="button" class="btn btn-primary" wire:click="setFormData()">ثبت</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
    </x-slot>
</x-admin.modal>
