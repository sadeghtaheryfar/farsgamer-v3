@props(['id', 'label', 'required' => false, 'help', 'image'])

@if(gettype($image) == 'string')
    <div class="form-group col-12">
        @foreach(explode(',', $image) as $key => $item)
            <img src="{{asset($item)}}" alt="{{$id}}" width="150px" height="150px" class="mr-1 mb-1 imglist"/>
			<p>نام : {{asset($item)}}</p>
        @endforeach
    </div>
@endif

<div class="form-group col-12 ">
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <div class="input-group">
        <input id="{{$id}}" {!! $attributes->merge(['class'=> 'form-control']) !!}
        x-data
               x-init="$('#lfm-{{$id}}').filemanager('image'); $('#{{$id}}').on('change', function () { $dispatch('input', $(this).val()) })"
               >
        <div class="input-group-append">
            <button id="lfm-{{$id}}" type="button" class="btn btn-outline-secondary"
                    data-input="{{$id}}" data-preview="holder">انتخاب
            </button>
        </div>
    </div>
</div>
