@extends('admin.layout.master')

@section('top_title')
    Blogs List
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
            <th scope="col">category_id</th>
            <th scope="col">name</th>
            <th scope="col">create at</th>
            <th scope="col">settings</th>
            <th scope="col">like</th>
            <th scope="col">dislike</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{{isset($blog->user_id) ? $blog->user_id : 'null'}}</td>
                <td>{{isset($blog->category_id) ? $blog->category_id : 'null'}}</td>
                <td>{{$blog->name}}</td>
                <td>{{$blog->created_at}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('admin.blog.show',$blog->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('admin.blog.edit',$blog->id)}}" class="btn btn-info">edit</a>
                        <form action="{{route('admin.blog.destroy',$blog->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </td>
                <td>
                    <a href="{{ route('admin.blog.like', $blog->id) }}">
                        <i class="fa fa-heart"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.blog.dislike', $blog->id) }}" class="text-danger">
                        <i class="fa fa-heart"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
