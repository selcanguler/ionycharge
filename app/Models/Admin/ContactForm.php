<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class ContactForm extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'contact_forms';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"name",
		"email",
		"body",
    ];
    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->orWhere("name","like","%".$search."%")
			->orWhere("email","like","%".$search."%")
			->orWhere("body","like","%".$search."%");
        }
    }
}