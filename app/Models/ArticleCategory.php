<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Article
 *

 * @mixin \Eloquent
 */
class ArticleCategory extends Model
{
  
	protected $table = 'categories_articles';
    // protected $guarded = [];

    // protected static $logAttributes = ['*'];
    // protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    // protected static $logOnlyDirty = true;

    // public $searchAbleColumns = ['title', 'slug'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($article) {
    //         $article->comments()->delete();
    //     });
    // }

    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }

    // public function setSlugAttribute($value)
    // {
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    // public function setImageAttribute($value)
    // {
    //     $this->attributes['image'] = str_replace(env('APP_URL') . '/', '', $value);
    // }

	

	//   protected $fillable = [
    //     'title',
    //     'slug',
    // ];

    public function subCategories()
    {
        return $this->hasMany(ArticleCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function products()
    {
        // return $this->hasMany(Product::class);
    }
}
