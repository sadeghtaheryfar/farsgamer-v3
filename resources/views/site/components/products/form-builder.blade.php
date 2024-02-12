@foreach ($form as $key => $item)
    @if ($item['type'] == 'text')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label for="{{ $key }}">{!! $item['label'] !!}</label>

                <input id="{{ $key }}" name="{{ $item['name'] }}" class="input-style-text-product input-hover"
                    type="text" placeholder="{{ $item['placeholder'] }}"
                    wire:model.defer="form.{{ $key }}.value">

                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'textArea')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label for="{{ $key }}">{!! $item['label'] !!}</label>
                <textarea id="{{ $key }}" name="{{ $item['name'] }}" class="text-field h-auto resize-y"
                    placeholder="{{ $item['placeholder'] }}" rows="4" wire:model.defer="form.{{ $key }}.value"></textarea>
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'select')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label for="{{ $key }}" class="account-email">{!! $item['label'] !!}</label>
                <select id="{{ $key }}" name="{{ $item['name'] }}" class="text-field h-auto resize-y"
                    wire:model="form.{{ $key }}.value">
                    <option value="">انتخاب کنید...</option>
                    @foreach ($item['options'] as $option)
                        <option value="{{ $option['value'] }}">{{ $option['value'] }}</option>
                    @endforeach
                </select>
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'range')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label for="{{ $key }}">{!! $item['label'] !!}</label>
                <input id="{{ $key }}" type="number" min="{{ $item['options'][0]['value'] ?? 0 }}"
                    max="{{ end($item['options'])['value'] ?? 1 }}" name="{{ $item['name'] }}" class="text-field"
                    placeholder="{{ $item['placeholder'] }}" wire:model="form.{{ $key }}.value"
                    list="list{{ $key }}">
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'radio')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label>{!! $item['label'] !!}</label>

                <div class="flex items-center gap-4">
                    @foreach ($item['options'] as $keyRadio => $radio)
                        <label class="flex items-center gap-1 cursor-pointer mb-0">{{ $radio['value'] }}
                            <input type="radio" name="{{ $item['name'] }}" value="{{ $radio['value'] }}"
                                wire:model="form.{{ $key }}.value">{{ $radio['value'] }}
                        </label>
                    @endforeach
                </div>
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'customRadio')
        @if (FormBuilder::isVisible($form, $item))
            <div>
                <label>{!! $item['label'] !!}</label>
                <div class="flex flex-wrap justify-center gap-2 lg:flex lg:justify-start">
                    @foreach ($item['options'] as $keyRadio => $radio)
                        <label for="{{ $key }}-{{ $keyRadio }}"
                            class="radiobox account-category-btn {{ $radio['value'] == $item['value'] ? 'radiobox--active' : '' }}">{{ $radio['value'] }}
                            <input id="{{ $key }}-{{ $keyRadio }}" class="account-category-btn__field"
                                type="radio" name="account-category" value="{{ $radio['value'] }}"
                                wire:model="form.{{ $key }}.value"
                                {{ key_exists('value', $item) && $radio['value'] == $item['value'] ? 'checked' : '' }}>
                        </label>
                    @endforeach
                </div>
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'speedPlus')
        @if (FormBuilder::isVisible($form, $item))
            <div class="col-span-2">
                <div class="flex items-center gap-4 flex-wrap">
                    <p>{!! $item['label'] !!}</p>
                    <div class="flex items-center gap-4">
                        @foreach ($item['options'] as $keyRadio => $radio)
                            <label class="flex items-center gap-1 cursor-pointer mb-0">
                                <input type="radio" name="{{ $item['name'] }}" value="{{ $radio['value'] }}"
                                    wire:model="form.{{ $key }}.value">{{ $radio['value'] }}
                            </label>
                        @endforeach
                    </div>
                </div>
                @error('form.' . $key . '.error')
                    <small class="text-red">{{ $message }}</small>
                @enderror
            </div>
        @endif
    @endif
    @if ($item['type'] == 'paragraph')
        @if (FormBuilder::isVisible($form, $item))
            <div class="my-4">
                <div class="flex items-center gap-4 flex-wrap">
                    {!! $item['label'] !!}
                </div>
            </div>
        @endif
    @endif
@endforeach
