<?php

namespace App\Http\Controllers\Admin\Factor;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Depot;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductLicense;
use App\Models\Category;
use App\Models\DepotItem;
use App\Models\PaymentTransaction;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;
use App\Http\Controllers\Controller;

class IndexFactor extends Controller
{
	public function __invoke($id)
    {
		$depotItem = Depot::findOrFail($id);

	

		$order = Order::findOrFail((int)$depotItem->track_id - Order::CHANGE_ID);
		$payment = PaymentTransaction::where('model_type', 'order')
            ->where('model_id', $order->id)
            ->where('status_code', '100')
            ->first();

		
			$desc = '';
			if ($payment){
				$date = jalaliDate($payment->updated_at,'%Y/%m/%d');
				$desc = "پرداخت به وسیله  {$payment->payment_gateway}  در {$date} ";
			}

			
       return view('admin.factor.index',['depotItem'=>$depotItem,'order' => $order,'payment' => $payment,'desc'=>$desc]);
    }
	



	
}
        