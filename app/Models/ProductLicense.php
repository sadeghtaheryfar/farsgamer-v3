<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\ProductLicense
 *
 * @property int $id
 * @property string $license
 * @property int|null $product_id
 * @property int $is_used
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense isNotUsed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense isUsed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProductLicense onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereIsUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductLicense whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ProductLicense withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProductLicense withoutTrashed()
 * @mixin \Eloquent
 */
class ProductLicense extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;

    protected $guarded = [];
    protected $attributes = ['is_used' => 0];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public function scopeIsUsed($query)
    {
        return $query->where('is_used', 1);
    }

    public function scopeIsNotUsed($query)
    {
        return $query->where('is_used', 0);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
