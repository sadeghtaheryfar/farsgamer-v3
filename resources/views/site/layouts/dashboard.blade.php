<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head')
<body>

<livewire:site.header/>
<livewire:site.sidebar/>
<main id="main" class="main--dashboard">
    @yield('content')
    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot')
{{ TawkTo::widgetCode('5f2946912da87279037e4523') }}
</body>
</html>