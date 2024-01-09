<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Bavix\Wallet\Interfaces\Confirmable;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Models\Transaction;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $family
 * @property string $username
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $otp
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read int|float|string $balance
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bavix\Wallet\Models\Transfer[] $transfers
 * @property-read int|null $transfers_count
 * @property-read \Bavix\Wallet\Models\Wallet $wallet
 * @property-read \Illuminate\Database\Eloquent\Collection|Transaction[] $walletTransactions
 * @property-read int|null $wallet_transactions_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements Wallet, Confirmable
{
    use HasFactory, Notifiable;
    use LogsActivity, HasRoles, HasWallet, CanConfirm;
    use Searchable;

    protected $guarded = [];
    protected $hidden = ['password', 'otp', 'remember_token'];

	const USER_OK = 4 , UESR_PENDING = 1 , USER_NEED_AUTH = 5 , USER_REJECT_AUTH = 3 , USER_DO_NOT_NEED_AUTH = 2; 

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['password', 'otp', 'remember_token', 'updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['mobile'];

    const ROLE_USER = 'user';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function walletTransactions()
    {
        return $this->morphMany(Transaction::class, 'payable');
    }

    public function comments()
    {
        return $this->hasmany(Comment::class);
    }

	public function forms()
    {
        return $this->hasmany(AdminForm::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setOtpAttribute($value)
    {
        $this->attributes['otp'] = Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->family;
    }

	public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

	public function checkedBy()
    {
        return $this->belongsTo($this,'checked_by');
    }

    public function overtimes(){
        return $this->hasMany(Overtime::class);
    }

	public function translate($word)
	{
		$base_word = Language::where('basic','LIKE','%'.$word.'%')->first();

		return !empty($base_word->{$this->language}) ? $base_word->{$this->language} : $word;
	}

	public function fingilish($word)
	{
		

		return in_array($this->language,['eng','arg']) ? Str::slug($word) : $word;
		
	}

	public function details()
    {
        return $this->hasManyThrough(OrderDetail::class, Order::class);
    }

	public function lotteries($start , $end)
	{
		$details = $this->details()->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) use ($start , $end) {
				return $q->whereBetween('created_at', [$start, $end]);
		})->cursor();
		
		$lottey = 0;
		foreach ($details as $detail) {
			$lottey = $detail->product->lottery * $detail->quantity + $lottey;
		}

		return $lottey;

	}

	public function orderDetails()
    {
        return $this->hasManyThrough(OrderDetail::class,Order::class)->orderBy('id','desc');
    }

	public function partnerDetail()
	{
		return $this->hasOne(PartnerDetail::class);
	}

	public function PartnerSetting()
	{
		return $this->hasMany(PartnerSetting::class);
	}

	
	
	public static function getAuthStatus()
	{
		return [
			self::USER_OK => 'تایید',
			self::UESR_PENDING => 'در انتظار تایید',
			self::USER_NEED_AUTH => 'نیاز به احراز هویت',
			self::USER_REJECT_AUTH => 'رد اسناد ارسالی',
			self::USER_DO_NOT_NEED_AUTH => 'کاربر به احراز هویت نیاز ندارد'
		];
	}

	public function getAuthLabelAttribute()
	{
		return self::getAuthStatus()[$this->auth_status];
	}

	public function notes()
	{
		return $this->hasMany(UserNote::class)->latest();
	}
}
