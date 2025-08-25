<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCategory
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Blog[] $blogs
 *
 * @package App\Models
 */
class BlogCategory extends Model
{
	protected $table = 'blog_categories';

	protected $fillable = [
		'name',
		'slug'
	];

	public function blogs()
	{
		return $this->hasMany(Blog::class);
	}
}
