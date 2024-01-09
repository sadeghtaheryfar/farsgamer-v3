<div >
    @if($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_REGISTER)
        @include('site.components.auth.register')
    @elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_LOGIN)
        @include('site.components.auth.login')
    @elseif($mode == \App\Http\Controllers\Site\Auth\AuthComponent::MODE_VERIFY)
        @include('site.components.auth.verify')
    @endif
</div>
@push('scripts')
    <script>
        Livewire.on('timer', function (data) {
            $('#clock').countdown(data.data)
                .on('update.countdown', function(event) {
                    var format = '%M:%S';
                    if(event.offset.totalDays > 0) {
                        format = '%-d روز ' + format;
                    }
                    if(event.offset.weeks > 0) {
                        format = '%-w هفته ' + format;
                    }
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('اتمام زمان!')
                        .parent().addClass('disabled');
                        @this.call('canSendAgain')
                });
        })

    </script>
   
@endpush