@props(['title', 'mode' => false, 'create'=> false])

<div id="kt_subheader" class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">{{auth()->user()->translate($title)}}</h5>
                {!! $errors->any() ? '<span class="text-danger">'.auth()->user()->translate('مشکلی پیش آمده').'</span>' : '' !!}
            </div>
        </div>
        <div class="d-flex align-items-center">
		@if($mode)
            @switch($mode)
                @case(\App\Http\Controllers\Admin\BaseComponent::MODE_NONE)
                @if($create)
                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="{{$create}}">{{ auth()->user()->translate('افزودن') }}</a>
                @endif
                @break

                @case(\App\Http\Controllers\Admin\BaseComponent::MODE_CREATE)
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="store()">{{ auth()->user()->translate('ذخیره') }}</div>
                @break

                @case(\App\Http\Controllers\Admin\BaseComponent::MODE_UPDATE)
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="update()">{{ auth()->user()->translate('بروزرسانی') }}</div>
                @break

            @endswitch
		@endif	
        </div>
    </div>
</div>
