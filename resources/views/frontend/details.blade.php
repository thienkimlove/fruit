@extends('frontend')

@section('content')
<div class="breadcrumb">
    <a href="{{url('/')}}">Trang chủ</a>
    » <a href="{{url($post->category->slug)}}">{{$post->category->title}}</a>
    » <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
</div>
<h1>{{$post->title}}</h1>


<div class="product-info">
    <div class="left">

        <div class="image">
            <a href="{{url('images/big/'. $post->image)}}"
                              title="{{$post->title}}" rel="prettyPhoto[pp_gal]">
                <img src="{{url('images/large/'. $post->image)}}" title="{{$post->title}}"
                     alt="{{$post->title}}" id="image">
            </a>
        </div>
    </div>
    <div class="right">

        <div class="description">
          {!! $post->desc !!}
        </div>
        <div class="price">{{$post->price}} VND<br>
        </div>

    </div>
</div>
<div id="tabs" class="htabs">
    <a href="#tab-description">
        Thông tin sản phẩm
    </a>
    <a href="#tab-related">Sản phẩm cùng loại ({{$related->count()}})</a>

</div>
<div id="tab-description" class="tab-content">
    {!! $post->content !!}
</div>

<div id="tab-related" class="tab-content">
    <div class="box-product">
        @foreach ($related as $product)
        <div>
            <div class="image">
                <a href="{{url($product->slug.'.html')}}">
                    <img
                            src="{{url('images/small/'. $product->image)}}" alt="{{$product->title}}">
                </a>
            </div>
            <div class="name">
                <a href="{{url($product->slug.'.html')}}">{{$product->title}}</a>
            </div>
            <div class="price">{{$product->price}}</div>
        </div>
        @endforeach
    </div>
</div>


@include('partials.best')

@endsection
@section('footer')
    <script type="text/javascript" src="{{url('files/jquery-ui-timepicker-addon.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.colorbox').colorbox({
                overlayClose: true,
                opacity: 0.5,
                rel: "colorbox"
            });
            if ($.browser.msie && $.browser.version == 6) {
                $('.date, .datetime, .time').bgIframe();
            }

            $('.date').datepicker({dateFormat: 'yy-mm-dd'});
            $('.datetime').datetimepicker({
                dateFormat: 'yy-mm-dd',
                timeFormat: 'h:m'
            });
            $('.time').timepicker({timeFormat: 'h:m'});


            $('#tabs a').tabs();

            $("a[rel^='prettyPhoto']").prettyPhoto({
                animation_speed: 'fast', /* fast/slow/normal */
                slideshow: 5000, /* false OR interval time in ms */
                autoplay_slideshow: false, /* true/false */
                opacity: 0.80, /* Value between 0 and 1 */
                show_title: true, /* true/false */
                allow_resize: true, /* Resize the photos bigger than viewport. true/false */
                default_width: 500,
                default_height: 344,
                counter_separator_label: "/", /* The separator for the gallery counter 1 "of" 2 */
                theme: 'dark_rounded', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
                horizontal_padding: 20, /* The padding on each side of the picture */
                hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
                wmode: 'opaque', /* Set the flash wmode attribute */
                autoplay: true, /* Automatically start videos: True/False */
                modal: false, /* If set to true, only the close button will close the window */
                deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
                overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
                keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
                changepicturecallback: function () {
                }, /* Called everytime an item is shown/changed */
                callback: function () {
                }, /* Called when prettyPhoto is closed */
                ie6_fallback: true
            });

        });

       </script>

@endsection