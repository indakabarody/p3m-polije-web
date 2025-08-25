<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $url
 * @property string|null $description
 * @property int|null $is_shown
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Brand extends Model
{
	protected $table = 'brands';

	protected $casts = [
		'is_shown' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'image',
		'url',
		'description',
		'is_shown'
	];
}
