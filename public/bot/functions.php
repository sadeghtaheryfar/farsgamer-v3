<?php

include 'config.php';

include 'db_functions.php';

function updateReady($update)
{
	return json_decode($update,true);
}

function sendMessage($chatId,$text,$key = '' , $reply_to_message_id = null)
{
	$result = http_request("sendMessage",array(
		'chat_id' => $chatId,
		'text' => $text,
		'reply_markup' => $key,
		'parse_mode' => 'HTML',
		'reply_to_message_id' => $reply_to_message_id
		)
	);
}

function key1($text , $data , $url = null)
{
	$otp = [
		'text' => $text,
		'callback_data' => $data
	];

	if (!is_null($url))
		$otp['url'] = $url;

	return $otp;
}

function inline_keyboard($otp)
{
	$reply = [
		'inline_keyboard' => $otp,
	];

	return json_encode($reply,true);
}

function editMessage($chatId , $messageId , $text,$key = '')
{
	$result = http_request("editMessageText",array(
		'chat_id' => $chatId,
		'message_id'=> $messageId,
		'text' => $text,
		'reply_markup' => $key,
		'parse_mode' => 'HTML'
	));
}

function deleteMessage($chatId , $messageId)
{
	$result = http_request("deleteMessage",array('chat_id' => $chatId,'message_id'=> $messageId));
}

function isMember($chatId , $channes)
{
	foreach (CHANNEL_LINKS as $item) {
		$result = http_request("getChatMember",array('user_id' => $chatId,'chat_id'=> $item['id']));
		if ($result['result']['status'] == 'left') {
			return false;
		}
	}
	return true;
}

function start($chatId)
{
	$request = update_user_request($chatId,'categories',null);
	$keyboard = keyboard();
	sendMessage($chatId,$keyboard['message'],$keyboard['keyboard']);
}

function keyboard($back = false , $parent = null , $paginate = 0)
{
	$controls = [];
	$categories = get_categories($parent);
	$keys = [];
	$chunk = 2;
	$message = CATEGORY_SELECTION;

	foreach ($categories as $item)
		$keys[] = key1("🔹".$item['title'] , CATEGORY_PREFIX.EXPLODE_SIGN.$item['id'].EXPLODE_SIGN.'0');
	
	if (sizeof($keys) == 0 && !is_null($parent)) {
		$message = PRODUCT_SELECTION;
		$chunk = 1;
		$next_page = null;
		$previous_page = null;
		$products_count = get_products_count($parent);
		if ($products_count > PRODUCTS_PER_PAGE) {
			$pages_count = ceil($products_count/PRODUCTS_PER_PAGE) - 1;

			if ($pages_count - $paginate > 0) {
				
				$next_page = $paginate + 1;
				$next_page_number = convert2english($next_page+1);
				$next_page_key = key1("صفحه بعدی ◀️ ($next_page_number)" , CATEGORY_PREFIX.EXPLODE_SIGN.$parent.EXPLODE_SIGN.$next_page);	
			}

			if ($paginate - 1 >= 0) {
				$previous_page = $paginate - 1;
				$previous_page_number = convert2english($previous_page+1);
				$previous_page_keys = key1("صفحه قبل ▶️ ($previous_page_number)" , CATEGORY_PREFIX.EXPLODE_SIGN.$parent.EXPLODE_SIGN.$previous_page);	
			}

			$paginate = $paginate*PRODUCTS_PER_PAGE;

		} 

		$products = get_products($parent , $paginate);
		foreach ($products as $item) { 
			$final_price = price_label($item);
			$key_label = (convert2english( truncate("🔹 ".$item['title'],PRODUCTS_TITLE_MAX_LENGTH) ).' - ('.$final_price.')');

			$keys[] = key1(  $key_label, PRODUCT_PREFIX.EXPLODE_SIGN.$item['id']);

		}
		
		if (!is_null($next_page) && !is_null($previous_page) ) 
			$controls[] = [$next_page_key , $previous_page_keys];
		elseif (!is_null($next_page)) 
			$controls[] = [$next_page_key];
		elseif (!is_null($previous_page)) 
			$controls[] = [$previous_page_keys];	
		
	}

	if (($back || is_null($back)) && !is_null($parent)) 
		$controls[] = [key1('بازگشت ⤵️' , BACK_PREFIX.EXPLODE_SIGN.$back)];
	
	return [
		'keyboard' => inline_keyboard( array_merge(array_chunk($keys,$chunk),$controls) ),
		'message' => $message
	];
}

