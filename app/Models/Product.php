<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $short_description
 * @property string|null $description
 * @property int|null $currency_id
 * @property string $amount
 * @property string $partner_amount
 * @property int|null $quantity
 * @property string $image
 * @property string|null $media
 * @property int $score
 * @property string $type
 * @property string $status
 * @property string|null $form
 * @property int|null $category_id
 * @property string|null $manager_mobile
 * @property string|null $manager_sms
 * @property string $discount_type
 * @property int $discount_amount
 * @property string|null $discount_starts_at
 * @property string|null $discount_expires_at
 * @property string $seo_keywords
 * @property string $seo_description
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\Currency|null $currency
 * @property-read mixed $discount_amount_fixed
 * @property-read mixed $discount_percentage
 * @property-read mixed $is_active_discount
 * @property-read mixed $price
 * @property-read mixed $price_with_discount
 * @property-read mixed $status_label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductLicense[] $licenses
 * @property-read int|null $licenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product activeDiscount()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereManagerMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereManagerSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePartnerAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSoldItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['title'];

    const TYPE_NORMAL_DELIVERY = 'normal_delivery';
    const TYPE_INSTANT_DELIVERY = 'instant_delivery';
    const TYPE_PHYSICAL = 'physical';
	const TYPE_TICKET = 'ticket';
	const TYPE_CARD = 'card';

    const STATUS_DRAFT = 'draft';
    const STATUS_AVAILABLE = 'available';
    const STATUS_UNAVAILABLE = 'unavailable';
    const STATUS_COMING_SOON = 'coming_soon';

	const STATUS_TOWARDS_THE_END = 'towards_the_end';


    const DISCOUNT_FIXED = 'fixed';
    const DISCOUNT_PERCENTAGE = 'percentage';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function licenses()
    {
        return $this->hasMany(ProductLicense::class);
    }

    public function licensesNotUsed()
    {
        return $this->licenses()->where('is_used', 0);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

	public function parameter()
    {
        return $this->belongsToMany(CategoryParameter::class , 'category_parameter_product' ,'product_id' ,'parameter_id');
    }

	public function filters()
    {
        return $this->belongsToMany(Filter::class , 'products_has_filter' ,'product_id' ,'filter_id');
    }


    public function scopeActiveDiscount($query)
    {
        return $query->where('discount_amount', '>', 0)->
        where('discount_starts_at', '<', Carbon::parse($this->discount_starts_at))->
        where('discount_expires_at', '>', Carbon::parse($this->discount_expires_at));
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = str_replace(env('APP_URL'), '', $value);
    }

    public function getImageAttribute($value)
    {
        if (is_null($value) || !Storage::exists($value)) {
            return 'site/images/no-img.png';
        }

        return $value;
    }

	public function details()
	{
		return $this->hasMany(OrderDetail::class);
	}

    public function getFormAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getPriceAttribute()
    {
		if (!$this->const_price)
		{
			$currency = $this->currency;
        	return $currency == null ? $this->amount : round($this->amount * $currency->amount,-3);
		} else {
			return $this->amount;
		}
    }

    public function getPartnerPriceAttribute()
    {
		if (!$this->const_price)
		{
			$currency = $this->currency;
			return $currency == null ? $this->partner_amount : $this->partner_amount * $currency->amount;
		} else {
			return $this->partner_amount;
		}
    }

	public function getBuyPriceAttribute()
    {
        $currency = $this->currency;
        return $currency == null ? $this->buy_amount : $this->buy_amount * $currency->amount;
    }

    public function getPriceWithDiscountAttribute()
    {
        if ($this->getIsActiveDiscountAttribute()) {
            return round($this->getPriceAttribute() - $this->getDiscountAmountFixedAttribute());
        }
        return $this->getPriceAttribute();
    }

    public function getPartnerPriceWithDiscountAttribute()
    {
        if ($this->getIsActiveDiscountAttribute()) {
            return round($this->getPartnerPriceAttribute() - $this->getDiscountAmountFixedAttribute());
        }
        return $this->getPartnerPriceAttribute();
    }

    public function getStatusLabelAttribute()
    {
        return self::getProductsStatus()[$this->status];
    }

    public function getIsActiveDiscountAttribute()
    {
        $isPast = true;
        if ($this->discount_starts_at != null)
            Carbon::parse($this->discount_starts_at)->isPast();

        $isFuture = true;
        if ($this->discount_expires_at != null)
            Carbon::parse($this->discount_expires_at)->isFuture();

        return $this->discount_amount > 0 && $isPast && $isFuture;
    }

    public function getDiscountAmountFixedAttribute()
    {
        if (!$this->is_active_discount) {
            return 0;
        }

        $discount = $this->discount_type == 'fixed' ?
            $this->discount_amount :
            round($this->discount_amount * $this->getPriceAttribute() / 100);

        return $discount > $this->getPriceAttribute() ? $this->getPriceAttribute() : $discount;
    }

    public function getDiscountPercentageAttribute()
    {
        $price = $this->getPriceAttribute() == 0 ? 1 : $this->getPriceAttribute();

        $percentage = $this->discount_type == 'fixed' ?
            round($this->discount_amount * 100 / $price) :
            round($this->discount_amount);

        return $percentage > 100 ? 100 : $percentage;
    }

    public static function getProductsType()
    {
        return [
            self::TYPE_NORMAL_DELIVERY => 'محصول دیجیتال',
            self::TYPE_INSTANT_DELIVERY => 'محصول لاینسیس دار',
            self::TYPE_PHYSICAL => 'محصول فیزیکی',
			self::TYPE_TICKET => 'تیکت',
			self::TYPE_CARD => 'کارت'
        ];
    }
 
    public static function getProductsStatus()
    {
        return [
            self::STATUS_DRAFT => 'پیش نویس',
            self::STATUS_AVAILABLE => 'موجود',
            self::STATUS_UNAVAILABLE => 'نا موجود',
            self::STATUS_COMING_SOON => 'به زودی',
			self::STATUS_TOWARDS_THE_END => 'رو به اتمام',
        ];
    }

    public static function getProductsDiscount()
    {
        return [
            self::DISCOUNT_FIXED => 'مبلغ',
            self::DISCOUNT_PERCENTAGE => 'درصد',
        ];
    }

	public function scopeFgtal($q)
	{
		return $q->where('fgtal',0);
	}
}
