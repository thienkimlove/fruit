@extends('frontend')

@section('content')
<div class="breadcrumb">
    <a href="{{url('/')}}">Trang chủ</a>
    » <a href="{{url($category->slug)}}">{{$category->title}}</a>
</div>
<h1>{{$category->title}}</h1>


<div class="category-info">
    <div class="image"><img src="{{url('images/max/'. $category->image)}}" alt="{{$category->title}}">
    </div>
    {{$category->desc}}
</div>
<!-- -->


<div class="product-list">
    @foreach ($products as $product)
    <div>
        <div class="image">
            <a href="{{url($product->slug.'.html')}}">
                <img
                        src="{{url('images/small/' . $product->image)}}" title="{{$product->title}}" alt="{{$product->title}}">
            </a>
        </div>
        <div class="name">
            <a href="{{url($product->slug.'.html')}}">{{$product->title}}</a>
        </div>
        <div class="description">{{str_limit($product->desc, 50)}}</div>
        <div class="price">{{$product->price}}</div>

        <div class="cart">
            <a href="{{url($product->slug.'.html')}}"></a>
        </div>

        <div class="compare"><a onclick="addToCompare('{{$product->id}}');" rel="nofollow">Thêm so sánh</a></div>
    </div>
    @endforeach
</div>
{!! with(new \App\Pagination\AcmesPresenter($products))->render() !!}
@include('partials.best')
@endsection