<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.auth.login');
    }

    public function loginPost(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if ($customer) {
            if (Hash::check($request->password, $customer->password)) {
                session()->put('customer', $customer);

                return to_route('index');
            } else {
                return back()->with('error', 'Password is incorrect')->withInput();
            }
        } else {
            return back()->with('error', 'Email is incorrect')->withInput();
        }
    }

    public function register()
    {
        return view('front.auth.register');
    }

    public function registerPost(Request $request)
    {
        $data = $request->all();

        if ($request->firstname) {
            if ($request->lastname) {
                if ($request->email) {
                    if ($request->password) {
                        $customer = Customer::create($data);

                        if ($customer) {
                            return to_route('login')->with('success', 'Registration successful please login');
                        } else {
                            return back()->with('error', 'Something went wrong')->withInput();
                        }
                    } else {
                        return back()->with('error', 'Password is required')->withInput();
                    }
                } else {
                    return back()->with('error', 'Email is required')->withInput();
                }
            } else {
                return back()->with('error', 'Lastname is required')->withInput();
            }
        } else {
            return back()->with('error', 'Name is required')->withInput();
        }
    }

    public function logout()
    {
        session()->forget('customer');

        return to_route('login');
    }
}