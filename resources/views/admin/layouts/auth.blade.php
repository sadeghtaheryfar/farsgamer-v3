<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}" direction="rtl" dir="rtl" style="direction: rtl">
@include('admin.components.head')

<body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div class="d-flex flex-column flex-root">

    <div class="login login-4 login-signin-on d-flex flex-row-fluid">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('/admin/media/bg/bg-3.jpg');">
            <div class="login-form text-center p-7 position-relative overflow-hidden">

                <div class="d-flex flex-center mb-15">
                    {{--todo - change logo--}}
                    <img src="{{asset('admin/media/logos/logo-letter-13.png')}}" class="max-h-75px" alt=""/>
                </div>

                @yield('content')
            </div>
        </div>
    </div>

</div>

@include('admin.components.foot')
</body>
</html>
