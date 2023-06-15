<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class Customer extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'customers';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"firstname",
		"lastname",
		"email",
		"password",
    ];
    public function setPasswordAttribute($value)
    {
        if($value != ''){
            $this->attributes['password'] = bcrypt($value);
        }
    }
	public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->orWhere("firstname","like","%".$search."%")
			->orWhere("lastname","like","%".$search."%")
			->orWhere("email","like","%".$search."%");
        }
    }
}