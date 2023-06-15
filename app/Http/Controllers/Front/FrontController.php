<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactForm;
use App\Models\Admin\Booking;
use App\Models\Admin\City;
use App\Models\Admin\Car;
use App\Models\Admin\Car\CarModel;
use App\Models\Admin\City\District;
use App\Models\Admin\City\District\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function aboutUs()
    {
        return view('front.about-us');
    }

    public function contactUs()
    {
        return view('front.contact-us');
    }

    public function contactUsPost(Request $request)
    {
        $data = $request->all();

        if ($request->name) {
            if ($request->email) {
                if ($request->body) {
                    $contactUsForm = ContactForm::create($data);

                    if ($contactUsForm) {
                        return back()->with('success', 'Your message has been sent successfully.');
                    } else {
                        return back()->with('error', 'Something went wrong. Please try again.');
                    }
                } else {
                    return back()->with('error', 'Please enter your message.')->withInput();
                }
            } else {
                return back()->with('error', 'Please enter your email address.')->withInput();
            }
        } else {
            return back()->with('error', 'Please enter your name.')->withInput();
        }
    }

    public function booking()
    {
        if (!session()->has('customer')) {
            return redirect()->route('front.login');
        }

        return view('front.booking', [
            'cities' => City::orderBy('title', 'asc')->get(),
            'cars' => Car::orderBy('brand_name', 'asc')->get(),
            'bookings' => Booking::where('customer', session()->get('customer')->id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function bookingPost(Request $request)
    {
        $data = $request->all();

        if ($request->car_brand) {
            if ($request->car_model) {
                if ($request->city) {
                    if ($request->district) {
                        if ($request->station) {
                            if ($request->booking_date) {
                                if ($request->booking_time) {
                                    if ($request->car_type) {
                                        if ($request->cost) {
                                            $data['customer'] = session()->get('customer')->id;
                                            $data['booking_date'] = date('d/m/Y', strtotime($request->booking_date));

                                            $booking = Booking::create($data);

                                            if ($booking) {
                                                Mail::send('mails.booking', $data, function ($mail) use ($data) {
                                                    $mail->to(session()->get('customer')->email)
                                                        ->subject('IONY - Booking Details');
                                                });

                                                return back()->with('success', 'Your booking has been sent successfully.');
                                            } else {
                                                return back()->with('error', 'Something went wrong. Please try again.');
                                            }
                                        } else {
                                            return back()->with('error', 'Please enter your cost.')->withInput();
                                        }
                                    } else {
                                        return back()->with('error', 'Please enter your car type.')->withInput();
                                    }
                                } else {
                                    return back()->with('error', 'Please enter your booking time.')->withInput();
                                }
                            } else {
                                return back()->with('error', 'Please enter your booking date.')->withInput();
                            }
                        } else {
                            return back()->with('error', 'Please enter your station.')->withInput();
                        }
                    } else {
                        return back()->with('error', 'Please enter your district.')->withInput();
                    }
                } else {
                    return back()->with('error', 'Please enter your city.')->withInput();
                }
            } else {
                return back()->with('error', 'Please enter your car model.')->withInput();
            }
        } else {
            return back()->with('error', 'Please enter your car brand.')->withInput();
        }
    }

    public function bookingDelete(Request $request)
    {
        $booking = Booking::find($request->id);

        if ($booking) {
            $booking->delete();

            return back()->with('success', 'Your booking has been deleted successfully.');
        } else {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function myAccount()
    {
        if (!session()->has('customer')) {
            return redirect()->route('front.login');
        }

        return view('front.my-account');
    }

    public function myAccountPost(Request $request)
    {
        $data = $request->all();

        if ($request->firstname) {
            if ($request->lastname) {
                if ($request->email) {
                    $customer = session()->get('customer');
                    $customer->update($data);

                    if ($customer) {
                        session()->put('customer', $customer);

                        return back()->with('success', 'Your account has been updated successfully.')->withInput();
                    } else {
                        return back()->with('error', 'Something went wrong. Please try again.')->withInput();
                    }
                } else {
                    return back()->with('error', 'Please enter your email address.')->withInput();
                }
            } else {
                return back()->with('error', 'Please enter your last name.')->withInput();
            }
        } else {
            return back()->with('error', 'Please enter your first name.')->withInput();
        }
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('admiko_city_id', $request->city_id)->orderBy('title', 'asc')->get();

        return response()->json($districts);
    }

    public function getStations(Request $request)
    {
        $stations = Station::where('admiko_district_id', $request->district_id)->orderBy('title', 'asc')->get();

        return response()->json($stations);
    }

    public function getCarModels(Request $request)
    {
        $carModels = CarModel::where('admiko_car_id', $request->car_brand_id)->orderBy('model_name', 'asc')->get();

        return response()->json($carModels);
    }
}