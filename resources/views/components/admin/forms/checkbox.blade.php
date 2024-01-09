@props(['id', 'col' => 12])

<div class="form-group col-{{$col}}">
    <div class="form-check form-check-inline">
        <input id="{{$id}}" type="checkbox" {!! $attributes->merge(['class'=> 'form-check-input']) !!}>
        <label for="{{$id}}" class="form-check-label">
            {{$slot}}
        </label>
    </div>
</div>