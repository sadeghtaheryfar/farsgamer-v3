@props(['id', 'size' => '', 'title', 'footer'])

<div class="modal fade" id="{{$id}}Modal" data-backdrop="static" data-keyboard="false"
     aria-labelledby="{{$id}}ModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable {{$size}}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                {{$footer}}
            </div>
        </div>
    </div>
</div>
