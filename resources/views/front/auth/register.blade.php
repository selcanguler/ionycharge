@extends('front.layouts.app')
@section('title', 'Register')
@section('css')
    <style>
        .tab {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section class="py-4 py-md-5 my-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="{{ asset('assets/front/img/illustrations/register.svg') }}"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Sign up</strong></span></h2>
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
                    <form method="post" action="{{ route('register.post') }}">
                        @csrf
                        <div class="tab">
                            <div class="mb-3"><input class="shadow-sm form-control" type="text" name="firstname" placeholder="Firstname"></div>
                            <div class="mb-3"><input class="shadow-sm form-control" type="text" name="lastname" placeholder="Lastname"></div>
                        </div>
                        <div class="tab">
                            <div class="mb-3"><input class="shadow-sm form-control" type="email" name="email" placeholder="Email"></div>
                            <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password" placeholder="Password"></div>
                        </div>
                        <div style="overflow: auto;">
                            <div style="float: right;">
                                <button class="btn btn-info shadow" type="button" id="prevBtn">Previous</button>
                                <button class="btn btn-primary shadow" type="button" id="nextBtn">Next</button>
                                <button class="btn btn-primary shadow d-none" type="submit" id="submitBtn">Submit</button>
                            </div>
                        </div>
                        <p class="text-muted">
                            Have an account?
                            <a href="{{ route('login') }}">
                                Log in
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <line x1="15" y1="16" x2="19" y2="12"></line>
                                    <line x1="15" y1="8" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var currentTab = 0;
            showTab(currentTab);

            function showTab(n) {
                var x = $(".tab");
                x.eq(n).show();

                if (n == 0) {
                    $("#prevBtn").hide();
                } else {
                    $("#prevBtn").show();
                }

                if (n == (x.length - 1)) {
                    $("#nextBtn").hide();
                    $("#submitBtn").removeClass("d-none");
                } else {
                    $("#nextBtn").show();
                    $("#submitBtn").addClass("d-none");
                }
            }

            function nextPrev(n) {
                var x = $(".tab");
                x.eq(currentTab).hide();
                currentTab = currentTab + n;
                showTab(currentTab);
            }

            $("#prevBtn").click(function() {
                nextPrev(-1);
            });

            $("#nextBtn").click(function() {
                nextPrev(1);
            });
        });
    </script>
@endsection