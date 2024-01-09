<?php

namespace App\Http\Controllers\Smsir;

use App\Models\OrderNote;
use App\Models\Setting;
use GuzzleHttp\Client;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\PartnerSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventMail;
use Illuminate\Support\Facades\Artisan;


class Smsir
{
    //http://ippanel.com/class/sms/webservice/send_url.php?
    //from=3000505
    //&to=09331848480
    //&msg=تست پیامک
    //&uname=09931788937
    //&pass=faraz0670834696

    //http://ippanel.com:8080/?
    //apikey=V-qyDXKy60ZVeni8h-HAl6Qtz2vXP4Keenc0EN6k3LQ=
    //&pid=ul9jh01gzz
    //&fnum=3000505
    //&tnum=09331848480
    //&p1=verification-code
    //&v1=12345

    private $baseUri = 'https://ws.sms.ir/api/';
    private $apiKey = 'V-qyDXKy60ZVeni8h-HAl6Qtz2vXP4Keenc0EN6k3LQ=';
    private $username = '09931788937';
    // private $password = 'faraz0670834696';
	private $password = 'a1rp1l5o#{rB';
    private $lineNumber = '3000505';

    public function sendVerification($number, $code)
    {
        if (app()->environment('local')) {
            return;
        }
		
		// $user = User::where('mobile',$number)->first();
		// Mail::to($user->email)->send(new EventMail('کد تایید احراز هویت',$code));

        $client = new Client();
        $query = ['apikey' => $this->apiKey,
            'pid' => 'ul9jh01gzz',
            'fnum' => $this->lineNumber,
            'tnum' => $number,
            'p1' => 'verification-code',
            'v1' => $code];

        $result = $client->get('http://ippanel.com:8080/',
            [
                'query' => $query,
            ]);

        return json_decode($result->getBody(), true);
    }

	 public function sendAdminCode($number, $code)
    {
        if (app()->environment('local')) {
            return;
        }

		// $user = User::where('mobile',$number)->first();
		// Mail::to($user->email)->send(new EventMail('کد تایید احراز هویت',$code));

        $client = new Client();
        $query = ['apikey' => $this->apiKey,
            'pid' => '9rfeq9e87v',
            'fnum' => $this->lineNumber,
            'tnum' => $number,
            'p1' => 'code',
            'v1' => $code];

        $result = $client->get('http://ippanel.com:8080/',
            [
                'query' => $query,
            ]);

        return json_decode($result->getBody(), true);
    }

    public function replaceAdminAndSend($order, $details, $status)
    {
        try {
            $orderDetails = $order->details;

            $numbers = Setting::where('name', 'admin_numbers')->first()->value ?? null;

            $template = Setting::where('name', 'admin_' . $status)->first();

            if (is_null($numbers) || $numbers == '' || is_null($template) || $template->value == '') {
                return;
            }

            //
            $allItems = [];
            $allItemsQty = [];
            foreach ($orderDetails as $detail) {
                $allItems[] = $detail->product_data['title'];
                $allItemsQty[] = $detail->product_data['title'] . "($detail->quantity)";
            }
            $allItems = implode(',', $allItems);
            $allItemsQty = implode(',', $allItemsQty);
            $countItems = $orderDetails->sum->quantity;

            $search = ['{mobile}', '{email}', '{status}', '{all_items}', '{all_items_qty}', '{count_items}',
                '{price}', '{order_id}', '{transaction_id}', '{b_first_name}', '{b_last_name}', '{product}', '{product_status}'];
            $replace = [$order->mobile, $order->email, $order->status_label, $allItems, $allItemsQty, $countItems,
                number_format($order->total_price) . ' تومان', $order->tracking_code, '', $order->name, $order->family, $details->product->title, $details->status_label];

            $template = str_replace($search, $replace, $template->value);
            foreach (explode(',', $numbers) as $number) {
                if (!is_null($number) && $number != '') {
                    $this->send($template, $number);
                }
            }
        } catch (\Exception $exception) {

        }
    }

