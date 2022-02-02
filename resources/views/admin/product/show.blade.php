@extends('layouts.shop_layout')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
      <h1>{{$product->name}}</h1>
        @if(str_starts_with($product->img, 'https')) {
        <img src="{{asset($product->img)}}" alt="">
        } @else
        <p>Картинка загружена</p>
        <img src="{{$product->img}}" alt="{{$product->name.'.jpg'}}">
        @endif
        <div> Product id:
          <div>{{$product->id}}</div>
        </div>
        <div> Product price:
            <div>{{$product->price}}</div>
        </div>
        <div> Product status:
            <div>{{$product->status}}</div>
        </div>
    </div>
@endsection