function price_calc($product)
{
	$final_price = $product['amount'];
	$discount = 0;

	if (!empty($product['currency_id'])) {
		$currency_amount = get_currency($product['currency_id'])['amount'];

		if (!$product['const_price'])
			$final_price = round($product['amount'] * $currency_amount,-3);
	}

	if ($product['discount_amount'] > 0 ) {

		$discount = $product['discount_type'] == PRODUCTS_DISCOUNT_TYPE_FIXED ?
            $product['discount_amount']:
            round($product['discount_amount'] * $final_price / 100);

		$discount =  $discount > $final_price ? $final_price : $discount;	

		$discount_label = ' تخقیف ویژه ';

		$final_price = $final_price - $discount;
	}


	return [
		'price' => $final_price + $discount, 'discount' => $discount, 'total' => $final_price
	];

}

function price_label($product)
{
	$final_price = $product['amount'];
	$discount_label = '';

	if ($product['amount'] > 0) {
	
		if ($product['discount_amount'] > 0 ) {
			$discount_label = ' تخقیف ویژه ';
		}

		$final_price = price_calc($product);

		$final_price = $discount_label.convert2english(number_format($final_price['total'])).' تومان';
	} else $final_price = 'متغیر';

	return $final_price;
}

function process_callback_query($request,$chatId , $messageId , $callback_query)
{
	$edit = false;
	$prefix = explode(EXPLODE_SIGN,$callback_query);

	switch($prefix[0]) 
	{
		case CATEGORY_PREFIX:
			$category = get_category($prefix[1])['parent_id'];	
			$keyboard = keyboard($category , $prefix[1] ,$prefix[2]);
			$edit = true;
			break;
		case BACK_PREFIX:
			$category = get_category($prefix[1])['parent_id'];	
			$keyboard = keyboard($category,empty($prefix[1]) ? null : $prefix[1] ,$prefix[2] );
			$edit = true;
			break;
		case CART_PREFIX_DELETE:
			empty_cart($chatId,(isset($prefix[1]) && !empty($prefix[1])) ? $prefix[1] : null);
			delete_order(['chat_id','=',$chatId]);
			$message = (isset($prefix[1]) && !empty($prefix[1])) ? 'محصول با موفقیت از سبد خرید حذف شد ✅' : 'سبد خرید شما با موفقیت پاکسازی شد ✅';
			editMessage($chatId,$messageId,$message);
			break;
		case CART_PREFIX_DELETE_SINGLE:
			$request = update_user_request($chatId,'carts',null,CART_PREFIX_DELETE_SINGLE);
			$message = '▪️ لطفا کد موردی محصول را وارد نمایید  :';
			sendMessage($chatId,$message,null,$messageId);
			break;		
		case PRODUCT_PREFIX:
			$key = [];
			if (get_user_cart_count($chatId)['count'] < MAX_CART_ITEMS) {
				$product = get_product($prefix[1]);
				$request = update_user_request($chatId,PRODUCTS_FILL_DATA,$product['id'],PRODUCTS_FILL_DATA_QUANTITY,$product['form']);
				$message = '▪️ لطفا تعداد مورد نظر برای محصول را وارد نمایید  :';
				sendMessage($chatId,$message,null,$messageId );
			} else {
				sendMessage($chatId,MAX_CART_MESSAGE,null,$messageId);
			}
			break;
		case PRODUCTS_FILL_DATA_FORM:

			if ($request['model_id'] == $prefix[4]) {
				$request = update_user_request($chatId,
					$request['model'],
					$request['model_id'],
					$request['session'],
					$request['session_data'],
					$request['quantity'],
					$prefix[3]
				);

				$forms = json_decode($request['session_data'],true);
				$form = $forms[$request['session_data_key']];
				if (!empty($callback_query)) {
					$form['inserted_value'] = $forms[$request['session_data_key']]['options'][$prefix[1]]['value'];
					$form['inserted_price'] = $prefix[2];
				} 
				$forms[$request['session_data_key']] = $form;
				check_forms($request,$chatId,$forms,$messageId,true);
			}
			
			break;
		case CART_PREFIX_PAY:
			if (!get_order($chatId)) {
				$cart = get_user_cart_items($chatId);
				$total = 0;
				$price = 0;
				$reduction_amount = 0;
				foreach ($cart as $item) {
					$total = $total + $item['total_price']*$item['quantity'];
					$price = $price + $item['price']*$item['quantity'];
					$reduction_amount = $reduction_amount + $item['reduction_amount']*$item['quantity'];
				}
				set_order([
					'chat_id' => $chatId,
					'price' => $price,
					'reduction_value' => $reduction_amount,
					'total_price' => $total
				]);
			} 
			payment($chatId,$messageId);
			break;	
	}
			
	if ($edit)
		editMessage($chatId,$messageId ,$keyboard['message'],$keyboard['keyboard']);
}

