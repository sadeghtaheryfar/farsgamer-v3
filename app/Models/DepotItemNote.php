<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Depot;
use Spatie\Activitylog\Traits\LogsActivity;

class DepotItemNote extends Model
{
    use HasFactory , SoftDeletes;

	protected $table = 'depot_item_notes';

	protected $guarded = [];

	public function depot()
	{
		return $this->belongsTo(DepotItem::class,'depot_item_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class,'created_by');
	}

	public function deleter()
	{
		return $this->belongsTo(User::class,'deleted_by');
	}


}
