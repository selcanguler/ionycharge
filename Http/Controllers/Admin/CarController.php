<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Car;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CarRequest;
use Gate;

class CarController extends Controller
{

    public function index()
    {
        if (Gate::none(['car_allow', 'car_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Car::orderByDesc("id")->get();
        return view("admin.car.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['car_allow'])) {
            return redirect(route("admin.car.index"));
        }
        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.car.store");
        
        
        return view("admin.car.manage")->with(compact('admiko_data'));
    }

    public function store(CarRequest $request)
    {
        if (Gate::none(['car_allow'])) {
            return redirect(route("admin.car.index"));
        }
        $data = $request->all();
        
        $Car = Car::create($data);
        
        return redirect(route("admin.car.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Car = Car::find($id);
        if (Gate::none(['car_allow', 'car_edit']) || !$Car) {
            return redirect(route("admin.car.index"));
        }

        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.car.update", [$Car->id]);
        
        
        $data = $Car;
        return view("admin.car.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(CarRequest $request,$id)
    {
        if (Gate::none(['car_allow', 'car_edit'])) {
            return redirect(route("admin.car.index"));
        }
        $data = $request->all();
        $Car = Car::find($id);
        $Car->update($data);
        
        return redirect(route("admin.car.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['car_allow'])) {
            return redirect(route("admin.car.index"));
        }
        Car::destroy($request->idDel);
        return back();
    }
    
    
    
}