function payment($chatId,$messageId)
{
	$cart_items = get_user_cart_items($chatId);
	if ($cart_items) {
		$order = get_order($chatId);
		if ($order) {
			switch ($order['session']) {
				case PAYMENT_STEPS['number']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['number']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['number']['label'],null,$messageId);
					break;
				case PAYMENT_STEPS['otp']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['otp']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['otp']['label'],null,$messageId);
					break;	
				case PAYMENT_STEPS['email']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['email']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['email']['label'],null,$messageId);
					break;
				case PAYMENT_STEPS['reduction_code']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['reduction_code']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['reduction_code']['label'],null,$messageId);
					break;	
				case PAYMENT_STEPS['province']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['province']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['province']['label'],null,$messageId);
					break;		
				case PAYMENT_STEPS['city']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['city']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['city']['label'],null,$messageId);
					break;
				case PAYMENT_STEPS['postalCode']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['postalCode']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['postalCode']['label'],null,$messageId);
					break;
				case PAYMENT_STEPS['address']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['address']['key']
					);
					sendMessage($chatId,PAYMENT_STEPS['address']['label'],null,$messageId);
					break;	
				case PAYMENT_STEPS['completed']['key']:
					$request = update_user_request($chatId,
						PAYMENT_STEP,
						null,
						PAYMENT_STEPS['completed']['key']
					);
					final_payment($chatId , $messageId);
					break;						
			}
		}
	}
}

function http_request($route , $query = [])
{
	$url = BOT_ADDRESS."/".$route;
	$ch_session = curl_init();
	curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch_session, CURLOPT_URL, $url);
	curl_setopt($ch_session, CURLOPT_POSTFIELDS,http_build_query($query));
	$result = json_decode(curl_exec($ch_session),true);
	curl_close($ch_session);
	return $result;
}

function http_request_fg($route , $query = [])
{
	$url = "https://farsgamer.com/api/".$route;
	$ch_session = curl_init();
	curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch_session, CURLOPT_URL, $url);
	curl_setopt($ch_session, CURLOPT_POSTFIELDS,http_build_query($query));
	$result = json_decode(curl_exec($ch_session),true);
	$code = curl_getinfo($ch_session, CURLINFO_HTTP_CODE);
	curl_close($ch_session);
	return ['result' => $result , 'code' => $code];
}


function convert2english($string) 
{
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        // $string =  str_replace($newNumbers,$persianDecimal, $string);
        return str_replace($newNumbers,$persian, $string);
}

