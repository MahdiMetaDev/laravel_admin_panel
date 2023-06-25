@extends('admin.layout.master')

@section('top_title')
    Brands List
@endsection

@section('sub_title')
    admin page
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">created at</th>
            <th scope="col">settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <th scope="row">{{$brand->id}}</th>
                <td>{{$brand->name}}</td>
                <td>{{$brand->created_at}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('admin.brand.show',$brand->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-info">edit</a>
                        <form action="{{route('admin.brand.destroy',$brand->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
