<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head2')
<body class="header-and-sidebar-fixed">
<livewire:site.header2/>
<livewire:site.sidebar2/>
@include('site.components.layouts.top-alert')

<main id="main2">
    @yield('content')
    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot2')
{{ TawkTo::widgetCode('5f2946912da87279037e4523') }}
</body>
</html>