<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $name
 * @property string $family
 * @property string $mobile
 * @property string $email
 * @property string|null $description
 * @property int $price
 * @property int $discount
 * @property int|null $voucher_id
 * @property int $voucher_amount
 * @property int $wallet_pay
 * @property int $total_price
 * @property string $status
 * @property int $user_id
 * @property string $user_ip
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $details
 * @property-read int|null $details_count
 * @property-read mixed $full_name
 * @property-read mixed $status_label
 * @property-read mixed $tracking_code
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderNote[] $notes
 * @property-read int|null $notes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereVoucherAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereVoucherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWalletPay($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    const CHANGE_ID = 897879;
    const STATUS_NOT_PAID = 'wc-pending';
    const STATUS_HOLD = 'wc-on-hold';
    const STATUS_SPEED_PLUS = 'speed_plus';
    const STATUS_DELAY = 'delay';
    const STATUS_PROCESSING = 'wc-processing';
    const STATUS_STORE = 'wc-custom-status';
    const STATUS_FAILED = 'wc-failed';
    const STATUS_POST = 'wc-post';
    const STATUS_CANCELLED = 'wc-cancelled';
    const STATUS_REFUNDED = 'wc-refunded';
    const STATUS_COMPLETED = 'wc-completed';
	const STATUS_BREAKED = 'wc-breacked';

    protected $guarded = [];
    protected $attributes = [];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

	public function payment()
	{
		return $this->hasOne(PaymentTransaction::class,'model_id');
	}

    public function notes()
    {
        return $this->hasMany(OrderNote::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class)->withTrashed();
    }

    public function userNotes()
    {
        return $this->notes()->where('is_user_note', 1);
    }

    public function sms()
    {
        return $this->morphMany(Smsir::class, 'model');
    }

    public function getTrackingCodeAttribute()
    {
        return 'FAG-'.($this->id + self::CHANGE_ID);
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->family;
    }

    public function getStatusAttribute()
    {
        foreach ($this->details as $detail){

            if ($detail->status == Order::STATUS_NOT_PAID){
                return self::STATUS_NOT_PAID;
            }

            if ($detail->status != Order::STATUS_COMPLETED){
                return Order::STATUS_PROCESSING;
            }
        }

        return self::STATUS_COMPLETED;
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == self::STATUS_NOT_PAID){
        return self::getOrdersStatus()[$this->status];
        }

        if ($this->status == self::STATUS_COMPLETED || $this->status == self::STATUS_REFUNDED){
            return self::getOrdersStatus()[$this->status];
        }

            return 'در حال انجام';
    }

    public function getVoucherDataAttribute()
    {
        if ($this->value == '0'){
            return null;
        }

        return unserialize($this->value);
    }

    public static function getOrdersStatus()
    {
        return [
            self::STATUS_NOT_PAID => 'در انتظار پرداخت',
            self::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
            self::STATUS_SPEED_PLUS => 'اسپید پلاس',
            self::STATUS_DELAY => 'تاخیر در انجام',
            self::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
            self::STATUS_STORE => 'درحال آماده سازی در انبار',
            self::STATUS_FAILED => 'در حال بررسی توسط مشتری',
            self::STATUS_POST => 'ارسال توسط پست',
            self::STATUS_CANCELLED => 'در انتظار بازگشت وجه',
            self::STATUS_REFUNDED => 'مسترد شده',
            self::STATUS_COMPLETED => 'تکمیل شده',
			self::STATUS_BREAKED => 'لغو شده',
        ];
    }
}
