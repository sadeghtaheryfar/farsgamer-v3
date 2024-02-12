<head>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="Fa">
    <meta name="googlebot" content="noarchive">
    <link rel="icon" href="{{ asset('site/images/logo-icon.png') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('site/fonts/icons/style.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('site/library/swiper/swiper.min.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('site/library/easytab/easytab.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('site/library/plyr/plyr.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('site/css/dist.css?v=1.0.1') }}">
    <link rel="stylesheet" href="{{ asset('site/css/new.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/index_new.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/18f07e1d50.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('site-v2/css/style.css') }}">

    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @yield('style')

    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-0 h-0 absolute">
        <symbol id="svg-gem-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="#82d2ff" d="M256 0L34.297 128v256L256 512l221.703-128V128z" />
            <path fill="#08b7fc" d="M256 256V0L34.297 128z" />
            <path d="M256 256z" fill="#82d2ff" />
            <path fill="#006dff" d="M34.297 128v256L256 256z" />
            <path fill="#08b7fc" d="M477.703 128L256 256l221.703 128z" />
            <path fill="#0050c0" d="M256 256L34.297 384 256 512z" />
            <path fill="#006dff" d="M256 512l221.703-128L256 256z" />
            <path fill="#82d2ff" d="M381.121 328.238V183.762L256 111.523l-125.121 72.239v144.476L256 400.477z" />
            <path fill="#55cbff" d="M381.121 328.238V183.762L256 111.523v288.954z" />
        </symbol>
        <symbol id="svg-gem-red-sporkel" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
            <g fill-rule="nonzero" fill="none">
                <path d="M44 13H16L9 24l21 27 21-27z" fill="#df4d60" />
                <g fill="#f0c419">
                    <path
                        d="M4 31H1a1 1 0 010-2h3a1 1 0 010 2zM59 31h-3a1 1 0 010-2h3a1 1 0 010 2zM30 60a1 1 0 01-1-1v-3a1 1 0 012 0v3a1 1 0 01-1 1zM30 5a1 1 0 01-1-1V1a1 1 0 012 0v3a1 1 0 01-1 1zM9.494 51.506a1 1 0 01-.707-1.706l2.121-2.121a1 1 0 011.414 1.414l-2.122 2.12a1 1 0 01-.706.293zM48.385 12.615a1 1 0 01-.707-1.707L49.8 8.787a1 1 0 111.413 1.413l-2.121 2.121a1 1 0 01-.707.294zM50.506 51.506a1 1 0 01-.707-.293l-2.121-2.121a1 1 0 011.414-1.414l2.121 2.122a1 1 0 01-.707 1.707zM11.615 12.615a1 1 0 01-.707-.293L8.787 10.2A1 1 0 1110.2 8.787l2.121 2.121a1 1 0 01-.707 1.707z" />
                </g>
                <path d="M23 24H9l7-11zM51 24H37l7-11z" fill="#fb7b76" />
                <path d="M44 13l-7 11-7-11zM30 13l-7 11-7-11z" fill="#ff5364" />
                <path d="M37 24H23l7-11z" fill="#fb7b76" />
                <path d="M37 24l-1.56 6-1.3 5.04L30 51l-7-27z" fill="#ff5364" />
            </g>
        </symbol>
        <symbol id="svg-gem-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M100.754 256l155.192-155.191L411.137 256 255.946 411.191z" fill="#9fc" />
            <path d="M411.215 256L256 100.785v310.43z" fill="#80ecc6" />
            <path
                d="M512 256c0 3.9-1.5 7.8-4.501 10.499l-241 241C263.8 510.5 259.9 512 256 512l-30-83.5 30-59.7L368.8 256l55.305-30z"
                fill="#36b3b3" />
            <path
                d="M256 0l30 83.5-30 59.7L143.2 256l-69.427 30L0 256c0-3.9 1.5-7.8 4.501-10.499l241-241C248.2 1.5 252.1 0 256 0z"
                fill="#68d9c0" />
            <g fill="#4fc6b9">
                <path
                    d="M256 368.8V512c-3.9 0-7.8-1.5-10.499-4.501l-241-241C1.5 263.8 0 259.9 0 256h143.2zM512 256H368.8L256 143.2V0c3.9 0 7.8 1.5 10.499 4.501l241 241C510.5 248.2 512 252.1 512 256z" />
            </g>
        </symbol>
        <symbol id="svg-gem-greener" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M127.885 437l-41.836-84.229L256 118.982l169.952 233.789L384.116 437z" fill="#c1f261" />
            <path d="M384.116 437l41.836-84.229L256 118.982V437z" fill="#a0e65c" />
            <path d="M512 345.5L430.3 512l-66.549-29.225 1.75-75.775L391 355.699l48.451-34.037z" fill="#59b348" />
            <path
                d="M256 0l30 92-30 77.999-135 185.7-48.45 25.963L0 345.5zM430.3 512H82.001l2.249-82.5L146.5 407h219.001z"
                fill="#a0e65c" />
            <g fill="#79cc52">
                <path
                    d="M512 345.5l-121 10.199-135-185.7V0zM146.5 407L82.001 512H81.7L0 345.5l121 10.199zM256 512h174.3l-64.799-105H256z" />
            </g>
        </symbol>
        <symbol id="svg-gem-yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M132.074 255.701L256 90.877l123.926 164.824L256 420.525z" fill="#fff159" />
            <path d="M379.926 255.701L256 90.877v329.648z" fill="#ffdf40" />
            <path
                d="M256 0l30 77.632-30 63.169-86.4 114.9-47.412 30-64.788-30zM454.6 255.701L256 512l-30-84.838 30-56.562 86.4-114.899 51.793-30z"
                fill="#ffbe40" />
            <g fill="#ff9f40">
                <path d="M256 370.6V512L57.4 255.701h112.2zM454.6 255.701H342.4l-86.4-114.9V0z" />
            </g>
        </symbol>
    </svg>

</head>
