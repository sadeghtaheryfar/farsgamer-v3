<section class="bg-white p-4 xs:p-6 rounded-2xl text-gray-700 font-light leading-7">
    <div class="text-center">
        <h1 class="text-lg bg-light-green p-2 rounded-xl inline-block font-medium">* استفاده از سایت به منزله پذیرش این توافق نامه است *</h1>
    </div>

    {!! $description !!}

    <ul class="bg-gray-50 mt-8 divide-y divide-gray-200 rounded-2xl text-black">
        @foreach($rules as $rule)
            <li class="px-2 py-6 flex gap-4">
                <div class="bg-light-green min-w-8 h-8 rounded-lg leading-none flex items-center justify-center">{{$loop->iteration}}</div>
                <div>{!! $rule->value !!}</div>
            </li>
        @endforeach
    </ul>

    {!! $physicalDescription !!}

    <ul class="bg-gray-50 mt-8 divide-y divide-gray-200 rounded-2xl text-black">
        @foreach($physicalRules as $rule)
            <li class="px-2 py-6 flex gap-4">
                <div class="bg-light-green min-w-8 h-8 rounded-lg leading-none flex items-center justify-center">{{$loop->iteration}}</div>
                <div>{!! $rule->value !!}</div>
            </li>
        @endforeach
    </ul>
</section>