    public function replaceManagerAndSend($order, $details, $status)
    {
        try {
            $orderDetails = $order->details;

            $template = Setting::where('name', 'manager_' . $status)->first();

            if (is_null($template) || $template->value == '') {
                return;
            }

            //
            $managers = [];
            $allItems = [];
            $allItemsQty = [];
            foreach ($orderDetails as $detail) {
                $allItems[] = $detail->product_data['title'];
                $allItemsQty[] = $detail->product_data['title'] . "($detail->quantity)";

                $product = $detail->product;
                $mobiles = [];
                if (!is_null($product->manager_mobile) && $product->manager_mobile != '') {
                    $mobiles = explode(',', $product->manager_mobile);
                }

                foreach ($mobiles as $number) {
                    if (key_exists($number, $managers)) {
                        $managers[$number]['vendor_items'] .= ',' . $detail->product_data['title'];
                        $managers[$number]['vendor_items_qty'] .= ',' . $detail->product_data['title'] . "($detail->quantity)";
                        $managers[$number]['count_vendor_items'] += $detail->quantity;
                        $managers[$number]['vendor_price'] += $detail->quantity * $detail->price;
                    } else {
                        $managers[$number]['vendor_items'] = $detail->product_data['title'];
                        $managers[$number]['vendor_items_qty'] = $detail->product_data['title'] . "($detail->quantity)";
                        $managers[$number]['count_vendor_items'] = $detail->quantity;
                        $managers[$number]['vendor_price'] = $detail->quantity * $detail->price;
                    }
                }
            }
            $allItems = implode(',', $allItems);
            $allItemsQty = implode(',', $allItemsQty);
            $countItems = $orderDetails->sum->quantity;


            foreach ($managers as $number => $manager) {
                $vendorItems = $managers[$number]['vendor_items'];
                $vendorItemsQty = $managers[$number]['vendor_items_qty'];
                $countVendorItems = $managers[$number]['count_vendor_items'];
                $vendorPrice = $managers[$number]['vendor_price'];

                $search = ['{mobile}', '{email}', '{status}', '{all_items}', '{all_items_qty}', '{count_items}',
                    '{price}', '{order_id}', '{transaction_id}', '{b_first_name}', '{b_last_name}', '{product}', '{product_status}',
                    '{vendor_items}', '{vendor_items_qty}', '{count_vendor_items}', '{vendor_price}'];
                $replace = [$order->mobile, $order->email, $order->status_label, $allItems, $allItemsQty, $countItems,
                    number_format($order->total_price) . ' تومان', $order->tracking_code, '', $order->name, $order->family, $details->product->title, $details->status_label,
                    $vendorItems, $vendorItemsQty, $countVendorItems, number_format($vendorPrice) . ' تومان'];

                $template = str_replace($search, $replace, $template->value);
                $this->send($template, $number);
            }
        } catch (\Exception $exception) {

        }
    }

    public function replaceUserAndSend($order, $details, $status, $user_id = null)
    {
        $template = $this->getUserText($order, $details, $status);

        if ($template == '') {
            return;
        }

        \App\Models\Smsir::create([
            'model_type' => 'order',
            'model_id' => $order->id,
            'mobile' => $order->mobile,
            'message' => $template,
        ]);

        OrderNote::create([
            'note' => $template,
            'is_user_note' => 1,
            'is_read' => 0,
            'order_id' => $order->id,
            'user_id' => $user_id,
        ]);

        $this->send($template, $order->mobile);

        return $template;
    }

	public function getUserAuthText($user, $status)
	{
		$template = '';
		if ($status == User::USER_REJECT_AUTH)
		{
			$template = Setting::where('name','user_ok_auth')->first()->value;
			
			
		} elseif ($status == User::USER_OK) {
			$template = Setting::where('name','user_reject_auth')->first()->value;
			
		
		}


		$search = ['{mobile}', '{email}', '{b_first_name}', '{b_last_name}'];
        $replace = [$user->mobile, $user->email, $user->name, $user->family];

    	return str_replace($search, $replace, $template);
	}

