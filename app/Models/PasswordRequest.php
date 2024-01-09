<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrfail($id)
 * @method static where(string $string, $id)
 * @property mixed start_at
 * @property mixed end_at
 * @property mixed user_id
 * @property int|mixed|string|null manger
 */
class PasswordRequest extends Model
{
    use HasFactory;

	 protected $table = 'password_requests';
	 protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function order()
    {
        return $this->belongsTo(OrderDetail::class,'order_id');
    }
}
