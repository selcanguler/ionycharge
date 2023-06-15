@extends('front.layouts.app')
@section('title', 'Log in')
@section('content')
    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="{{ asset('assets/front/img/illustrations/login.svg') }}"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Login</strong><br></span></h2>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3"><input class="shadow form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}"></div>
                        <div class="mb-3"><input class="shadow form-control" type="password" name="password" placeholder="Password"></div>
                        <div class="mb-5"><button class="btn btn-primary shadow" type="submit">Log in</button></div>
                        <p class="text-muted"><a href="{{ route('register') }}">Register</a> if you don't have an account.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection