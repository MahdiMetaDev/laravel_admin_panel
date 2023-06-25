@extends('admin.layout.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header bg-danger text-light">
                    List of Comments
                </div>

                <div class="card-body">
                    <table class="table table-hover text-center">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">user id</th>
                            <th scope="col">commentable_type</th>
                            <th scope="col">commentable_id</th>
                            <th scope="col">title</th>
                            <th scope="col">published</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <th scope="row">{{ $comment->id }}</th>
                                <td>{{ $comment->user_id }}</td>
                                <td>{{ $comment->commentable_type }}</td>
                                <td>{{ $comment->commentable_id }}</td>
                                <td>{{ $comment-> title}}</td>
                                <td>
                                    <form action="{{ route('admin.comment.statusUpdate', $comment->id) }}" method="post" novalidate>
                                        @csrf
                                        @method('PATCH')
                                        <input class="btn btn-success" type="submit" name="recommended"
                                               value="yes" {{ $comment->published == true ? 'disabled' : ''}}>
                                        <input class="btn btn-danger" type="submit" name="not_recommended"
                                               value="no" {{ $comment->published == false ? 'disabled' : ''}}>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection()
