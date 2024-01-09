@props(['id', 'label', 'help', 'required' => false ,'dir' => 'rtl'])

<div class="form-group col-12">
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <textarea style="direction: {{$dir}};" id="{{$id}}" {!! $attributes->merge(['class'=> 'form-control']) !!}></textarea>
    @isset($help)
        <small class="text-muted">{{$help}}</small>
    @endisset
</div>