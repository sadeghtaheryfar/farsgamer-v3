<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class AdminForm extends Model
{
    use HasFactory;
	protected $table = 'user_forms';
	protected $guarded = [];
	
	const PENDING = 'pending';
	const DELAY = 'delay';
    const OK = 'ok';
    const REJECTED = 'rejected';

	public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }

	public function form()
    {
        return $this->belongsTo(Form::class,'form_id');
    }

	public static function getStatus()
    {
        return [
            self::PENDING => 'در انتطار پاسخ',
			self::DELAY => 'پاسخ داده نشده',
            self::OK => 'ارسال شده',
            self::REJECTED => 'رد شده',
        ];
    }

	public function getStatusLabelAttribute()
	{
		return self::getStatus()[$this->status];
	}

	public function getFormsAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}