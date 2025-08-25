<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppSetting
 * 
 * @property int $id
 * @property string|null $app_name
 * @property string|null $about
 * @property string|null $vision_mission
 * @property string|null $why_choose_us
 * @property string|null $highlight_text
 * @property string|null $header_text
 * @property string|null $subheader_text
 * @property int|null $clients_count
 * @property Carbon|null $date_founded
 * @property string|null $company_name
 * @property string|null $company_address
 * @property string|null $company_email
 * @property string|null $company_phone
 * @property string|null $company_website_url
 * @property string|null $company_google_maps_iframe
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AppSetting extends Model
{
	protected $table = 'app_settings';

	protected $casts = [
		'clients_count' => 'int',
		'date_founded' => 'datetime'
	];

	protected $fillable = [
		'app_name',
		'about',
		'vision_mission',
		'why_choose_us',
		'highlight_text',
		'header_text',
		'subheader_text',
		'clients_count',
		'date_founded',
		'company_name',
		'company_address',
		'company_email',
		'company_phone',
		'company_website_url',
		'company_google_maps_iframe'
	];
}
