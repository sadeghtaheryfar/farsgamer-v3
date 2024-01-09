<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Currency
 *
 * @property int $id
 * @property int|null $old_id
 * @property string $title
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Query\Builder|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereOldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Currency withoutTrashed()
 * @mixin \Eloquent
 */
class Currency extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['title'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($currency) {
            $currency->products()->update(['currency_id' => null]);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

	public function history()
	{
		return $this->hasMany(CurrencyHistory::class);
	}

	public function getFundAttribute()
	{
		$history = $this->history;
		$fund = 0;

		if (!is_null($history))
		{
			foreach($history as $item)
				$fund = $fund + $item->count*$this->amount;
			
		}

		return $fund;
	}
}
