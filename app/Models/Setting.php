<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;
    use LogsActivity;

    public $timestamps = false;
    protected $guarded = [];

    protected static $logAttributes = ['*'];
    // protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;

    public static function getSingleRow($name, $default = '')
    {
        return Setting::where('name', $name)->first()->value ?? $default;
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = str_replace(env('APP_URL') . '/', '', $value);
    }

    public function getValueAttribute($value)
    {
        $data = json_decode($value, true);
        return is_array($data) ? $data : $value;
    }
}
