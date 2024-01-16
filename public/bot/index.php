<?php

include 'functions.php';

$update = file_get_contents('php://input');
file_put_contents('bot.json',$update);
$update = updateReady($update);

if (isset($update["callback_query"]))
{
	$callback_query = $update['callback_query']['data'];
	$messageId = $update['callback_query']['message']['message_id'];
	$chatId = $update['callback_query']['from']['id'];
} else {
	$message = $update['message']['text'];	
	$messageId = $update['message']['message_id'];	
	$chatId = $update['message']['from']['id'];
}

if ($message || isset($callback_query)) {
	if (isMember($chatId,CHANNEL_LINKS))
	{
		if (!$request = get_user_request($chatId)) 
			new_user_request($chatId,'categories',null,null);

		if ($message == STARTER)
			start($chatId);
		elseif ($message == CART)
			cart($chatId,$messageId);
		elseif ($message == RESET)
			reset_user($request,$chatId,$messageId);
		elseif ($message == ORDER)
			order($request,$chatId,$messageId);	
		elseif ($message == SUPPORT)
			support($request,$chatId,$messageId);		
		elseif (isset($callback_query)) {
			if ($callback_query == STARTER) {
				deleteMessage($chatId,$messageId);
				start($chatId);
			} else process_callback_query($request,$chatId,$messageId,$callback_query);
		} else {
			process_noraml_message($request,$chatId,$messageId,$message);
		}
	} else {
		deleteMessage($chatId,$messageId,$message);
		$links = [];
		foreach (CHANNEL_LINKS as $item)
			$links[] = [key1($item['name'],'',$item['link'])];
		
		$links[] = [key1(CHANNEL_ADDED,STARTER)];
		
		sendMessage($chatId,CHANNEL_LEFT_MESSAGE,inline_keyboard($links));
	}

}
exit();