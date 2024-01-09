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
class Partner extends Model
{
    use HasFactory , Searchable;

	public $searchAbleColumns = ['mobile'];

	const PENDING = 'pending';
	const ACCEPTED = 'accepted';
	const REJECTED = 'rejected';

	public static function getStatus()
	{
		return [
			self::PENDING => 'در انتظار تایید',
			self::ACCEPTED => 'تایید شده',
			self::REJECTED => 'تایید نشده'
		];
	}

	public function getStatusLabelAttribute()
	{
		return self::getStatus()[$this->status];
	}
    
}
