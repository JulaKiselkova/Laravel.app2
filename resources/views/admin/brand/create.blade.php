@extends('layouts.admin')
@section('content')
    @dump($errors)
    <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" required value="{{ old('name') }}">
        <br>
        <input type="file" name="logo">
        <br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="checkbox" name="status" value="1">
        <br>
        <input type="text" name="create_year">
        <button type="submit">Send</button>
    </form>
@endsection
