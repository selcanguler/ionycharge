<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class BookingRequest extends FormRequest
{
    public function rules()
    {
        return [
            "customer"=>[
				"required"
			],
			"car_brand"=>[
				"required"
			],
			"car_model"=>[
				"required"
			],
			"car_type"=>[
				"required"
			],
			"city"=>[
				"required"
			],
			"district"=>[
				"required"
			],
			"station"=>[
				"required"
			],
			"booking_date"=>[
				'date_format:"'.config('admiko_config.table_date_format').'"',
				"required"
			],
			"booking_time"=>[
				"required"
			],
			"cost"=>[
				"string",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "customer"=>"Müşteri",
			"car_brand"=>"Araç Marka",
			"car_model"=>"Araç Model",
			"car_type"=>"Araç Tipi",
			"city"=>"İl",
			"district"=>"İlçe",
			"station"=>"İstasyon",
			"booking_date"=>"Tarih",
			"booking_time"=>"Rezervasyon Saati",
			"cost"=>"Fiyat"
        ];
    }
    
    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}