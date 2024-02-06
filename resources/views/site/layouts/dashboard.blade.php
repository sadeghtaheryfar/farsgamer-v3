<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head-v2')

<body>

    <livewire:site.header2 />
    <livewire:site.sidebar2 />

    <main style="padding: 0px !important;margin:0px !important">
        @yield('content')
    </main>

    <section class="my-footer-dashboard">
        @include('site.components.layouts.footer')
    </section>

    <div id="toast-copy">
        <div id="show-toast-copy" class="flex-box height-max">
            <span>متن با موفقیت کپی شد .</span>

            <div id="time-toast-copy"></div>
        </div>
    </div>

    <script type="text/javascript">
        ! function() {
            var i = "0d89pV",
                a = window,
                d = document;

            function g() {
                var g = d.createElement("script"),
                    s = "https://www.goftino.com/widget/" + i,
                    l = localStorage.getItem("goftino_" + i);
                g.async = !0, g.src = l ? s + "?o=" + l : s;
                d.getElementsByTagName("head")[0].appendChild(g);
            }
            "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !
                1);
        }();
    </script>
    <script src="{{ asset('site-v2/js/script.js') }}"></script>
    @livewireScripts
</body>

</html>
