<?php
/** Admiko routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/**Customer**/
Route::delete("customer/destroy", [CustomerController::class,"destroy"])->name("customer.delete");
Route::resource("customer", CustomerController::class)->parameters(["customer" => "customer"]);
/**ContactForm**/
Route::delete("contact_form/destroy", [ContactFormController::class,"destroy"])->name("contact_form.delete");
Route::resource("contact_form", ContactFormController::class)->parameters(["contact_form" => "contact_form"]);
/**Booking**/
Route::delete("booking/destroy", [BookingController::class,"destroy"])->name("booking.delete");
Route::resource("booking", BookingController::class)->parameters(["booking" => "booking"]);
/**Car**/
Route::delete("car/destroy", [CarController::class,"destroy"])->name("car.delete");
Route::resource("car", CarController::class)->parameters(["car" => "car"]);
/**Car CarModel**/
Route::delete("car/{admiko_car_id}/car_model/destroy", [Car\CarModelController::class,"destroy"])->name("car_model.delete");
Route::resource("car/{admiko_car_id}/car_model", Car\CarModelController::class)->parameters(["car_model" => "car_model"]);
/**City**/
Route::delete("city/destroy", [CityController::class,"destroy"])->name("city.delete");
Route::resource("city", CityController::class)->parameters(["city" => "city"]);
/**City District**/
Route::delete("city/{admiko_city_id}/district/destroy", [City\DistrictController::class,"destroy"])->name("district.delete");
Route::resource("city/{admiko_city_id}/district", City\DistrictController::class)->parameters(["district" => "district"]);
/**City District Station**/
Route::delete("city/{admiko_city_id}/district/{admiko_district_id}/station/destroy", [City\District\StationController::class,"destroy"])->name("station.delete");
Route::resource("city/{admiko_city_id}/district/{admiko_district_id}/station", City\District\StationController::class)->parameters(["station" => "station"]);
