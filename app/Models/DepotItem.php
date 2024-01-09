<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Depot;
use Spatie\Activitylog\Traits\LogsActivity;

class DepotItem extends Model
{
    use HasFactory;
    use Searchable;

    public $searchAbleColumns = ['slug'];

	protected $table = 'depot_items';

	protected $guarded = [];

	public function categories()
	{
		 return $this->belongsTo(Category::class , 'category');
	}

	public function getPriceAttribute()
	{
		return $this->depots(Depot::ENTER);
	}

	public function getExitPriceAttribute()
	{
		return $this->depots(Depot::EXIT)->pluck('price','count','rent');
	}

	public function getCountAttribute()
	{
		return max($this->depots(Depot::ENTER)->sum('count') - $this->depots(Depot::EXIT)->sum('count'), 0);
	}


	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function depots($where)
	{
		return $this->depot()->where('action',$where)->select('count','price','rent')->get();
	}

	public function depot()
	{
		return $this->hasMany(Depot::class,'depot_items_id');
	}

	public function notes()
	{
		return $this->hasMany(DepotItemNote::class)->withTrashed();
	}

	public function getFundAttribute()
	{
		$enter_prices = $this->depots(Depot::ENTER)->map(function ($item, $key) {
			return $item->price * $item->count;
		})->toArray();


		$exit_prices = $this->depots(Depot::EXIT)->map(function ($item, $key) {
			return $item->price * $item->count;
		})->toArray();

		
		
		return max(array_sum($enter_prices) - array_sum($exit_prices) , 0);
	}

}
