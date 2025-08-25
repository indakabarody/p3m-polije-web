<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $is_superadmin
 * @property int|null $is_activated
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Blog[] $blogs
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';
	protected $table = 'admins';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'is_superadmin' => 'int',
		'is_activated' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'image',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'is_superadmin',
		'is_activated'
	];

	public function blogs()
	{
		return $this->hasMany(Blog::class);
	}

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token, 'admin'));
    }
}
