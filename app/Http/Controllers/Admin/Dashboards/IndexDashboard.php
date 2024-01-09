<?php

namespace App\Http\Controllers\Admin\Dashboards;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\PaymentTransaction;

class IndexDashboard extends BaseComponent
{
    use AuthorizesRequests;

	public $from_date , $to_date;

	public $selectedDate , $manager;
	public $message , $label = 'فروش امروز';
	
	protected $queryString = ['manager','selectedDate','from_date','to_date'];

	public function updatedFromDate()
	{
		return redirect()->route('admin.dashboard',['from_date'=>$this->from_date,'to_date'=>$this->to_date]);
	}

	public function updatedToDate()
	{
		return redirect()->route('admin.dashboard',['from_date'=>$this->from_date,'to_date'=>$this->to_date]);
	}

    public function render()
    {
		// dd(1);
		if (!is_null($this->from_date)){
			$from_date = Carbon::make($this->from_date);
			if (!empty(auth()->user()->manager_start_date) && auth()->user()->manager_start_date <> '0000-00-00'){
		  		$start = Carbon::make(auth()->user()->manager_start_date);
				$diff = (int)$start->diff($from_date)->format('%r%d');
				
				if ($diff >= 0){
					$start = $from_date->format('Y-m-d');
				}
				else
					$start = $start->format('Y-m-d');
			} else 	
				$start = $from_date->format('Y-m-d');
				
		} elseif (!is_null(auth()->user()->manager_start_date) && auth()->user()->manager_start_date <> '0000-00-00'){	
		  	$start = Carbon::make(auth()->user()->manager_start_date)->format('Y-m-d');
		} else {
			$start = Carbon::now()->subDays(1)->format('Y-m-d');
			
		}


		if (!is_null($this->to_date)){
			$to_date = Carbon::make($this->to_date);
			if (!is_null(auth()->user()->manager_start_date)){	
		  		$end = Carbon::make(auth()->user()->manager_start_date);
				$diff = (int)$end->diff($to_date)->format('%r%d');
				
				if ($diff >= 0){
					$end = $to_date->format('Y-m-d');
				}
				else
					$end = Carbon::now()->format('Y-m-d');
			} else 	
				$end = $to_date->format('Y-m-d');
				
		} else {
			$end = Carbon::now()->format('Y-m-d');
		}





		
		if (auth()->user()->hasRole('super_admin') )
		{
			$this->reset(['manager']);
		}
		elseif (auth()->user()->hasPermissionTo('product_manager') ){
			$this->manager = true;
		}

		
		
			


       $today_product = [];
	   $onHoldOrders = 0;
	   $refundedOrders = 0;
	   $allPayments = 0;
	   $reductionAmount = 0;
	   $walletAmount = 0;
		
	   
	   $this->to_date = $end;
        $this->from_date = $start;

		 $products = Product::latest()
            ->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%')
            ->get()->pluck('id');

		$allBaseOrders = Order::with(['details'])->when($this->manager,function($q) use ($products){
			return $q->whereHas('details',function($q) use ($products){
				return $q->whereIn('product_id', $products);
			});
		})->latest('id')->where(function($query) use ($start) {
			return $query->whereHas('details',function($query){
				return $query->where('status', Order::STATUS_COMPLETED);
			});
		})->whereBetween('created_at', [$start.' 00:00:00', $this->to_date.' 23:59:59'])->cursor();
		
		
		foreach($allBaseOrders as $item)
		{
			$reductionAmount = $reductionAmount + $item->voucher_amount;
			$walletAmount = $walletAmount + $item->wallet_pay;
			$allPayments = $allPayments + $item->total_price;
			$onHoldOrders = $onHoldOrders + $item->details->where('status',Order::STATUS_HOLD)->count();
			$refundedOrders = $refundedOrders + $item->details->where('status',Order::STATUS_REFUNDED)->count();
		}

		// dd(1);
		 
		$orderDetails = Product::when($this->manager,function($q){
			return $q->where('manager_mobile','LIKE','%'.auth()->user()->mobile.'%');
		})->withCount(['details' => function($q) use ($start){
			 return $q->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) use ($start){
				return $q->whereBetween('created_at', [$start.' 00:00:00', $this->to_date.' 23:59:59']);
			});
		}])->whereHas('details', function($q) use ($start){
			return $q->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) use ($start){
				return $q->whereBetween('created_at', [$start.' 00:00:00', $this->to_date.' 23:59:59']);
			});
		})->get()->sortByDesc('details_count');
	
		
        return view('admin.dashboards.index-dashboard' ,
		['most_sold_products' =>$orderDetails,'allOrders' => $allBaseOrders,'allPayments' => $allPayments,'refundedOrders' => $refundedOrders,'onHoldOrders'=> $onHoldOrders,'reductionAmount' => $reductionAmount , 'walletAmount' => $walletAmount ]
		)
            ->extends('admin.layouts.admin');
    }

	public function emitEvent()
    {
        $this->emit('runChart',$this->getChartData());
    }

    public function getChartData()
    {
        $chart = [];
        $dates = $this->getDates();
        $chartModels = [
            'payments' => ['model' => new Order(),
                'where' => [] , 'sum' => 'total_price'],
        ];
		// if (auth()->user()->hasRole('super_admin') )
        foreach ($chartModels as $key => $chartModel) {
            $chart[$key] = [];
            $chart['label'] = [];
            for ($i = 0 ; $i< count($dates); $i++) {
				if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin')){
						array_push($chart[$key],
                    	(float)$chartModel['model']
                        ->whereBetween('created_at', [$dates[$i]->format('Y-m-d')." 00:00:00", $dates[$i]->format('Y-m-d')." 23:59:59"])
						->whereHas('details',function($q){
								return $q->where('status',ORDER::STATUS_COMPLETED);
							})->sum($chartModel['sum']));
				} else {
				
					array_push($chart[$key],
						(float)$chartModel['model']
							->whereBetween('created_at', [$dates[$i]->format('Y-m-d')." 00:00:00", $dates[$i]->format('Y-m-d')." 23:59:59"])
							->whereHas('details',function($q){
								return $q->whereHas('product',function($q){
									return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
								})->where('status',ORDER::STATUS_COMPLETED);
							})->sum($chartModel['sum']));	
				}
                array_push($chart['label'] ,(string)$dates[$i]->format('Y-m-d') );

            }
        }
		
		
        return $chart;
		
    }

    public function getDates()
    {
        $period = CarbonPeriod::create($this->from_date, $this->to_date);
        foreach ($period as $date) {
            $date->format('Y-m-d');
        }
        return $period->toArray();
    }

	public function updatedSelectedDate()
	{
		return redirect()->route('admin.dashboard',['selectedDate'=>$this->selectedDate]);
	}
}