function cart($chatId,$messageId)
{
	$keys = [];
	$cart = '<strong>🧺 سبد خرید : </strong>';
	$total = 0;
	$cart_items = get_user_cart_items($chatId);

	if ($cart_items) {
		foreach ($cart_items as $key => $item) {
			$cart .= "\n\n";
			$cart .= "▪️ کد موردی : ".$item['id'];
			$cart .= "\n";
			$cart .= "🔹 محصول : ".$item['product_title'];
			$cart .= "\n";
			$cart .="🔹 تعداد  : ".($item['quantity'] == null ? 'تعیین نشده' : convert2english($item['quantity']));
			$cart .= "\n";
			if (!is_null($item['forms'])) {
				foreach(json_decode($item['forms'],true) as $form) {
					if (isset($form['inserted_value'])) {
						$cart .= "\n";
						$cart .= "📝 ".strip_tags($form['label']);
						$cart .= "\r";
						$cart .= "✍️ ورودی :  ".$form['inserted_value'];
						$cart .= "\n";
					}
				}
				$cart .= "\n";
			}
			$cart .="💲 قیمت : ".($item['price'] > 0 ? convert2english(number_format($item['price'])).' تومان' : 'متغییر');
			$cart .= "\n";
			$cart .="💯 تخفیف محصول : ".convert2english(number_format($item['reduction_amount'])).' تومان';
			$cart .= "\n";
			$cart .="💵 مجموع  : ".($item['price'] > 0 ? convert2english(number_format($item['total_price']*$item['quantity'])).' تومان' : 'متغییر');
			$cart .= "\n";
			$total = $total +  $item['total_price']*$item['quantity'];
		}
		$keys[] = [key1(  "⬅️ ".'ادامه خرید', CART_PREFIX_PAY.EXPLODE_SIGN)];
		$keys[] = [key1(  "♻️ ".'پاک کردن سبد خرید', CART_PREFIX_DELETE.EXPLODE_SIGN)];
		$keys[] = [key1(  "🗑 ".'پاک کردن موردی از سبد خرید', CART_PREFIX_DELETE_SINGLE.EXPLODE_SIGN)];
		$cart .= "\n\n\n";
		$cart .="💲 جمع کل سبد خرید : ".convert2english( number_format($total) ).' تومان';

	} else {
		$cart .= "\n\n";
		$cart .= "سبد خرید شما در حال حاضر خالی می باشد";
	}

	sendMessage($chatId,$cart,inline_keyboard($keys),$messageId);
}

function truncate($string,$length=100,$append="...") 
{
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function array_value_recursive($key, array $arr): array
{
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) $val[] = $v;
    });
    return $val;
}

