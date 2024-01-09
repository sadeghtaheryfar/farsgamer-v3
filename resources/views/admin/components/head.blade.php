<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>فارس گیمر</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{asset('admin/media/logos/favicon.ico')}}"/>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	@if(auth()->user()->language == 'basic')
    {{-- Global Theme Styles (used by all pages) --}}
		<link href="{{asset('admin/plugins/global/plugins.bundle.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/css/style.bundle.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>

		{{-- Layout Themes (used by all pages) --}}
		<link href="{{asset('admin/css/themes/layout/header/base/light.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/css/themes/layout/header/menu/light.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/css/themes/layout/brand/dark.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/css/themes/layout/aside/dark.rtl.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
		<link rel="icon" href="{{asset('site/images/logo-icon.png')}}">

		@if(request()->routeIs(['partner.store.new.orders']))
			<link rel="stylesheet" href="{{asset('site/fonts/icons/style.css?v=1.0.1')}}">
			<link rel="stylesheet" href="{{asset('site/css/dist.css?v=1.0.1')}}">
		@endif		
		
	@else
	{{-- Global Theme Styles (used by all pages) --}}
    <link href="{{asset('admin/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>

    {{-- Layout Themes (used by all pages) --}}
    <link href="{{asset('admin/css/themes/layout/header/base/light.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/themes/layout/header/menu/light.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/themes/layout/brand/dark.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/css/themes/layout/aside/dark.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
	@endif
    <link href="{{asset('admin/css/my-style.css')}}" rel="stylesheet" type="text/css"/>

    {{-- Includable CSS --}}
    <livewire:styles/>
    <link rel="stylesheet" href="{{asset('admin/plugins/custom/datepicker/persian-datepicker.min.css')}}"/>
    @yield('styles')

    {{-- Includable JS --}}
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
	
</head>