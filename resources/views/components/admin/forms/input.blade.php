@props(['id', 'label', 'help', 'required' => false,'class' => 'form-control' ,'with' => 12])

<div class="form-group col-md-{{$with}} col-12">
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <input id="{{$id}}" {!! $attributes->merge(['class'=> ($class) ]) !!}>
    @isset($help)
        <small class="text-muted">{{$help}}</small>
    @endisset
</div>