function process_noraml_message($request,$chatId,$messageId,$message)
{
	if (!empty($request['model']) && !empty($request['session'])) {
		$session = $request['session'];
		
		if (!is_null($request['session_data'])) {
			$forms = json_decode($request['session_data'],true);
		}
		$message = security_filter($message);
		switch ($session) {
			case CART_PREFIX_DELETE_SINGLE:
				if ( get_cart_item($chatId,convert2EnglishNumber($message)) ) {
					empty_cart($chatId,convert2EnglishNumber($message));
					$message = 'محصول با موفقیت از سبد خرید حذف شد ✅';
					update_user_request($chatId,null,null,null);
					delete_order(['chat_id','=',$chatId]);
				} else {
					$message = 'محصولی با این کد یافت نشد ⚠️';
				}
				sendMessage($chatId,$message,null,$messageId);
				break;
			case PRODUCTS_FILL_DATA_QUANTITY:
				$message = convert2EnglishNumber($message);
				$product = get_product($request['model_id']);
				if (is_numeric($message) && $message > 0 && $message < 100 && preg_match('/^\d+$/',$message)) {
					if ($message <= $product['quantity'] || $product['type'] != PHYSICAL_PRODUCTS) {
						$form = json_decode($request['session_data'],true);
						if (sizeof($form) > 0) {
							// file_put_contents(ERROR_FILE,$form[0]['type']);
							update_user_request($chatId,$request['model'],$request['model_id'],PRODUCTS_FILL_DATA_FORM,$request['session_data'],$message,0);
							product_form_process($request,$chatId,$messageId , $request['model_id'],$form[0],$form);
						} else {
							start_add_to_cart($chatId,$messageId,$request['model_id'],$message);
							update_user_request($chatId,null,null,null);
						}
					} else {
						$message = 'موجودی انبار کمتر از تعداد درخواستی می باشد ⚠️';
						sendMessage($chatId,$message,null,$messageId);
					}
					
				} else {
					$message = 'عدد وارد شده نامعتبر می باشد ⚠️';
					sendMessage($chatId,$message,null,$messageId);
				}
				
				break;	
			case PRODUCTS_FILL_DATA_FORM:
				if (!empty($message)) {
					$form = json_decode($request['session_data'],true);
					$form = $forms[$request['session_data_key']];
					$form['inserted_value'] = $message;
					$forms[$request['session_data_key']] = $form;
					check_forms($request,$chatId,$forms,$messageId);
				} else {
					$message = 'مقدار وارد شده نامعتبر می باشد ⚠️';
					sendMessage($chatId,$message,null,$messageId);
				}
				break;
			case PAYMENT_STEPS['number']['key']:
				
				$message = convert2EnglishNumber($message);
				try {
					$api_result = http_request_fg('validateNumber',[
						'number' => $message
					]);
				} catch (Exception $e) {
					sendMessage($chatId,'خظایی در هنگام ارسال کد تایید رخ داده است لطفا بعدا مجدد تلاش کنید ⚠️',null,$messageId);
				}
				if ($api_result['code'] == 200) {
					update_orders([
						'number' => $message,
						'session' => PAYMENT_STEPS['otp']['key'],
					],where(['chat_id','=',$chatId]));
					payment($chatId , $messageId);
				} else {
					// $message = $api_result['result']['data']['message']['number'][0];
					$message = 'شماره همراهی یافت نشد ⚠️';
					$message .= "\n\n";
					$message .= "برای ثبت نام به ادرس https://farsgamer.com/auth مراجعه فرمایید";
					sendMessage($chatId,$message,null,$messageId);
				}
				
				break;
			case PAYMENT_STEPS['otp']['key']:
				$message = convert2EnglishNumber($message);
				$order = get_order($chatId);
				if ($order) {
					$api_result = http_request_fg('validateOtp',[
						'number' => $order['number'],
						'code' => $message
					]);
					if ($api_result['code'] == 200) {
						if (isset($api_result['result']['data']['user']['email']) && !empty($api_result['result']['data']['user']['email'])) {
							$email = $api_result['result']['data']['user']['email'];
							$step = PAYMENT_STEPS['reduction_code']['key'];
						} else {
							$email = null;
							$step = PAYMENT_STEPS['email']['key'];
						}
						update_orders([
							'email' => $email,
							'session' => $step,
						],where(['chat_id','=',$chatId]));
						payment($chatId , $messageId);
					} else {
						$message = $api_result['result']['data']['message']['code'][0];
						sendMessage($chatId,$message,null,$messageId);
					}
				}
				break;
			case PAYMENT_STEPS['email']['key']:
				$message = convert2EnglishNumber($message);
				if (filter_var($message, FILTER_VALIDATE_EMAIL)) {
					$step = PAYMENT_STEPS['reduction_code']['key'];
					update_orders([
						'email' => $message,
						'session' => $step,
					],where(['chat_id','=',$chatId]));
					payment($chatId , $messageId);
				} else {
					$message = 'ایمیل وارد شده نامعتبر می باشد ⚠️';
					sendMessage($chatId,$message,null,$messageId);
				}
				
				break;	
			case PAYMENT_STEPS['reduction_code']['key']:
				$message = convert2EnglishNumber($message);

				$order = get_order($chatId);
				$code_data = [
					'code' => $message,
					'cart' => json_encode(get_user_cart_items($chatId)),
					'number' => $order['number'],
				];
				$check_code = http_request_fg('validateReduction',$code_data);
				$reduction_amount = 0;

				if ($check_code['code'] == 200 || $message == SKIP) {
					if (has_physical_product($chatId)) {
						$step = PAYMENT_STEPS['province']['key'];
					} else {
						$step = PAYMENT_STEPS['completed']['key'];
					}

					$data = [];

					$data['session'] = $step;

					if ($check_code['code'] == 200) {
						$data['reduction_code'] = $message;
						$data['reduction_value'] = $check_code['result']['data']['price']['voucherAmount'] + $order['reduction_value'];
						$data['total_price'] = max(0,$check_code['result']['data']['price']['total']);
						$data['code_reduction_amount'] = $check_code['result']['data']['price']['voucherAmount'];
						$message = 'کد تخفیف با موفقیت اعمال شد ✅';
						$message .= "\n\n\n";
						$message .= "💯 مقدار تخفیف : ".convert2english(number_format($data['reduction_value']))." تومان";

						$message .= "\n\n\n";
						$message .= "💵 قابل پرداخت : ".convert2english(number_format($data['total_price']))." تومان";
						sendMessage($chatId,$message,null,$messageId);
					}
					update_orders($data,where(['chat_id','=',$chatId]));
					payment($chatId , $messageId);

					

				} else {
					$message = $check_code['result']['data']['message']['code'][0] ? $check_code['result']['data']['message']['code'][0].'⚠️' : 'کد وارد شده نامعتبر می باشد ⚠️';
					sendMessage($chatId,$message,null,$messageId);
				}
				break;			
			case PAYMENT_STEPS['province']['key']:
				$message = convert2EnglishNumber($message);
				update_orders([
					'province' => $message,
					'session' => PAYMENT_STEPS['city']['key'],
				],where(['chat_id','=',$chatId]));
				payment($chatId , $messageId);
				
				break;		
			case PAYMENT_STEPS['city']['key']:
				$message = convert2EnglishNumber($message);
				update_orders([
					'city' => $message,
					'session' => PAYMENT_STEPS['postalCode']['key'],
				],where(['chat_id','=',$chatId]));
				payment($chatId , $messageId);
				
				break;
			case PAYMENT_STEPS['postalCode']['key']:
				$message = convert2EnglishNumber($message);
				update_orders([
					'postalCode' => $message,
					'session' => PAYMENT_STEPS['address']['key'],
				],where(['chat_id','=',$chatId]));
				payment($chatId , $messageId);
				
				break;	
			case PAYMENT_STEPS['address']['key']:
				$message = convert2EnglishNumber($message);
				update_orders([
					'address' => $message,
					'session' => PAYMENT_STEPS['completed']['key'],
				],where(['chat_id','=',$chatId]));
				order($chatId);
				payment($chatId , $messageId);
				
				break;			
		}
		
	}
	
}


