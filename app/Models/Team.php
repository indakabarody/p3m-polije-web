<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 * 
 * @property int $id
 * @property int|null $order_number
 * @property string|null $name
 * @property string|null $image
 * @property string|null $email
 * @property Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $level
 * @property string|null $facebook_url
 * @property string|null $instagram_url
 * @property string|null $linkedin_url
 * @property string|null $twitter_url
 * @property string|null $google_scholar_url
 * @property string|null $sinta_url
 * @property string|null $scopus_url
 * @property string|null $remember_token
 * @property int|null $is_shown
 * @property int|null $is_activated
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';

	protected $casts = [
		'order_number' => 'int',
		'email_verified_at' => 'datetime',
		'is_shown' => 'int',
		'is_activated' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'order_number',
		'name',
		'image',
		'email',
		'email_verified_at',
		'password',
		'level',
		'facebook_url',
		'instagram_url',
		'linkedin_url',
		'twitter_url',
		'google_scholar_url',
		'sinta_url',
		'scopus_url',
		'remember_token',
		'is_shown',
		'is_activated'
	];
}
