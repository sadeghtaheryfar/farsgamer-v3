<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guaranteed extends Model
{
    use HasFactory;

	protected $table = 'guaranteed';

	public function article()
	{
		return $this->belongsTo(Article::class);
	}
}
