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

class CustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            "firstname"=>[
				"string",
				"required"
			],
			"lastname"=>[
				"string",
				"required"
			],
			"email"=>[
				"string",
				"required"
			]
        ];
    }
    public function attributes()
    {
        return [
            "firstname"=>"Ad",
			"lastname"=>"Soyad",
			"email"=>"E-Posta"
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