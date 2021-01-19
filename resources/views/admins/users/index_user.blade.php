@extends('layouts.app')

@section('content')

    <div class="box box-primary">
    <center><h1>this is user page</h1></center>

    @if($users->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th>actions</th>
                    </tr>
               </thead>
            <tbody>
                @foreach($users as $index=>$user)
                <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if(auth()->user()->hasPermission('users-update'))
                            <a href="{{route('update_user',$user->id)}}"class='btn btn-info'>Edit</a>
                        @else
                            <a href="#" class="btn btn-info btn-sm disabled">Edit</a>
                        @endif

                        @if(auth()->user()->hasPermission('users-delete'))
                            <a href="{{route('delete_user',$user->id)}}"class='btn btn-danger'>Delete</a>
                        @else
                            <a href="#" class="btn btn-info btn-sm disabled">Delete</a>
                        @endif
                    </td>
                </tr>

                @endforeach
            </tbody>
                @else
                <center><h2>No Users Yet</h2></center>
        @endif
        </table>

            <form action="{{ route('index_user') }}" method="get">
                @if(auth()->user()->hasPermission('users-create'))
                        <a href="{{route('create_user')}}" class="btn btn-primary">Create</a>
                @else
                        <a href="#" class="btn btn-primary disabled">Create</a>
                @endif
            </form>
        </div>
@endsection

