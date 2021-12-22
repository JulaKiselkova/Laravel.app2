@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.brand.update', ['brand' => $brand])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{$brand->name}}">
        <br>
        <input type="file" name="logo">
        <br>
        <textarea name="description" id="" cols="30" rows="10" >{{$brand->description}}</textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <input type="text" name="create_year" value ="{{$brand->create_year}}">
        <button type="submit">Send</button>
    </form>
@endsection
