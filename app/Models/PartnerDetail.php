<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Admin\Searchable;
/**
 * @method static findOrfail($id)
 * @method static where(string $string, $id)
 * @property mixed start_at
 * @property mixed end_at
 * @property mixed user_id
 * @property int|mixed|string|null manger
 */
class PartnerDetail extends Model
{
    use HasFactory ;

	protected $guarded = ['id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
    
}
