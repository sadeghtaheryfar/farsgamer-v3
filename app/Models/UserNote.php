<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class UserNote extends Model
{
	protected $table = 'user_notes';

	protected $guarded = [];

	use HasFactory;
    use LogsActivity;
    use Searchable;


	public function author()
	{
		return $this->belongsTo(User::class,'author_id');
	}
}