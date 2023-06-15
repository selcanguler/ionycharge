<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin\City;
use App\Http\Controllers\Controller;
use App\Models\Admin\City\District;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\City\DistrictRequest;
use Gate;

class DistrictController extends Controller
{

    public function index()
    {
        if (Gate::none(['district_allow', 'district_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = District::where("admiko_city_id",Request()->admiko_city_id)->orderByDesc("id")->get();
        return view("admin.city.district.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['district_allow'])) {
            return redirect(route("admin.district.index",[Request()->admiko_city_id]));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.district.store",[Request()->admiko_city_id]);
        
        
        return view("admin.city.district.manage")->with(compact('admiko_data'));
    }

    public function store(DistrictRequest $request)
    {
        if (Gate::none(['district_allow'])) {
            return redirect(route("admin.district.index",[Request()->admiko_city_id]));
        }
        $data = $request->all();
        
		$data["admiko_city_id"] = Request()->admiko_city_id;
        $District = District::create($data);
        
        return redirect(route("admin.district.index",[Request()->admiko_city_id]));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($admiko_city_id,$id)
    {
        $District = District::find($id);
        if (Gate::none(['district_allow', 'district_edit']) || !$District) {
            return redirect(route("admin.district.index",[$admiko_city_id]));
        }

        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.district.update", [$admiko_city_id,$District->id]);
        
        
        $data = $District;
        return view("admin.city.district.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(DistrictRequest $request,$admiko_city_id,$id)
    {
        if (Gate::none(['district_allow', 'district_edit'])) {
            return redirect(route("admin.district.index",[$admiko_city_id]));
        }
        $data = $request->all();
        $District = District::find($id);
        $District->update($data);
        
        return redirect(route("admin.district.index",[$admiko_city_id]));
    }

    public function destroy(Request $request,$admiko_city_id)
    {
        if (Gate::none(['district_allow'])) {
            return redirect(route("admin.district.index",[$admiko_city_id]));
        }
        District::destroy($request->idDel);
        return back();
    }
    
    
    
}
