<?php

namespace App\Http\Controllers\Site;

use App\Models\Setting;
use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\Category;
class Sidebar2 extends Component
{
    public $search;
    public $token, $status, $ordersOnlines = 15 , $ordersLasts = 20;
    protected $queryString = ['status'];

    public function mount($token = null)
    {
        $this->token = $token;
		$ordersOnline = OrderDetail::where('status','wc-processing')->orWhere('status','speed_plus')->orderBy('id','desc')->take(600)->get();
		$ordersLast = OrderDetail::where('status','wc-completed')->orderBy('id','desc')->take(600)->get();

		foreach($ordersLast as $item2)
		{
			$order_time = $item2->order->created_at->toArray();
			$origin = date_create($item2->order->created_at);
			$target = date_create(date('Y-m-d H:i:s'));
			$interval = date_diff($origin, $target);
			if ($interval->days == "0" && date("d") == $order_time['day']) {
				$this->ordersLasts++;
			}
		}
		$this->ordersLasts = $this->ordersLasts*2;
		foreach($ordersOnline as $item)
		{
			$order_time = $item->order->created_at->toArray();
			$origin = date_create($item->order->created_at);
			$target = date_create(date('Y-m-d H:i:s'));
			$interval = date_diff($origin, $target);
			if ($interval->days == "0" && date("d") == $order_time['day']) {
				$this->ordersOnlines++;
			}
		}
		$this->ordersOnlines = (($this->ordersOnlines));
    }

    public function updateSearch()
    {
        redirect()->route('products', ['search' => $this->search]);
    }

    public function render()
    {

		$categories = Category::with('childrenRecursive','window')->where('parent_id',null)->get()->toArray();
	
        $streams = Setting::where('name', 'streams')->get()->pluck('value', 'id');

			
			$i = 0;
			foreach ($streams as $item)
			{
				$streamers[$i] = $item;
				$streamers[$i]['is_online'] = "no";
				if (isset($item['media'])) 
				{
					switch ($item['media']){
						case 'aparat':{
							// $r = file_get_contents("https://www.aparat.com/etc/api/profile/username/".$item['url'] );
							// $r = json_decode($r);
							// dd($r);
							$r =''; 
							if (!empty($r))
							{
								$streamers[$i]['is_online'] = $r->profile->has_live;
								
							} else {
								$streamers[$i]['is_online'] = "no";
							}
							$streamers[$i]['link'] = 'https://www.aparat.com/'.$item['url'].'/live';
							break;
						}
						case 'twitch':{
							$streamers[$i]['is_online'] = "no";
							$streamers[$i]['link'] = 'https://www.twitch.tv/'.$item['url'];
							break;
						}
					}
				}
				$i++;
			}
		// dd($categories);
        return view('site.components.layouts.sidebar2', ['streams' => $streamers, 'categories' => $categories])
            ->extends('site.layouts.site');
    }

	public function getValue($col,$array,$result = [])
    {
        foreach ($array as $key => $value)
        {
            if ($key == $col)
                array_push($result,$value);
            elseif(gettype($value) == 'array')
                return $this->getValue($col,$value,$result);
        }
        return $result;
    }
}
