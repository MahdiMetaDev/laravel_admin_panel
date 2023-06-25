@extends('admin.layout.master')

@section('top_title')
    Products List
@endsection

@section('sub_title')
    admin page
@endsection

@section('content')
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">user_id</th>
            <th scope="col">brand_id</th>
            <th scope="col">category_id</th>
            <th scope="col">name</th>
            <th scope="col">settings</th>
            <th scope="col">like</th>
            <th scope="col">dislike</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{isset($product->user_id) ? $product->user_id : 'null'}}</td>
                <td>{{isset($product->brand_id) ? $product->brand_id : 'null'}}</td>
                <td>{{isset($product->category_id) ? $product->category_id : 'null'}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('admin.product.show',$product->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('admin.product.edit',$product->id)}}" class="btn btn-info">edit</a>
                        <form action="{{route('admin.product.destroy',$product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </td>
                <td>
                    <a href="{{ route('admin.product.like', $product->id) }}">
                        <i class="fa fa-heart"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.product.dislike', $product->id) }}" class="text-danger">
                        <i class="fa fa-heart"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
