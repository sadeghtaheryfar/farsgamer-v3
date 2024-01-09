@props(['title'])

<div {!! $attributes->merge(['class'=> 'form-group col-12']) !!}>
    <h6>{{$title}}</h6>
    {{$slot}}
</div>