<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * 
 * @property int $id
 * @property int|null $blog_category_id
 * @property int|null $admin_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $thumbnail
 * @property string|null $content
 * @property string|null $keywords
 * @property int|null $is_shown
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Admin|null $admin
 * @property BlogCategory|null $blog_category
 *
 * @package App\Models
 */
class Blog extends Model
{
	protected $table = 'blogs';

	protected $casts = [
		'blog_category_id' => 'int',
		'admin_id' => 'int',
		'is_shown' => 'int'
	];

	protected $fillable = [
		'blog_category_id',
		'admin_id',
		'title',
		'slug',
		'thumbnail',
		'content',
		'keywords',
		'is_shown'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function blog_category()
	{
		return $this->belongsTo(BlogCategory::class);
	}
}
