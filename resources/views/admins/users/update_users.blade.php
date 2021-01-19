@extends('layouts.app')

@section('content')

            <center><h1>update user</h1></center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    <form method="POST" action="{{route('update_user_store',$users->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$users->name}}" name="name" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$users->email}}" name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="">Permissions</label>
                            <div class="nav-tabs-custom">

                            @php
                               $models = ['users' , 'categories' , 'products' , 'clients' , 'orders'];
                               $maps = ['create' , 'read' , 'update' , 'delete'];
                            @endphp

                              <ul class="nav nav-tabs">

                                   @foreach ($models as $index=>$model)
                                           <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">{{ $model }}</a></li>
                                   @endforeach
                               </ul>

                               <div class="tab-content">

                                   @foreach ($models as $index=>$model)

                                       <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                               <label><input type="checkbox" name="permissions[]" {{ $users->hasPermission($model . '-' . $map) ? 'checked' : '' }} value="{{ $model . '-' . $map }}"> {{ $map }}</label>
                                           @endforeach

                                </div>

                                @endforeach

                        {{-- <select name="">

                        </select> --}}

                        {{-- <label><input type="checkbox" name="permissions[]"value="create_user">Admin</label>
                        <label><input type="checkbox"name="permissions[]"value="update_user">update user</label>
                        <label><input type="checkbox"name="permissions[]"value="delete_user">delete user</label>
                        <label><input type="checkbox"name="permissions[]"value="read_user">read user</label> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Send Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
