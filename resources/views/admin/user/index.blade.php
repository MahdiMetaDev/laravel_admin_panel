@extends('admin.layout.master')

@section('top_title')
    Users List
@endsection

@section('sub_title')
    admin page
@endsection

@section('confirmation_script')
    <script>
        function getConfirmation(id) {
            let is_deletable = confirm("Do you want to continue ?");
            if (is_deletable) {
                fetch('/admin/user/' + id, {
                    method: 'delete',
                    headers: {
                        'x-csrf-token': '{{ csrf_token() }}'
                    }
                }).then(() => {
                    window.open(window.location.href, '_self')
                })
            }
        }
    </script>
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">family</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">created at</th>
            <th scope="col">settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->family}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-info">edit</a>
                        <button class="btn btn-danger" onclick="getConfirmation({{ $user->id }});">delete</button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
