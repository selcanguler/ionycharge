@extends('front.layouts.app')
@section('title', 'Booking')
@section('content')
    <section class="py-5 mt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="alert alert-warning" role="alert"><span style><strong>Warning!</strong> Cancellation can be made up to 1 hour before the reservation time. For reservation delay/cancellation, 25% of your payment is taken in advance..</span>
            </div>
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
            <div class="row pt-5">
                <div class="col">
                    <h1 class="display-4 fw-bold text-center mb-5">History</h1>
                    <section class="py-4 py-xl-5">
                        <div class="card mb-5">
                            <div class="accordion" role="tablist" id="accordion-1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#accordion-1 .item-1" aria-expanded="true"
                                                aria-controls="accordion-1 .item-1">Past and Current Bookings
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                         data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            @if($bookings->count())
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Booking Details</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($bookings as $booking)
                                                            <tr>
                                                                <td>{{ $booking->city_id->title }} - {{ $booking->district_id->title }} - {{ $booking->station_id->title }} - {{ $booking->booking_date }} - {{ $booking->booking_time }}</td>
                                                                <td>
                                                                    @if($booking->booking_date <= date('Y-m-d'))
                                                                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-warning" role="alert"><span style><strong>Warning!</strong> You have no booking history.</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col">
                    <h1 class="display-4 fw-bold text-center mb-5">New Booking</h1>
                    <section class="py-4 py-xl-5">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card mb-5">
                                        <div class="card-body p-sm-5">
                                            <form method="post" action="{{ route('booking.post') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <select class="form-select form-select form-select" name="car_brand"
                                                            id="car_brand">
                                                        <optgroup label="Car Brand">
                                                            <option value="" selected="">Select Car</option>
                                                            @foreach($cars as $car)
                                                                <option value="{{ $car->id }}" {{ old('car_brand_model') == $car->id ? 'selected' : '' }}>{{ $car->brand_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="car_model" id="car_model">
                                                        <optgroup label="Car Model">
                                                            <option value="" selected="">Select Model</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="city" id="city">
                                                        <option value="" selected="">Select City</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="district" id="district">
                                                        <option value="" selected="">Select District</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="station" id="station">
                                                        <option value="" selected="">Select Station</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3"><input class="form-control form-control form-control"
                                                                         type="date" name="booking_date"
                                                                         value="{{ old('booking_date') }}"></div>
                                                <div class="mb-3">
                                                    <select class="form-select form-select" name="booking_time">
                                                        <option value="" selected="">Select Time</option>
                                                        <optgroup>
                                                            @for($i = 6; $i < 25; $i++)
                                                                @if($i < 10)
                                                                    <option value="0{{$i}}:00">0{{$i}}:00</option>
                                                                @else
                                                                    @if($i == 24)
                                                                        <option value="00:00">00:00</option>
                                                                    @else
                                                                        <option value="{{$i}}:00">{{$i}}:00</option>
                                                                    @endif
                                                                @endif
                                                            @endfor
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="car_type" id="car_type">
                                                        <optgroup label="Car Type">
                                                            <option value="" selected="">Select Car Type</option>
                                                            <option value="AC">AC</option>
                                                            <option value="DC">DC</option>
                                                            <option value="AC/DC">AC/DC</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="mb-3"><input class="form-control form-control form-control"
                                                                         type="text" placeholder="Cost" name="cost"
                                                                         id="cost" value="{{ old('cost') }}" readonly>
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
                $('#cost').val("360 ₺");
            } else if (car_type == 'DC') {
                $('#cost').val("390 ₺");
            } else if (car_type == 'AC/DC') {
                $('#cost').val("420 ₺");
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

        $('#car_brand').on('change', function () {
            var car_brand_id = $(this).val();
            if (car_brand_id) {
                $.ajax({
                    url: "{{ route('get-car-models') }}",
                    type: "POST",
                    data: {
                        car_brand_id: car_brand_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (data.length > 0) {
                            $('#car_model').empty();
                            $('#car_model').append('<option value="" selected="">Select Model</option>');
                            $.each(data, function (key, value) {
                                $('#car_model').append('<option value="' + value.id + '">' + value.model_name + '</option>');
                            });
                        } else {
                            $('#car_model').empty();
                            $('#car_model').append('<option value="" selected="">Model Not Found</option>');
                        }
                    },
                });
            } else {
                $('#car_model').empty();
                $('#car_model').append('<option value="" selected="">Select Model</option>');
            }
        });
    </script>
@endsection