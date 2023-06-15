@extends('front.layouts.app')
@section('title', 'My Account')
@section('content')
    <section class="py-5 mt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col">
                    <h1 class="display-4 fw-bold text-center mb-5">My Account</h1>
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
                    <section class="py-4 py-xl-5">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card mb-5">
                                        <div class="card-body p-sm-5">
                                            <form method="post" action="{{ route('my-account.post') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <input class="form-control form-control form-control" type="text" name="firstname" value="{{ old('firstname', session('customer')->firstname) }}" placeholder="First Name">
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control form-control form-control" type="text" name="lastname" value="{{ old('lastname', session('customer')->lastname) }}" placeholder="Last Name">
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control form-control form-control" type="text" name="email" value="{{ old('email', session('customer')->email) }}" placeholder="Email">
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control form-control form-control" type="password" name="password" placeholder="Password">
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary d-block w-100" type="submit">Send
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="text-center position-relative"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('#car_type').on('change', function () {
            var car_type = $(this).val();
            if (car_type == 'AC') {
                $('#cost').val(360);
            } else if (car_type == 'DC') {
                $('#cost').val(390);
            } else if (car_type == 'AC/DC') {
                $('#cost').val(420);
            }
        });

        $('#city').on('change', function () {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: "{{ route('get-districts') }}",
                    type: "POST",
                    data: {
                        city_id: city_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (data.length > 0) {
                            $('#district').empty();
                            $('#district').append('<option value="" selected="">Select District</option>');
                            $.each(data, function (key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.title + '</option>');
                            });
                        } else {
                            $('#district').empty();
                            $('#district').append('<option value="" selected="">District Not Found</option>');
                        }
                    },
                });
            } else {
                $('#district').empty();
                $('#district').append('<option value="" selected="">Select District</option>');
            }
        });

        $('#district').on('change', function () {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ route('get-stations') }}",
                    type: "POST",
                    data: {
                        district_id: district_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (data.length > 0) {
                            $('#station').empty();
                            $('#station').append('<option value="" selected="">Select Station</option>');
                            $.each(data, function (key, value) {
                                $('#station').append('<option value="' + value.id + '">' + value.title + '</option>');
                            });
                        } else {
                            $('#station').empty();
                            $('#station').append('<option value="" selected="">Station Not Found</option>');
                        }
                    },
                });
            } else {
                $('#station').empty();
                $('#station').append('<option value="" selected="">Select Station</option>');
            }
        });
    </script>
@endsection