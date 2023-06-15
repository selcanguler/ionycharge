<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Customer;
use App\Models\Admin\Car;
use App\Models\Admin\Car\CarModel;
use App\Models\Admin\City;
use App\Models\Admin\City\District;
use App\Models\Admin\City\District\Station;
use Carbon\Carbon;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Booking extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'bookings';
    
    
	const CAR_TYPE_CONS = ["ac"=>"AC","dc"=>"DC","ac_dc"=>"AC/DC"];
	const BOOKING_TIME_CONS = ["06_00"=>"06:00","10_00"=>"10:00","11_00"=>"11:00","00_00"=>"00:00"];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"customer",
		"car_brand",
		"car_model",
		"car_type",
		"city",
		"district",
		"station",
		"booking_date",
		"booking_time",
		"cost",
    ];
    public function customer_id()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }
	public function car_brand_id()
    {
        return $this->belongsTo(Car::class, 'car_brand');
    }
	public function car_model_id()
    {
        return $this->belongsTo(CarModel::class, 'car_model');
    }
	public function city_id()
    {
        return $this->belongsTo(City::class, 'city');
    }
	public function district_id()
    {
        return $this->belongsTo(District::class, 'district');
    }
	public function station_id()
    {
        return $this->belongsTo(Station::class, 'station');
    }
	public function getBookingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_format')) : null;
    }
    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->orWhereHas("customer_id", function($q) use($search) { $q->where("firstname", "like", "%".$search."%"); })
			->orWhereHas("car_brand_id", function($q) use($search) { $q->where("brand_name", "like", "%".$search."%"); })
			->orWhereHas("car_model_id", function($q) use($search) { $q->where("model_name", "like", "%".$search."%"); })
			->orWhereHas("city_id", function($q) use($search) { $q->where("title", "like", "%".$search."%"); })
			->orWhereHas("district_id", function($q) use($search) { $q->where("title", "like", "%".$search."%"); })
			->orWhereHas("station_id", function($q) use($search) { $q->where("title", "like", "%".$search."%"); })
			->orWhere("booking_date","like","%".$search."%")
			->orWhere("cost","like","%".$search."%");
        }
    }
}