function final_payment($chatId , $messageId)
{
	sendMessage($chatId,PAYMENT_STEPS['completed']['label'],null,$messageId);
	$cart = get_user_cart_items($chatId);
	$order = get_order($chatId);
	$key = [];
	if (sizeof($cart) > 0 && $order) {
		$data = [
			'cart' => $cart,
			'order' => $order
		];

		$data = json_encode($data);

		$api_result = http_request_fg('startPayment',[
			'data' => $data
		]);

		if ($api_result['code'] == 200) {
			$message = "صفحه پرداخت با موفقیت ایجاد شد ✅";
			$key[] = [
				key1( 
					'ورود به صفحه پرداخت💲',
					'',
					$api_result['result']['data']['url']
				)
			];
			$keyboard = inline_keyboard($key);
			delete_order(['chat_id','=',$chatId]);
			empty_cart($chatId);
		} else {
			$message = $message = "مشکلی در عملیات پرداخت پیش امده است ⚠️";
			$keyboard = null;
		}
		sendMessage($chatId,$message,$keyboard,$messageId);
	}
}


function has_physical_product($chatId)
{
	$result = false;

	$cart = get_user_cart_items($chatId);

	foreach($cart as $item)
	{
		$product = get_product($item['product_id']);
		if ($product['type'] == PHYSICAL_PRODUCTS) {
			$result = true;
			break;
		}
	}

	return $result;
}

function check_forms($request,$chatId,$forms,$messageId , $callback_q = false)
{
	if (
		isset($forms[$request['session_data_key'] + 1]) &&
		!empty($forms[$request['session_data_key'] + 1]) &&
		in_array($forms[$request['session_data_key'] + 1]['type'] , ['select','customRadio','radio','text','speedPlus'])
	) {
		
		$request = update_user_request($chatId,
			$request['model'],
			$request['model_id'],
			PRODUCTS_FILL_DATA_FORM,json_encode($forms,true),
			$request['quantity'],
			$request['session_data_key'] + 1
		);

		if (!check_form_conditions($forms[$request['session_data_key'] + 1] , json_decode($request['session_data'],true))) {
			
			check_forms($request,$chatId,$forms,$messageId, $callback_q);
			return;
		}
		

		product_form_process($request,$chatId,$messageId , $request['model_id'],$forms[$request['session_data_key']],$forms, $callback_q);
		
	} else {
		start_add_to_cart($chatId,$messageId,$request['model_id'],$request['quantity'] , json_encode($forms,true));
		update_user_request($chatId,null,null,null);
	}
}

