@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.product.update', ['product' => $product])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{$product->name}}">
        <br>
        <input type="text" name="img" value="{{$product->img}}">
        <br>
        <textarea name="description" id="" cols="30" rows="10" >{{$product->content}}</textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <input type="number" name="price" value ="{{$product->price}}">
        <input type="number" name="brand_id" value ="{{$product->brand_id}}">
        <button type="submit">Send</button>
    </form>
@endsection
