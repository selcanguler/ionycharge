<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin\City\District;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class StationRequest extends FormRequest
{
    public function rules()
    {
        return [
            "title"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "title"=>"Başlık"
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