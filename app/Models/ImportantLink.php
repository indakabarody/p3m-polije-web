<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImportantLink
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property int|null $open_in_new_tab
 * @property int|null $is_shown
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ImportantLink extends Model
{
	protected $table = 'important_links';

	protected $casts = [
		'open_in_new_tab' => 'int',
		'is_shown' => 'int'
	];

	protected $fillable = [
		'name',
		'url',
		'open_in_new_tab',
		'is_shown'
	];
}
