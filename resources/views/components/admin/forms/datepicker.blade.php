@props(['id', 'label', 'help', 'required' => false])

<div class="form-group col-12">
    <label for="{{$id}}">{{$label}} {{$required ? '*' : ''}}</label>
    <input id="{{$id}}" {!! $attributes->merge(['class'=> 'form-control p-datepicker']) !!}
    x-data
           x-init="$('#{{$id}}').pDatepicker({
                initialValue: false,
                autoClose: true,
                calendarType: 'gregorian',
                calendar: {
                    'persian': {
                    'locale': 'en',
                    'showHint': true,
                    'leapYearMode': 'algorithmic'
                    },
                    'gregorian': {
                        'locale': 'en',
                        'showHint': true
                    },
                },
                toolbox: {
                    'enabled': true,
                    'calendarSwitch': {
                    'enabled': false,
                    },
                },
                format: 'YYYY-MM-DD',
                onSelect: function () {
                    $dispatch('input', $('#{{$id}}').val())
                }
                });">
    @isset($help)
        <small class="text-muted">{{$help}}</small>
    @endisset
</div>

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $('.p-datepicker').each(function () {--}}
{{--            const id = $(this).attr('id')--}}
{{--            $('#' + id).pDatepicker({--}}
{{--                initialValue: false,--}}
{{--                autoClose: true,--}}
{{--                calendarType: "persian",--}}
{{--                calendar: {--}}
{{--                    "persian": {--}}
{{--                        "locale": "en",--}}
{{--                        "showHint": true,--}}
{{--                        "leapYearMode": "algorithmic"--}}
{{--                    },--}}
{{--                    "gregorian": {--}}
{{--                        "locale": "en",--}}
{{--                        "showHint": true--}}
{{--                    },--}}
{{--                },--}}
{{--                toolbox: {--}}
{{--                    "enabled": true,--}}
{{--                    "calendarSwitch": {--}}
{{--                        "enabled": false,--}}
{{--                    },--}}
{{--                },--}}
{{--                format: "YYYY-MM-DD",--}}
{{--                onSelect: function () {--}}
{{--                @this.set(id, $('#' + id).val())--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
