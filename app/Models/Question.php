<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $text
 * @property int|null $parent_id
 * @property int $is_confirmed
 * @property int|null $product_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Question[] $answers
 * @property-read int|null $answers_count
 * @property-read mixed $is_confirmed_label
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Question isConfirmed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Query\Builder|Question onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereIsConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Question withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Question withoutTrashed()
 * @mixin \Eloquent
 */
class Question extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    protected $guarded = ['is_confirmed'];
    protected $attributes = ['is_confirmed' => 0];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['comment'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            $question->answers()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function answers()
    {
        return $this->hasMany(Question::class, 'parent_id');
    }

    public function scopeIsConfirmed($query)
    {
        return $query->where('is_confirmed', 1);
    }

    public function getIsConfirmedLabelAttribute()
    {
        return $this->is_confirmed ? 'تایید شده' : 'در انتظار تایید';
    }
}
