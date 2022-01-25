@extends('layouts.admin')
@section('content')
{{--    @dump($errors)--}}
    <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p> Name </p>
        <input type="text" name="name">
        <br>
{{--        <input type="file" name="logo">--}}
        <p> Link Logo </p>
{{--        <input type="text" name="img">--}}
        <input type="file" name="img">
        <br>
        <p> Content </p>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <p> Price </p>
        <input type="number" name="price">
        <input type="number" name="brand_id">
        <button type="submit">Send</button>
    </form>
@endsection
