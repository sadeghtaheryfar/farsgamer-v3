<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Models\Score;
use App\Models\Setting;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Carbon\Carbon;

class Sidebar extends Component
{
    public $score = 0 , $lottery = 0 , $start_lottery;

    public function render()
    {
		$this->lottery = 0;
		$lottery_date = Setting::getSingleRow('start_lottery');
		$this->start_lottery = Setting::getSingleRow('lottery');
		$end = Carbon::now()->format('Y-m-d H:i:s');
		if ($this->start_lottery){
			$orders = auth()->user()->orders()->whereBetween('created_at', [$lottery_date.' 00:00:00', $end])->whereHas('details',function($query){
				return $query->where(function($query){
					return $query->where('status',Order::STATUS_COMPLETED);
				});
			})->get();
			foreach ($orders as $order){
				foreach ($order->details as $item){
					if(!is_null($item->product))
						$this->lottery = $this->lottery + $item->product->lottery*$item->quantity;
				}
			}
		}

        $deposit = Score::where('user_id', auth()->id())
            ->where('type', Score::TYPE_DEPOSIT)->sum('amount');
        $withdraw = Score::where('user_id', auth()->id())
            ->where('type', Score::TYPE_WITHDRAW)->sum('amount');

        $this->score = $deposit - $withdraw;

        return view('site.components.dashboard.sidebar')
            ->extends('site.layouts.dashboard');
    }

    public function changeScore()
    {
        $rateKey = 'change-score-attempt:' . auth()->id();
        if (RateLimiter::tooManyAttempts($rateKey, 1)) {
            return $this->addError('errorScore', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
        }
        RateLimiter::hit($rateKey, 6 * 60 * 60);

        $deposit = Score::where('user_id', auth()->id())
            ->where('type', Score::TYPE_DEPOSIT)->sum('amount');
        $withdraw = Score::where('user_id', auth()->id())
            ->where('type', Score::TYPE_WITHDRAW)->sum('amount');

        $this->score = $deposit - $withdraw;

        if ($this->score <= 0) {
            $this->addError('errorScore', 'امتیاز کافی نیست');
            return;
        }

        DB::transaction(function () {
            $scoreToWallet = Setting::getSingleRow('score_to_wallet');
            auth()->user()->deposit($this->score * $scoreToWallet,
                ['description' => str_replace('score', $this->score,'تبدیل score امتیاز به پول')]);
            Score::create([
                'amount'=> $this->score,
                'type'=> Score::TYPE_WITHDRAW,
                'description'=>'تبدیل امتیاز به پول',
                'user_id'=> auth()->id(),
            ]);
        });

        $this->addError('successScore', 'امتیاز به کیف پول شما اضاافه شد');
        $this->emitUp('updateData');
    }
}
