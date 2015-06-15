@extends('frontend')

@section('content')
    <div class="slideshow">
        <div id="slideshow0" class="nivoSlider">
            @foreach ($slideProducts as $product)
            <a href="{{url('/')}}">
                <img src="{{url('images/super/'.$product->image)}}" alt="Chợ sạch của mẹ" />
            </a>
            @endforeach
        </div>
    </div>
    <h1 style="display: none;">{{$meta_title}}</h1>
    @foreach ($categories as $category)
    <div class="box">
        <div class="box-heading">
            <img src="{{url('images/mini/'. $category->image)}}" />
            <a href="{{url($category->slug)}}">{{$category->title}}</a>
            <a style="float:right; color:rgb(88, 152, 199); font-size:14px" href="{{url($category->slug)}}">Xem Thêm >></a>
        </div>
        <div class="box-content">
            <div class="box-product123">
                @foreach ($category->posts() as $product)
                <div>
                    <div class="image">
                        <a href="{{url($product->slug.'.html')}}">
                            <img src="{{url('images/small/' . $product->image)}}" alt="{{$product->title}}" />
                        </a>
                    </div>
                    <div class="name">
                        <a href="{{url($product->slug.'.html')}}">{{$product->title}}</a>
                    </div>
                    <div class="price">{{$product->price}} VND</div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $('#slideshow0').nivoSlider();
        });
    </script>
@endsection