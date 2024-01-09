<div class="modal fade" id="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{$isEditMode ? trans('admin.crud_update', ['attr'=> trans('admin.'.$name)])
                        : trans('admin.crud_create', ['attr'=> trans('admin.'.$name)]) }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="form-row">
                            @if($errors->any())
                                <div class="form-group col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <ul class="m-0">
                                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            {{$slot}}
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                <button type="button" class="btn btn-primary font-weight-bold" wire:click="{{$isEditMode ? 'update()' : 'store()' }}">ثبت</button>
            </div>
        </div>
    </div>
</div>