@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.category.update', ['category' => $category])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{$category->name}}">
        <br>
        <input type="file" name="logo">
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <button type="submit">Send</button>
    </form>
@endsection
