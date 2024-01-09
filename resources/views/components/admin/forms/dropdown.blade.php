@props(['id', 'label', 'options', 'help', 'required' => false,'with' => 12,'keyValue'=>false])

<div class="form-group col-md-{{$with}} col-12">
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <select id="{{$id}}" {!! $attributes->merge(['class'=> 'form-control']) !!}>
        <option value="" selected>انتخاب کنید...</option>
        @foreach($options as $key => $value)
            <option value="{{ $keyValue ? $value : $key }}">{{$value}}</option>
        @endforeach
    </select>
    @isset($help)
        <small class="text-muted">{{$help}}</small>
    @endisset
</div>