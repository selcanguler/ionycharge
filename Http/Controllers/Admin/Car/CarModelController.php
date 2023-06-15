<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin\Car;
use App\Http\Controllers\Controller;
use App\Models\Admin\Car\CarModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Car\CarModelRequest;
use Gate;

class CarModelController extends Controller
{

    public function index()
    {
        if (Gate::none(['car_model_allow', 'car_model_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = CarModel::where("admiko_car_id",Request()->admiko_car_id)->orderByDesc("id")->get();
        return view("admin.car.car_model.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['car_model_allow'])) {
            return redirect(route("admin.car_model.index",[Request()->admiko_car_id]));
        }
        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.car_model.store",[Request()->admiko_car_id]);
        
        
        return view("admin.car.car_model.manage")->with(compact('admiko_data'));
    }

    public function store(CarModelRequest $request)
    {
        if (Gate::none(['car_model_allow'])) {
            return redirect(route("admin.car_model.index",[Request()->admiko_car_id]));
        }
        $data = $request->all();
        
		$data["admiko_car_id"] = Request()->admiko_car_id;
        $CarModel = CarModel::create($data);
        
        return redirect(route("admin.car_model.index",[Request()->admiko_car_id]));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($admiko_car_id,$id)
    {
        $CarModel = CarModel::find($id);
        if (Gate::none(['car_model_allow', 'car_model_edit']) || !$CarModel) {
            return redirect(route("admin.car_model.index",[$admiko_car_id]));
        }

        $admiko_data['sideBarActive'] = "car";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.car_model.update", [$admiko_car_id,$CarModel->id]);
        
        
        $data = $CarModel;
        return view("admin.car.car_model.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(CarModelRequest $request,$admiko_car_id,$id)
    {
        if (Gate::none(['car_model_allow', 'car_model_edit'])) {
            return redirect(route("admin.car_model.index",[$admiko_car_id]));
        }
        $data = $request->all();
        $CarModel = CarModel::find($id);
        $CarModel->update($data);
        
        return redirect(route("admin.car_model.index",[$admiko_car_id]));
    }

    public function destroy(Request $request,$admiko_car_id)
    {
        if (Gate::none(['car_model_allow'])) {
            return redirect(route("admin.car_model.index",[$admiko_car_id]));
        }
        CarModel::destroy($request->idDel);
        return back();
    }
    
    
    
}
