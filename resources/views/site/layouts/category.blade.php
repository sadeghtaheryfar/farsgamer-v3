<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head2')
<body class="header-and-sidebar-fixed">
<livewire:site.header/>
<livewire:site.sidebar/>
@include('site.components.layouts.top-alert')

<main id="main">
    @yield('content')
    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot2')
<script src="{{asset('site-v2/js/script.js')}}"></script>
@livewireScripts
</body>
</html>