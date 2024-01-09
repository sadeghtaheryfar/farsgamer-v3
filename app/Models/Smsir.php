<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Smsir
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Smsir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Smsir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Smsir query()
 * @mixin \Eloquent
 */
class Smsir extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function model()
    {
        return $this->morphTo();
    }
}
