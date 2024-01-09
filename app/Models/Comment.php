<?php

namespace App\Models;

use App\Traits\Admin\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $comment
 * @property string|null $answer
 * @property int $rating
 * @property int $is_confirmed
 * @property string $commentable_type
 * @property int $commentable_id
 * @property int|null $order_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read Model|\Eloquent $commentable
 * @property-read mixed $commentable_type_label
 * @property-read mixed $is_confirmed_label
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment isConfirmed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Query\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment search($search)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Comment withoutTrashed()
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;
    use Searchable;

    protected $guarded = ['is_confirmed'];
    protected $attributes = ['rating' => 0, 'is_confirmed' => 0];

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public $searchAbleColumns = ['comment'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsConfirmed($query)
    {
        return $query->where('is_confirmed', 1);
    }

    public function getIsConfirmedLabelAttribute()
    {
        return $this->is_confirmed ? 'تایید شده' : 'در انتظار تایید';
    }

    public function getCommentableTypeLabelAttribute()
    {
        if ($this->commentable_type == 'article') {
            return 'مقالات';
        } elseif ($this->commentable_type == 'comment') {
            return 'محصولات';
        }
    }
}
