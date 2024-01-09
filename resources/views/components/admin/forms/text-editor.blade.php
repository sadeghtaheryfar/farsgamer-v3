@props(['id', 'label', 'required' => false, 'help'])

<div class="form-group col-12" wire:ignore>
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <textarea id="{{$id}}" {!! $attributes->merge(['class'=> 'form-control']) !!}
    x-data="{text: @entangle($attributes->wire('model')) }"
              x-init="CKEDITOR.replace('{{$id}}', {
                            filebrowserImageBrowseUrl: '/filemanager?type=Images',
                            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/filemanager?type=Files',
                            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
                        });
                        CKEDITOR.instances.{{$id}}.on('change', function () {
                            $dispatch('input', CKEDITOR.instances.{{$id}}.getData())
                        });"
              x-text="CKEDITOR.instances.{{$id}}.setData(this.text); return this.text"></textarea>
    @isset($help)
        <small class="text-muted">{{$help}}</small>
    @endisset
</div>
