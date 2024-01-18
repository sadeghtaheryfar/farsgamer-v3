<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head')
<body class="header-and-sidebar-fixed">
<livewire:site.header/>
<livewire:site.sidebar/>
@include('site.components.layouts.top-alert')

<main id="main">
    @yield('content')
    @include('site.components.layouts.footer')
</main>

@include('site.components.layouts.foot')



<script type="text/javascript">
  !function(){var i="0d89pV",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
<script src="{{asset('site-v2/js/script.js')}}"></script>
</body>
</html>