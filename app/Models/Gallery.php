<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gallery
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image
 * @property string|null $description
 * @property Carbon|null $date
 * @property int|null $is_shown
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Gallery extends Model
{
	protected $table = 'galleries';

	protected $casts = [
		'date' => 'datetime',
		'is_shown' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'image',
		'description',
		'date',
		'is_shown'
	];
}
