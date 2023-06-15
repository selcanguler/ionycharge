<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin\City\District;
use App\Http\Controllers\Controller;
use App\Models\Admin\City\District\Station;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\City\District\StationRequest;
use Gate;

class StationController extends Controller
{

    public function index()
    {
        if (Gate::none(['station_allow', 'station_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Station::where("admiko_district_id",Request()->admiko_district_id)->orderByDesc("id")->get();
        return view("admin.city.district.station.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['station_allow'])) {
            return redirect(route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]));
        }
        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.station.store",[Request()->admiko_city_id,Request()->admiko_district_id]);
        
        
        return view("admin.city.district.station.manage")->with(compact('admiko_data'));
    }

    public function store(StationRequest $request)
    {
        if (Gate::none(['station_allow'])) {
            return redirect(route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]));
        }
        $data = $request->all();
        
		$data["admiko_district_id"] = Request()->admiko_district_id;
        $Station = Station::create($data);
        
        return redirect(route("admin.station.index",[Request()->admiko_city_id,Request()->admiko_district_id]));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($admiko_city_id,$admiko_district_id,$id)
    {
        $Station = Station::find($id);
        if (Gate::none(['station_allow', 'station_edit']) || !$Station) {
            return redirect(route("admin.station.index",[$admiko_city_id,$admiko_district_id]));
        }

        $admiko_data['sideBarActive'] = "city";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.station.update", [$admiko_city_id,$admiko_district_id,$Station->id]);
        
        
        $data = $Station;
        return view("admin.city.district.station.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(StationRequest $request,$admiko_city_id,$admiko_district_id,$id)
    {
        if (Gate::none(['station_allow', 'station_edit'])) {
            return redirect(route("admin.station.index",[$admiko_city_id,$admiko_district_id]));
        }
        $data = $request->all();
        $Station = Station::find($id);
        $Station->update($data);
        
        return redirect(route("admin.station.index",[$admiko_city_id,$admiko_district_id]));
    }

    public function destroy(Request $request,$admiko_city_id,$admiko_district_id)
    {
        if (Gate::none(['station_allow'])) {
            return redirect(route("admin.station.index",[$admiko_city_id,$admiko_district_id]));
        }
        Station::destroy($request->idDel);
        return back();
    }
    
    
    
}
