<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class WindowSlider extends Model
{
    use HasFactory;

	protected $table = 'windows_sliders';

	protected $fillable = [
		'title',
		'logo',
		'window_id',
		'priority',
		'products'
	];	
}
 