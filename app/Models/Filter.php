<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Filter extends Model
{
    use HasFactory;
    use LogsActivity;


	
    public function group()
    {
        return $this->belongsTo(FilterGroup::class,'group_id');
    }

}