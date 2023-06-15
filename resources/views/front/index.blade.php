@extends('front.layouts.app')
@section('title', 'Home')
@section('content')
    <header class="pt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold mb-5">Welcome to<br><span class="underline">IONY!</span></h1>
                        <p class="fs-5 text-muted mb-5">We are grateful to meet you</p>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="text-center position-relative"><img class="img-fluid" src="{{ asset('assets/front/img/illustrations/qZAiTd8duFB1AAEJnwN0D3T0.png') }}" style="width: 800px;"></div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-2 row-cols-md-4">
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon" style="background: rgb(255,255,255);"><img src="{{ asset('assets/front/img/logos/image_3.png') }}" width="109" height="56"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon" style="background: rgb(255,255,255);"><img src="{{ asset('assets/front/img/logos/image_4.png') }}" width="66" height="45"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon" style="background: rgb(255,255,255);"><img src="{{ asset('assets/front/img/logos/image_5-removebg-preview.png') }}" width="91" height="91"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon" style="background: rgb(255,255,255);"><img src="{{ asset('assets/front/img/logos/image_6.png') }}" width="66" height="45"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="display-6 fw-bold pb-md-4">Easy Charging with IONY Mobile&nbsp;<span class="underline">Application</span></h3>
                </div>
                <div class="col-md-6 pt-4">
                    <p class="text-muted mb-4">You can view the locations of the charging stations,&nbsp;display your past usage and easily perform your transactions by scanning the QR code with the IONY mobile application.</p>
                </div>
            </div>
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <div class="row gy-2 row-cols-1 row-cols-sm-2">
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-warning">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2"> EASY CHARGE</h5>
                                </div>
                                <p class="text-muted my-3">Easy charge with QR and easy interface</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-warning">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2">BOOKING OPTIONS</h5>
                                </div>
                                <p class="text-muted my-3">Charge your car with the date and time when you want.</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-warning">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2">SPECIAL WIDGETS</h5>
                                </div>
                                <p class="text-muted my-3">View car battery, weather and total distance that you make</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-warning">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2">EASY PAYMENT METHOD</h5>
                                </div>
                                <p class="text-muted my-3">Easy payment with your card with QR</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-last">
                    <div><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="{{ asset('assets/front/img/illustrations/ootopark_2-removebg-preview.png') }}"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div><img class="rounded img-fluid fit-cover" style="min-height: 300px;" src="{{ asset('assets/front/img/illustrations/ford-mustang-e-mach-2.png') }}" width="800"></div>
                </div>
                <div class="col">
                    <div style="max-width: 450px;">
                        <p class="text-muted py-4 py-md-0">"The fastest way to charge your EV."</p>
                        <div class="row gy-4 row-cols-2 row-cols-md-2">
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">3457</span>
                                    <p class="fw-normal text-muted">Charging Station Network</p>
                                </div>
                            </div>
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">81</span>
                                    <p class="fw-normal text-muted">In every province of Turkey</p>
                                </div>
                            </div>
                            <div class="col">
                                <div><span class="fs-2 fw-bold text-primary bg-warning">%100</span>
                                    <p class="fw-normal text-muted">Our ultimate goal is happiness</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="bg-primary border rounded border-0 border-primary overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div class="text-white p-4 p-md-5">
                            <h2 class="fw-bold text-white mb-3">So start exploring the world with confidence, knowing that you have our navigation app to guide you to the nearest charging station.</h2>
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-contain pt-5 pt-md-0" src="{{ asset('assets/front/img/illustrations/image-removebg-preview.png') }}"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="display-6 fw-bold mb-4">Pricing</h2>
                    <p class="text-muted">Iony is committed to providing our customers with competitive and reasonable prices, while maintaining profitability and investing in the future of our products and services.</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col">
                    <div class="card border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div>
                                <h6 class="fw-bold text-muted">Standard</h6>
                                <h4 class="display-5 fw-bold mb-4">₺0/mo</h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Display navigation</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Comment and share</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Easy payment</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Adding personal car</span></li>
                                </ul>
                            </div><a class="btn btn-primary" role="button" href="#">Try for free</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-warning border-2 h-100">
                        <div class="card-body d-flex flex-column justify-content-between p-4"><span class="badge bg-warning position-absolute top-0 end-0 rounded-bottom-left text-uppercase text-primary">Most Popular</span>
                            <div>
                                <h6 class="fw-bold text-muted">Pro</h6>
                                <h4 class="display-5 fw-bold mb-4">₺70/mo</h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Booking the specific date and hour</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Adding special widgets</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Priority in Contact</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Special discounts</span></li>
                                </ul>
                            </div><a class="btn btn-warning" role="button" href="#">Try for free</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div class="pb-4">
                                <h6 class="fw-bold text-muted">Enterprise</h6>
                                <h4 class="display-5 fw-bold mb-4"><strong>₺250/mo</strong></h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Contact us for customization</span></li>
                                </ul>
                            </div><a class="btn btn-primary" role="button" href="#">Try for free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 .col-lg-6 .col-xl-5 mx-auto" id="map">
            <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/d/u/0/embed?mid=1e5d8F_GXGNTCk77ixx2kcnewj_RdjO0&amp;ehbc=2E312F" width="100%" height="400"></iframe>
        </div>
    </section>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="text-white bg-primary border rounded border-0 border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5">
                <div class="pb-2 pb-lg-1">
                    <h2 class="fw-bold text-warning mb-2">Not sure which plan suits you?</h2>
                    <p class="mb-0" style="width: 724.047px;">Iony is committed to providing our customers with competitive and reasonable prices, while maintaining profitability and investing in the future of our products and services.</p>
                </div>
                <div class="my-2"><a class="btn btn-light fs-5 py-2 px-4" role="button" href="contact-us.html">Contact us</a></div>
            </div>
        </div>
    </section>
@endsection