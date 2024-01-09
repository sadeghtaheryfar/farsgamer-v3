<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property int|null $old_id
 * @property string $code
 * @property string|null $description
 * @property string $type
 * @property int $amount
 * @property string|null $starts_at
 * @property string|null $expires_at
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    const TYPE_FIXED = 'fixed';
    const TYPE_PERCENT = 'percent';

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['code'];

    public function meta()
    {
        return $this->hasMany(VoucherMeta::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getTotalOrderAttribute()
    {
        return $this->orders->reduce(function ($total, $item) {
            if ($item->status == Order::STATUS_COMPLETED) {
                return $total + $item->details->count();
            }
            return $total;
        });
    }

    public function getTotalPriceAttribute()
    {
        return $this->orders->reduce(function ($total, $item) {
            if ($item->status == Order::STATUS_COMPLETED) {
                return $total + $item->voucher_amount;
            }
            return $total;
        });
    }

    public static function getType()
    {
        return [
            self::TYPE_FIXED => 'مبلغ',
            self::TYPE_PERCENT => 'درصد',
        ];
    }
}
