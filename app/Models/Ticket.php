<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest(string $string)
 * @method static findOrFail($id)
 * @method static where(string $string, string $PENDING)
 * @method static whereNotNull(string $string)
 * @method static whereNull(string $string)
 * @property mixed created_at
 * @property mixed status
 * @property mixed priority
 * @property mixed subject
 * @property mixed user_id
 * @property mixed parent_id
 * @property mixed content
 * @property int|mixed|string|null sender_id
 * @property mixed file
 * @property mixed|string sender_type
 * @property mixed id
 * @property mixed user
 * @property mixed status_label
 */
class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id','user_id'];

    const HIGH = 'high';
    const NORMAL = 'normal';
    const LOW = 'low';

    const ADMIN = 'admin' , USER = 'user';

    public static function getSenderType()
    {
        return [
            self::ADMIN => 'ادمین',
            self::USER => 'کاربر',
        ];
    }

    const PENDING = 'pending' , ANSWERED = 'answered' , USER_ANSWERED = 'user_answered';

    public static function getNew()
    {
        return Ticket::where('status',self::PENDING)->count();
    }

    public static function getPriority()
    {
        return [
            self::HIGH => 'زیاد',
            self::NORMAL => 'متوسط',
            self::LOW => 'کم'
        ];
    }

    public static function getStatus()
    {
        return [
            self::PENDING => 'در انتظار پاسخ',
            self::ANSWERED => 'پاسخ داده شد',
            self::USER_ANSWERED => 'پاسخ مشتری',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function parent()
    {
        return $this->belongsTo(Ticket::class,'parent_id');
    }

    public function child()
    {
        return $this->hasMany(Ticket::class,'parent_id')->latest('id');
    }

    public function getStatusLabelAttribute()
    {
        return self::getStatus()[$this->status];
    }

    public function getSenderTypeLabelAttribute()
    {
        return self::getSenderType()[$this->sender_type];
    }

    public function setFileAttribute($value)
    {
        $file = [];
        foreach (explode(',',$value) as $item)
            $file[] = str_replace(env('APP_URL'), '', $item);

        $this->attributes['file'] = implode(',',$file);
    }

    public function getPriorityLabelAttribute()
    {
        return self::getPriority()[$this->priority];
    }

}
