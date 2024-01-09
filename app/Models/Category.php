<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Category|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $subCategories
 * @property-read int|null $sub_categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['title'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->subCategories()->update(['parent_id' => null]);
            $category->products()->update(['category_id' => null]);
        });
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

	public function parameter()
    {
        return $this->hasMany(CategoryParameter::class, 'category_id');
    }


    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

	public function window()
    {
        return $this->hasOne(Window::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = str_replace(env('APP_URL').'/', '', $value);
    }

	public function child()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function childrenRecursive() {
        return $this->child()->with('childrenRecursive');
    }

	 public function groups()
    {
        return $this->hasMany(FilterGroup::class,'category_id')->orderByDesc('id');
    }
}
