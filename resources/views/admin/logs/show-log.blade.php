@section('styles')
    <style>
        img {
            width: 100% !important;
        }
    </style>
@endsection
<div>
    <x-admin.subheader title="لاگ" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>مسبب : {{$log->causer_id ?? 'سیستم'}}</p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>موضوع : {{$log->subject_type}}</p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>عملیات : {{$log->description}}</p>
                        </div>

                        <x-admin.forms.separator/>

                        @foreach($log->changes['attributes'] as $key => $item)
                            <div class="col-md-2">
                                <h4>{{$key}}</h4>
                            </div>
                            <div class="col-md-5">
                                @if(is_array($item))
                                    @foreach($item as $innerKey => $innerItem)
                                        <span>{{$innerKey}} : </span>
                                        <span>{!! $innerItem !!}</span>
                                    @endforeach
                                @else
                                    {!! $item !!}
                                @endif
                            </div>
                            <div class="col-md-5">
                                @if(isset($log->changes['old']))
                                    {!! $log->changes['old'][$key] !!}
                                @endif
                            </div>
                            <x-admin.forms.separator/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>