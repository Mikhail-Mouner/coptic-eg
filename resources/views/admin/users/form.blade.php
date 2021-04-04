@extends('layouts.admin.app')
@if( isset($user) )
    @section('page-title','Edit User | '.$user->name)
@section('title','Edit User - '.$user->name)
@else
    @section('title','Add New User')
@section('page-title','Add New User')
@endif
@section('style')@endsection


@section('sub-title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0 text-capitalize">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">users</a></li>

            @if( isset($user) )
                <li class="breadcrumb-item active">Edit User</li>
            @else
                <li class="breadcrumb-item active">add new User</li>
            @endif

        </ol>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if( isset($course) )
                        <h4 class="card-title mb-4">Edit User</h4>
                    @else
                        <h4 class="card-title mb-4">Add New User</h4>
                    @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form class="outer-repeater"
                          @if( isset($user) )
                          action="{{ route('admin.users.update',$user->id) }}"
                          @else
                          action="{{ route('admin.users.store') }}"
                          @endif
                          method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        @if( isset($user) )
                            @method('PUT')
                        @endif
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="name" class="col-form-label col-lg-2">User Name</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter User Name..."
                                               @if( isset($user) )
                                               value="{{ $user->name }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="email" class="col-form-label col-lg-2">E-mail</label>
                                    <div class="col-lg-10">
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter User Email..."
                                               @if( isset($user) )
                                               value="{{ $user->email }}"
                                            @endif
                                        />
                                    </div>
                                </div>
                            </div>
                            @if( !isset($user) )
                                <div class="col-6">
                                    <div class="form-group row  mb-4">
                                        <label for="password" class="col-form-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
                                            <input id="password" name="password" type="password" class="form-control" placeholder="Enter password...">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-6">
                                <div class="form-group row  mb-4">
                                    <label for="role" class="col-form-label col-lg-2">Role</label>
                                    <div class="col-lg-10">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="role" id="role-user" value="user"
                                                   @if( isset($user) )
                                                   {{ $user->role == 'user'?'checked=""':'' }}
                                                   @else
                                                   checked=""
                                                @endif
                                            />
                                            <label class="form-check-label" for="role-user">
                                                <i class="fas fa-user fa-fw"></i>
                                                User
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="role-admin" value="admin"
                                            @if( isset($user) )
                                                {{ $user->role == 'admin'?'checked=""':'' }}
                                                @endif
                                            >
                                            <label class="form-check-label" for="role-admin">
                                                <i class="fas fa-user-tie fa-fw"></i>
                                                Admin
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-group row  mb-4">
                                    <label for="password" class="col-form-label col-lg-1">photo</label>
                                    <div class="col-lg-11">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" >
                                            <label class="custom-file-label" for="photo">Choose Photo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if( isset($user) )
                                <div class="col-12"><img src="{{ $user->getPhoto() }}" class="img-fluid rounded-top" alt="{{ $user->name }}" style="width: 10em;height: 10em;display: block;margin: auto"></div>
                            @endif
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-11">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
