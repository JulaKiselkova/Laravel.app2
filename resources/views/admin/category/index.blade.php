@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>
        <a href="{{route('admin.category.create')}}">Create category</a>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration + (($categories->currentPage()-1)*$categories ->perPage())}}</td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->status}}</td>
                            <td>
                                <a href="{{route('admin.category.show', ['category' => $category->id]) }}">Show</a>
                                <a href="{{route('admin.category.edit', ['category' => $category]) }}">Edit</a>
                                <form action="{{route('admin.category.destroy', compact('category')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