    public function getUserText($order, $details, $status)
    {
        try {
            $orderDetails = $order->details;

			if ($order->partner_id != 0)
			{
				$template = PartnerSetting::where('user_id',$order->partner_id)->where('status', 'user_' . $status)->first();
				if (is_null($template) || $template->text == '') {
					return '';
				} else {
					$template = $template->text;
				}
			} else {
				$template = Setting::where('name', 'user_' . $status)->first();
				if (is_null($template) || $template->value == '') {
					return '';
				} else {
					$template = $template->value;
				}
			}
            
            $allItems = [];
            $allItemsQty = [];
            foreach ($orderDetails as $detail) {
                $allItems[] = $detail->product_data['title'];
                $allItemsQty[] = $detail->product_data['title'] . "($detail->quantity)";
            }
            $allItems = implode(',', $allItems);
            $allItemsQty = implode(',', $allItemsQty);
            $countItems = $orderDetails->sum->quantity;

			$ticket_price = OrderDetail::where('status',Order::STATUS_COMPLETED)->whereHas('product',function($q){
								return $q->where('type',Product::TYPE_TICKET);
							})->sum('price');

            $search = ['{mobile}', '{email}', '{status}', '{all_items}', '{all_items_qty}', '{count_items}',
                '{price}', '{order_id}', '{transaction_id}', '{b_first_name}', '{b_last_name}', '{product}', '{product_status}','{product_lottery}','{ticket_price}'];
            $replace = [$order->mobile, $order->email, $order->status_label, $allItems, $allItemsQty, $countItems,
                number_format($order->total_price) . ' تومان', $order->tracking_code, '', $order->name, $order->family, $details->product->title, $details->status_label,					$details->product->lottery,number_format($ticket_price)];

            return str_replace($search, $replace, $template);
        } catch (\Exception $exception) {

        }
    }

    public function sendLicensesCode($order, $detail)
    {
        $licenses = [];
        foreach ($detail->licenses as $license) {
            $licenses[] = $license;
        }

        $template = 'سلام {b_first_name} ،بی نهایت از انتخاب شما سپاس گذاریم، منتظر نظرات شما هستیم
کد خریداری شده: {licenses}
کد سفارش: {order_id}
- فارس گیمر نیاز هر گیمر -
FarsGamer.com';

        $search = ['{licenses}', '{b_first_name}', '{order_id}'];
        $replace = [implode(',', $licenses), $order->name, $order->tracking_code];

        $template = str_replace($search, $replace, $template);

        \App\Models\Smsir::create([
            'model_type' => 'order',
            'model_id' => $order->id,
            'mobile' => $order->mobile,
            'message' => $template,
        ]);

        $this->send($template, $order->mobile);
    }

	// public function sendLicensesCodeNew($order, $detail)
    // {
    //     if (app()->environment('local')) {
    //         return;
    //     }
	// 	$licenses = [];
    //     foreach ($detail->licenses as $license) {
    //         $licenses[] = $license;
    //     }

    //     $client = new Client();
    //     $query = ['apikey' => $this->apiKey,
    //         'pid' => 'd1eq3avgdl',
    //         'fnum' => $this->lineNumber,
    //         'tnum' => $order->mobile,
    //         'p1' => 'b_first_name',
    //         'v1' => $order->name,
	// 		'p2' => 'licenses',
	// 		'v2' => implode(',', $licenses),
	// 		'p3' => 'order_id',
	// 		'v3' => $order->tracking_code
	// 		];

    //     $result = $client->get('http://ippanel.com:8080/',
    //         [
    //             'query' => $query,
    //         ]);

    //     return json_decode($result->getBody(), true);
    // }

	public function sendLicensesCodeNew($order, $detail)
    {
        if (app()->environment('local')) {
            return;
        }
		$licenses = [];
        foreach ($detail->licenses as $license) {
			try {
				$user = User::where('mobile',$order->mobile)->first();
				if (!empty($user->email))
					Mail::to($user->email)->send(new EventMail('لایسنس های خریداری شده',$license));
			} catch (\Exception $exception) {

			}
			
           
			$client = new Client();
			$query = ['apikey' => $this->apiKey,
				'pid' => 'd1eq3avgdl',
				'fnum' => $this->lineNumber,
				'tnum' => $order->mobile,
				'p1' => 'b_first_name',
				'v1' => $order->name,
				'p2' => 'licenses',
				'v2' => $license,
				'p3' => 'order_id',
				'v3' => $order->tracking_code
				];

			$result = $client->get('http://ippanel.com:8080/',
				[
					'query' => $query,
				]);
		}

        // return json_decode($result->getBody(), true);
    }

    public function send($message, $number)
    {
//        dd('sms'.$message);
        if (app()->environment('local')) {
            return;
        }

		try {
			$user = User::where('mobile',$number)->first();
			if (!empty($user->email))
				Mail::to($user->email)->send(new EventMail('پیگیری سفارش',$message));
		} catch (\Exception $exception) {

		}

        try {
            $client = new Client();
            $query = ['from' => $this->lineNumber, 'to' => $number, 'msg' => $message,
                'uname' => $this->username, 'pass' => $this->password];
            $result = $client->get('http://ippanel.com/class/sms/webservice/send_url.php', [
                'query' => $query,
            ]);

            return json_decode($result->getBody(), true);
        } catch (\Exception $exception) {
            //
        }
    }
}