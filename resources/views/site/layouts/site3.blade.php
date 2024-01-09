<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head')
<body class="header-and-sidebar-fixed">
<livewire:site.header/>
<livewire:site.sidebar3/>
@include('site.components.layouts.top-alert')

<main id="main">
    @yield('content')
    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot')
{{ TawkTo::widgetCode('5f2946912da87279037e4523') }}
</body>
</html>