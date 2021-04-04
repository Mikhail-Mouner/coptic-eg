@extends('layouts.error.app')
@section('page-title','Lock Screen')

@section('content')

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Lock screen</h5>
                                <p class="text-white-50 mb-0">Enter your password to unlock the screen!</p>
                                <div class="logo logo-admin mt-4">
                                    <img src="{{ auth()->user()->getPhoto() }}" class="rounded-circle img-thumbnail avatar-md" alt="{{ auth()->user()->name }}" height="30">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5">

                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('unlock') }}" method="post">
                                    @csrf
                                    <div class="user-thumb text-center mb-4">
                                        <h5 class="font-size-15 mt-3">{{ auth()->user()->name }}</h5>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-6 text-left">
                                            <form method="post" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="btn btn-link  text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</button>
                                            </form>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

