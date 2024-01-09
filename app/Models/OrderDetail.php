<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\OrderDetail
 *
 * @property int $id
 * @property int|null $product_id
 * @property string $product_data
 * @property int $price
 * @property int $quantity
 * @property string $form
 * @property string $licenses
 * @property int $order_id
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereLicenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereQuantity($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    public $timestamps = false;
    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['order_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function setLicensesAttribute($value)
    {
        $this->attributes['licenses'] = implode(',', $value);
    }

    public function getProductDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getFormAttribute($value)
    {
        return json_decode($value, true);
    }

	public function getCartDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getLicensesAttribute($value)
    {
        $data = explode(',', $value);

        if (sizeof($data) == 1 && $data[0] == '') {
            return [];
        }

        return $data;
    }

    public function getStatusLabelAttribute()
    {
        return Order::getOrdersStatus()[$this->status];
    }
}
