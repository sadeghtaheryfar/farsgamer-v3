<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Form extends Model
{
    use HasFactory;
	protected $table = 'raw_form_reports';
	protected $guarded = [];
	
	const DAILY = 'daily' , EVERY_TWO_DAYS = 'every_two_days' , WEEKLY = 'weekly' , MOUNTLY = 'mountly';

	public static function getCron()
	{
		return [
			self::DAILY => 'روزانه',
			self::WEEKLY => 'هفتگی',
			self::MOUNTLY => 'ماهانه',
		];
	}

	public function items()
	{
		return $this->hasMany(AdminForm::class,'form_id');
	}

	protected static function boot()
    {
        parent::boot();

        static::deleting(function ($currency) {
            $currency->items()->update(['form_id' => null]);
        });
    }

	public function getCronTitleAttribute()
	{
		return self::getCron()[$this->cron];
	}

	 public function getFormsAttribute($value)
    {
        return json_decode($value, true);
    }

}