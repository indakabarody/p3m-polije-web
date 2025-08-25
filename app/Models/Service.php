<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $description
 * @property int|null $price_idr
 * @property string|null $bill_type
 * @property int|null $is_shown
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';

	protected $casts = [
		'price_idr' => 'int',
		'is_shown' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'image',
		'description',
		'price_idr',
		'bill_type',
		'is_shown'
	];
}
