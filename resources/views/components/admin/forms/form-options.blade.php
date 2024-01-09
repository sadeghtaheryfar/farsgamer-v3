@props(['options', 'formKey'])

<div class="form-group col-12 d-flex justify-content-between">
    <h6 class="d-inline">options</h6>
    <button class="btn btn-success" wire:click="addOption({{$formKey}})">افزودن</button>
</div>

@foreach($options as $optionKey => $option)
    <div class="form-group col-12 d-flex">
        <div class="flex-fill">
            <label for="option_value_{{$optionKey}}">value</label>
            <input id="option_value_{{$optionKey}}" type="text" class="form-control"
                   wire:model.defer="formOptions.{{$optionKey}}.value">
        </div>
        <div class="flex-fill ml-1">
            <label for="option_price_{{$optionKey}}">price</label>
            <input id="option_price_{{$optionKey}}" type="number" class="form-control"
                   wire:model.defer="formOptions.{{$optionKey}}.price">
        </div>
        <div class="flex-fill ml-1">
            <label for="option_license_{{$optionKey}}">لاینسیس (آدرس محصول را وارد کنید)</label>
            <input id="option_license_{{$optionKey}}" type="text" class="form-control"
                   wire:model.defer="formOptions.{{$optionKey}}.license">
        </div>
        <div class="d-flex align-items-end mx-1">
            <button type="button" class="btn btn-danger" wire:click="deleteOption({{$formKey}},{{$optionKey}})">حذف</button>
        </div>
    </div>
@endforeach
