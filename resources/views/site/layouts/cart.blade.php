<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head-v2')
<body class="header-and-sidebar-fixed">
<livewire:site.header/>
<livewire:site.sidebar/>
@include('site.components.layouts.top-alert')

<main style="overflow: unset">
    @yield('content')

    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot')

<script src="{{asset('site-v2/js/script.js')}}"></script>
@livewireScripts
</body>
</html>