@extends('layouts.admin')
@section('content')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Responsive Tables</div>
        </div>
        <a href="{{route('admin.product.create')}}">Create</a>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Img</th>
                        <th>Content</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration + (($products->currentPage()-1)*$products ->perPage())}}</td>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            @if(str_starts_with($product->img, 'https'))
                                <td><img src="{{asset($product->img)}}" alt=""></td>
                            @else
                            <td><img src="public/storage/newfolder/{{$product->name}}.jpg" alt="{{$product->name.'.jpg'}}"></td>
                            @endif
                            <td>{{$product->content}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->status}}</td>
                            <td>
                                <a href="{{route('admin.product.show', ['product' => $product->id]) }}">Show</a>
                                <a href="{{route('admin.product.edit', ['product' => $product]) }}">Edit</a>
                                <form action="{{route('admin.product.destroy', compact('product')) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
