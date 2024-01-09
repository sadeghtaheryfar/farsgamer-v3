@props(['id', 'conditions', 'formKey', 'editAble' => true])

<div class="form-group col-12 d-flex justify-content-between">
    <h6 class="d-inline">Condition</h6>
    @if($editAble)
        <button type="button" class="btn btn-success" wire:click="addCondition({{$formKey}})">افزودن</button>
    @endif
</div>
{{--{{dd($conditions)}}--}}
@foreach($conditions as $conditionKey => $condition)
    <div class="form-group col-12 d-flex">
        <div class="flex-fill">
            <label for="{{$id}}condition_value_{{$conditionKey}}">name</label>
            <input id="{{$id}}condition_value_{{$conditionKey}}" type="text" class="form-control"
                   wire:model.defer="formConditions.{{$conditionKey}}.value">
        </div>
        <div class="flex-fill ml-1">
            <label for="{{$id}}condition_target_{{$conditionKey}}">value</label>
            <input id="{{$id}}condition_target_{{$conditionKey}}" type="text" class="form-control"
                   wire:model.defer="formConditions.{{$conditionKey}}.target">
        </div>
        <div class="flex-fill ml-1">
            <label for="{{$id}}condition_visibility_{{$conditionKey}}">visibility</label>
            <select id="{{$id}}condition_visibility_{{$conditionKey}}" class="form-control"
                    wire:model.defer="formConditions.{{$conditionKey}}.visibility">
                <option value="">انتخاب کنید...</option>
                <option value="hide">hide</option>
                <option value="show">show</option>
            </select>
        </div>
        @if($editAble)
            <div class="d-flex align-items-end mx-1">
                <button type="button" class="btn btn-danger" wire:click="deleteCondition({{$formKey}},{{$conditionKey}})">حذف</button>
            </div>
        @endif
    </div>
@endforeach