function product_form_process($request,$chatId,$messageId , $product_id , $form,$forms, $callback_q = false)
{
	$conditions = $form['conditions'];
	$options = $form['options'];
	$product = get_product($request['model_id']);
	switch ($form['type'])
	{
		case 'customRadio' || 'selcet' || 'radio' || 'speedPlus':
			$key = [];
			$price = 0;
			foreach ($options as $key2 => $item)
			{
				if (!$product['const_price']) {
					$currency_amount = 1;
					if (!is_null($product['currency_id'])) {
						$currency_amount = get_currency($product['currency_id'])['amount'];
					}
					$price = $item['price'] * $currency_amount;
				}
				else 	
					@$price = $item['price'];

				if (isset($item['license']) && $item['license'] != '') {
                    $product = get_product_by_slug($item['license']);
                    $price = price_calc($product)['total'];
                }	
				
				$key[] = [
					key1( 
						$item['value'].($price > 0 ? ("-(".convert2english(number_format($price))." تومان )") : ''),
					 	PRODUCTS_FILL_DATA_FORM.EXPLODE_SIGN.$key2.EXPLODE_SIGN.$price.EXPLODE_SIGN.($request['session_data_key'] ?? 0).EXPLODE_SIGN.$request['model_id']
					)
				];
			}

			if ($callback_q) {
				editMessage($chatId , $messageId ,strip_tags($form['label']),inline_keyboard($key));
			} else {
				sendMessage($chatId,strip_tags($form['label']),inline_keyboard($key),$messageId);
			}
			
			break;
		case 'text':
			sendMessage($chatId,strip_tags($form['label']).( ($v = $form['value'] || $v = $form['placeholder']) ? '('.$v.')' : '' ),null,$messageId);
			break;		
	}
}

function check_form_conditions($form , $forms)
{
	$show = true;

	if (sizeof($form['conditions']) == 0) {
		$show = true;
	} else {
		foreach ($form['conditions'] as $condition) {
			$form_target = array_filter(
				$forms , 
				function($v) use ($condition) {
					if ($v['name'] == $condition['value'])
						return true;

					return false;	 
				}
			);

			if ($condition['target'] == $form_target[0]['inserted_value'] ) {
				$show = $condition['visibility'] == 'show';
				break;
			}
			
		}
	}


	return $show;
}

function start_add_to_cart($chatId,$messageId,$product_id , $quantity , $forms = null)
{
	delete_order(['chat_id','=',$chatId]);
	$product = get_product($product_id);
	$final_price = price_calc($product);

	if (!is_null($forms)) {
		foreach (json_decode($forms,true) as $item) {
			$final_price['total'] = $final_price['total'] + $item['inserted_price'];
			$final_price['price'] = $final_price['price'] + $item['inserted_price'];
		}
	}

	$item = add_to_cart([
		'chat_id' => $chatId,
		'product_title' => $product['title'],
		'product_id' => $product_id,
		'price' => $final_price['price'],
		'total_price' => $final_price['total'],
		'quantity' => $quantity,
		'reduction_amount' => $final_price['discount'],
		'status' => CART_STATUS['pending']['key'],
		'forms' => $forms
	]);
	$message = "<strong>"."✅ ".ADDED_MESSAGE."</strong>";
	$message .="\n\n";
	$message .="<strong>📑 جزئیات : </strong>";
	$message .="\n\n";
	$message .="📦 محصول : ".$product['title'];
	$message .="\n\n\n";
	$message .="📦 تعداد : ".convert2english($quantity);
	$message .="\n\n\n";
	$message .="💲 قیمت : ".($final_price['price'] > 0 ? convert2english(number_format($final_price['price'])).' تومان' : 'متغییر');
	$message .="\n\n\n";
	$message .="💯 تخفیف محصول : ".convert2english(number_format($final_price['discount'])).' تومان';
	$message .="\n\n\n";
	$message .="💵 مجموع  : ".($final_price['price'] > 0 ? convert2english(number_format($final_price['total']*$quantity)).' تومان' : 'متغییر');
	$message .="\n\n\n";
	$message .= "برای ادامه خرید می توانید روی ".CART." کلیک نمایید";
	$key[] = [key1(  "❌ ".'پاک کردن از سبد خرید', CART_PREFIX_DELETE.EXPLODE_SIGN.$item['id'])];
	sendMessage($chatId,$message,inline_keyboard($key),$messageId );
}


