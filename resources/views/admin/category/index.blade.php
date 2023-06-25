@extends('admin.layout.master')

@section('top_title')
    Categories List
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
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('admin.category.show', $category->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-info">edit</a>
                        <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
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
