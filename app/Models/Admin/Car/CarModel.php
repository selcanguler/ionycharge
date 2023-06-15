<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin\Car;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;

class CarModel extends Model
{
    use AdmikoFileUploadTrait;

    public $table = 'car_models';
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"model_name",
		"admiko_car_id",
    ];
    
}