function convert2EnglishNumber($string) 
{
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string =  str_replace($persianDecimal, $newNumbers, $string);
        $string =  str_replace($arabicDecimal, $newNumbers, $string);
        $string =  str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
}


function reset_user ($request,$chatId,$messageId)
{
	delete_order(['chat_id','=',$chatId]);
	if (
		!is_null($request['model']) || !is_null($request['model_id']) ||
		!is_null($request['session']) || !is_null($request['session_data']) || !is_null($request['quantity']) || !is_null($request['session_data_key'])
	) {
		update_user_request($chatId,null,null,null);
		sendMessage($chatId,'کلیه پردازش ها با موفقیت لغو شدند ✅',null,$messageId );
	}
	
}

function security_filter($string)
{
	$signs = [
		'document','cookie','alert'
	];

	$string = str_replace($signs,'',$string);

	$string = filter_var($string, FILTER_SANITIZE_STRING);


	return $string;
}

function order($request,$chatId,$messageId)
{
	$order = get_order($chatId);
	$keys = [];
	$message = '<strong>🧮 مراحل سفارش من : </strong>';
	if ($order) 
	{
		$message .= "\n\n";
		$message .= "📨 ادرس ایمیل : ".(!empty($order['email']) ? $order['email'] : 'نامشخص⁉️');
		$message .= "\n\n";
		$message .= "📱 شماره همراه : ".(!empty($order['number']) ? $order['number'] : 'نامشخص⁉️');
		$message .= "\n\n";
		$message .= "💰 قیمت : ".(convert2english(number_format($order['price'])))." تومان";
		$message .= "\n\n";
		$message .= "💰 تخفیف محصول : ".(convert2english(number_format(max(0,$order['reduction_value'] - $order['code_reduction_amount']))))." تومان";
		$message .= "\n\n";
		$message .= "💰 کد تخفیف : ".(!empty($order['reduction_code']) ? $order['reduction_code'] : 'نامشخص⁉️');
		$message .= "\n\n";
		$message .= "💰 بابت کد تخفیف : ".(convert2english(number_format($order['code_reduction_amount'])))." تومان";
		$message .= "\n\n";
		$message .= "💰 قایل پرداخت  : ".(convert2english(number_format($order['total_price'])))." تومان";
		$message .= "\n\n";
		$message .= "💰 قایل پرداخت  : ".(convert2english(number_format($order['total_price'])))." تومان";
		if (has_physical_product($chatId)) {
			$message .= "\n\n";
			$message .= "🏠 استان : ".(!empty($order['province']) ? $order['province'] : 'نامشخص⁉️');
			$message .= "\n\n";
			$message .= "🏠 شهر : ".(!empty($order['city']) ? $order['city'] : 'نامشخص⁉️');
			$message .= "\n\n";
			$message .= "🏠 کد پستی : ".(!empty($order['postalCode']) ? $order['postalCode'] : 'نامشخص⁉️');
			$message .= "\n\n";
			$message .= "🏠 ادرس : ".(!empty($order['address']) ? $order['address'] : 'نامشخص⁉️');
		}
		// $keys[] = [key1(  "⬅️ ".'ادامه خرید', CART_PREFIX_PAY.EXPLODE_SIGN)];	
	} else {
		$message .= "\n\n";
		$message .= "هیج سفارش در حال پردازشی وجود ندارد";
	}

	sendMessage($chatId,$message,null,$messageId);
}

function support($request,$chatId,$messageId)
{
	sendMessage($chatId,SUPPORT_MESSAGE,null,$messageId);
}