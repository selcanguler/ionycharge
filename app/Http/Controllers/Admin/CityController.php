<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CityRequest;
use Gate;

class CityController extends Controller
{

    public function index()
    {
        if (Gate::none(['city_allow', 'city_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = City::orderByDesc("id")->get();
        return view("admin.city.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['city_allow'])) {
            return redirect(route("admin.city.index"));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.city.store");
        
        
        return view("admin.city.manage")->with(compact('admiko_data'));
    }

    public function store(CityRequest $request)
    {
        if (Gate::none(['city_allow'])) {
            return redirect(route("admin.city.index"));
        }
        $data = $request->all();
        
        $City = City::create($data);
        
        return redirect(route("admin.city.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $City = City::find($id);
        if (Gate::none(['city_allow', 'city_edit']) || !$City) {
            return redirect(route("admin.city.index"));
        }

        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.city.update", [$City->id]);
        
        
        $data = $City;
        return view("admin.city.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(CityRequest $request,$id)
    {
        if (Gate::none(['city_allow', 'city_edit'])) {
            return redirect(route("admin.city.index"));
        }
        $data = $request->all();
        $City = City::find($id);
        $City->update($data);
        
        return redirect(route("admin.city.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['city_allow'])) {
            return redirect(route("admin.city.index"));
        }
        City::destroy($request->idDel);
        return back();
    }
    
    
    
}
