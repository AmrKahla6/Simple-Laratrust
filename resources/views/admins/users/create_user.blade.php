@extends('layouts.app')

@section('content')

<center><h1>Create users</h1></center>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create users</div>

                <div class="card-body">
                    <form method="POST" action="{{route('create_user_store')}}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>

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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <select name="">

                        </select> --}}

                        {{-- <label><input type="checkbox" name="permissions[]"value="create_user">Admin</label>
                        <label><input type="checkbox"name="permissions[]"value="update_user">update user</label>
                        <label><input type="checkbox"name="permissions[]"value="delete_user">delete user</label>
                        <label><input type="checkbox"name="permissions[]"value="read_user">read user</label> --}}

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Send Data
                                </button>
                            </div>
                        </div> --}}

                            <div class="form-group">
                                <label for="">Permissions</label>
                                <div class="nav-tabs-custom">

                                @php
                                    $models = ['users' , 'categories' , 'products' , 'clients', 'orders'];
                                    $maps   = ['create' , 'read' , 'update' , 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                            <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab"> {{ $model . " "}} </a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                @foreach ($models as $index=>$model)

                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                        @foreach($maps as $map)
                                            <label> <input type="checkbox" name="permissions[]" value="{{ $model . '-' . $map }}"> {{ $map }} </label>
                                        @endforeach

                                    </div>


                                @endforeach



                                </div> <!-- end of tabs content -->
                                </div><!-- end of tabs -->
                            </div> <!-- end of form group -->
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Send Data</button>
                                    </div> <!-- end of form-group password confirmation-->
                            </div> <!-- end of box body-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
