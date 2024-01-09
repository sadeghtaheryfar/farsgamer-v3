<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}" direction="rtl" dir="rtl" style="direction: rtl">
@include('admin.components.head')

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

@include('admin.components.header-mobile')

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        @include('admin.components.sidebar')

        <div id="kt_wrapper" class="d-flex flex-column flex-row-fluid wrapper">

            @include('admin.components.header')

            <div id="kt_content" class="d-flex flex-column flex-column-fluid">

                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('admin.components.user-panel')
@include('admin.components.scroll-top')
@include('admin.components.foot')
</body>
</html>
