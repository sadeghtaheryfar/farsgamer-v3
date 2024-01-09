<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class FilterGroup extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

   

	
	protected $table = 'filter_groups';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	 public function filters()
    {
        return $this->hasMany(Filter::class,'group_id');
    }

}