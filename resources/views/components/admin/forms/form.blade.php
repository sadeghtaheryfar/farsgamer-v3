@props(['title', 'mode' => false , 'desc' => false])

<div class="card mb-4 collapse {{ $mode != \App\Http\Controllers\Admin\BaseComponent::MODE_NONE ? 'show' : ''}}">
@if(!empty($title))
    <div class="card-header">
        <h5>
            {{ !empty($mode) ? ($mode == \App\Http\Controllers\Admin\BaseComponent::MODE_CREATE ? auth()->user()->translate('ثبت') : auth()->user()->translate('ویرایش')) : '' }} {!! auth()->user()->translate($title)!!}
        </h5>
		<p class="text-gray">
			{{ $desc }}
		</p>
    </div>
	@endif
    <div class="card-body">
        <div class="row">
            {{$slot}}
        </div>
    </div>
</div>
