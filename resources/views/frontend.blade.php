<!DOCTYPE html>
<html dir="ltr" lang="vi">
<head>
    <meta charset="UTF-8" />
    <base href="{{url('/')}}" />
    <title>{{$meta_title}}</title>
    <meta name="description" content="{{$meta_desc}}" />
    <meta name="keywords" content="{{$meta_keyword}}" />
    <link href="{{url('files/trai-cay-nhap-khau-fruit-shop.jpg')}}" rel="icon" />
    <link rel="stylesheet" type="text/css" href="{{url('files/stylesheet.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('files/slideshow.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{url('js/libs/jquery-ui-1.9.2/css/ui-darkness/jquery-ui-1.9.2.custom.min.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{url('js/libs/prettyPhoto/css/prettyPhoto.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{url('files/colorbox.css')}}" media="screen" />
    <script type="text/javascript" src="{{url('js/libs/jquery-ui-1.9.2/js/jquery-1.8.3.js')}}"></script>
    <script type="text/javascript" src="{{url('js/libs/jquery-ui-1.9.2/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script type="text/javascript" src="{{url('files/common.js')}}"></script>
    <script type="text/javascript" src="{{url('files/jquery.nivo.slider.pack.js')}}"></script>
    <script type="text/javascript" src="{{url('js/libs/prettyPhoto/js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{url('files/jquery.colorbox.js')}}"></script>
    <script type="text/javascript" src="{{url('files/tabs.js')}}"></script>

    @include('partials.header-block')
</head>
<body>
<div id="container">
    @if(!empty($categories))
    @include('partials.menu', ['categories' => $categories])
    @endif
    <div id="content">
        @yield('content')
        @include('partials.footer')
    </div>
</div>
@yield('footer')
</body>
</html>