@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>
        <a href="{{route('admin.brand.create')}}">Create</a>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Brand Name</th>
                        <th>Last Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$loop->iteration + (($brands->currentPage()-1)*$brands ->perPage())}}</td>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td></td>
                        <td>
                            <a href="{{route('admin.brand.show', ['brand' => $brand->id]) }}">Show</a>
                            <a href="{{route('admin.brand.edit', ['brand' => $brand]) }}">Edit</a>
                            <form action="{{route('admin.brand.destroy', compact('brand')) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $brands->links() !!}
            </div>
        </div>
    </div>
@endsection
