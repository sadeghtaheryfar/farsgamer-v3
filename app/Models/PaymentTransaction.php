<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PaymentTransaction
 *
 * @property int $id
 * @property int $amount
 * @property string $payment_gateway
 * @property string $payment_token
 * @property string|null $payment_ref
 * @property string $model_type
 * @property int $model_id
 * @property string|null $status_code
 * @property string|null $status_message
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction wherePaymentGateway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction wherePaymentRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction wherePaymentToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereStatusMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentTransaction whereUserId($value)
 * @mixin \Eloquent
 */
class PaymentTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];

	public function order()
	{
		return $this->belongsTo(Order::class,'model_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
