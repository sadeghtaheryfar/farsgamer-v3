<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\VoucherMeta
 *
 * @property int $id
 * @property int $voucher_id
 * @property string $name
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VoucherMeta whereVoucherId($value)
 * @mixin \Eloquent
 */
class VoucherMeta extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];
    public $timestamps = false;

    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
}
