@section('styles')
    <style>
        img {
            width: 100% !important;
        }
    </style>
@endsection
<div>
    <x-admin.subheader title="لاگ" :mode="$mode" :createAble="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <div class="card mb-4 collapse {{$mode != \App\Http\Controllers\Admin\BaseComponent::MODE_NONE ? 'show' : '' }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>مسبب : {{$logs[$logKey]->causer->full_name ?? 'سیستم'}}</p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>موضوع : {{$logs[$logKey]->subject_type}}</p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center">
                            <p>عملیات : {{$logs[$logKey]->description}}</p>
                        </div>
                        <x-admin.forms.separator/>
                        @foreach($logs[$logKey]->changes['attributes'] as $key => $item)
                            <div class="col-md-2">
                                <h4>{{$key}}</h4>
                            </div>
                            <div class="col-md-5">
                                {!! $item !!}
                            </div>
                            <div class="col-md-5">
                                @if(isset($logs[$logKey]->changes['old']))
                                    {!! $logs[$logKey]->changes['old'][$key] !!}
                                @endif
                            </div>
                            <x-admin.forms.separator/>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table', ['searchAble' => false])
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کاربر</th>
                                <th>موضوع</th>
                                <th></th>
                                <th>عملیات</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->causer->full_name ?? ''}}</td>
                                    <td>{{$item->subject_type}}</td>
                                    <td>{{$item->subject_id}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{jalaliDate($item->created_at, '%d %B %Y')}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="$set('logKey', {{$key}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="6">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $logs->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>