<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BookingRequest;
use Gate;
use App\Models\Admin\Customer;
use App\Models\Admin\Car;
use App\Models\Admin\Car\CarModel;
use App\Models\Admin\City;
use App\Models\Admin\City\District;
use App\Models\Admin\City\District\Station;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        if (Gate::none(['booking_allow', 'booking_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "booking";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Booking::search($request->query("search"))->orderByDesc("id")->paginate($request->query("length")??array_key_first(config("admiko_config.length_menu_table")));
        return view("admin.booking.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['booking_allow'])) {
            return redirect(route("admin.booking.index"));
        }
        $admiko_data['sideBarActive'] = "booking";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.booking.store");
        
        
		$customer_all = Customer::all()->sortBy("firstname")->pluck("firstname", "id");
		$car_all = Car::all()->sortBy("brand_name")->pluck("brand_name", "id");
		$car_model_all = CarModel::all()->sortBy("model_name")->pluck("model_name", "id");
		$car_type_all = Booking::CAR_TYPE_CONS;
		$city_all = City::all()->sortBy("title")->pluck("title", "id");
		$district_all = District::all()->sortBy("title")->pluck("title", "id");
		$station_all = Station::all()->sortBy("title")->pluck("title", "id");
		$booking_time_all = Booking::BOOKING_TIME_CONS;
        return view("admin.booking.manage")->with(compact('admiko_data','customer_all','car_all','car_model_all','car_type_all','city_all','district_all','station_all','booking_time_all'));
    }

    public function store(BookingRequest $request)
    {
        if (Gate::none(['booking_allow'])) {
            return redirect(route("admin.booking.index"));
        }
        $data = $request->all();
        
        $Booking = Booking::create($data);
        
        return redirect(route("admin.booking.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Booking = Booking::find($id);
        if (Gate::none(['booking_allow', 'booking_edit']) || !$Booking) {
            return redirect(route("admin.booking.index"));
        }

        $admiko_data['sideBarActive'] = "booking";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.booking.update", [$Booking->id]);
        
        
		$customer_all = Customer::all()->sortBy("firstname")->pluck("firstname", "id");
		$car_all = Car::all()->sortBy("brand_name")->pluck("brand_name", "id");
		$car_model_all = CarModel::all()->sortBy("model_name")->pluck("model_name", "id");
		$car_type_all = Booking::CAR_TYPE_CONS;
		$city_all = City::all()->sortBy("title")->pluck("title", "id");
		$district_all = District::all()->sortBy("title")->pluck("title", "id");
		$station_all = Station::all()->sortBy("title")->pluck("title", "id");
		$booking_time_all = Booking::BOOKING_TIME_CONS;
        $data = $Booking;
        return view("admin.booking.manage")->with(compact('admiko_data', 'data','customer_all','car_all','car_model_all','car_type_all','city_all','district_all','station_all','booking_time_all'));
    }

    public function update(BookingRequest $request,$id)
    {
        if (Gate::none(['booking_allow', 'booking_edit'])) {
            return redirect(route("admin.booking.index"));
        }
        $data = $request->all();
        $Booking = Booking::find($id);
        $Booking->update($data);
        
        return redirect(route("admin.booking.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['booking_allow'])) {
            return redirect(route("admin.booking.index"));
        }
        Booking::destroy($request->idDel);
        return back();
    }
    
    
    
}
