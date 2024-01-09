<?php

namespace App\Http\Controllers\Admin\Logs;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Activitylog\Models\Activity;
use App\Models\Copy;
use App\Models\Category;
use App\Models\PasswordRequest;
use App\Models\PaymentTransaction;

class IndexLog extends BaseComponent
{
    use AuthorizesRequests;

    public $filterId, $filterUserId, $filterSubjectType, $filterSubjectId, $filterDescription , $tab ,$mainCategories, $category , $filterUserMobile;
	protected $queryString = ['tab','category'];

	public function mount()
	{
		$this->mainCategories = Category::with('subCategories')->whereNull('parent_id')->get();
	}

    public function render()
    {
        $this->authorize('show_logs');
		$copies = [];
		$logs = [];
		$requests = [];
		$wallets = [];

		// $test =  Activity::latest()->where('subject_type','setting')->where('properties', 'LIKE', '%depot_password%')->get()->toArray();
		// dd($test);

        if ($this->tab == 'logs' || !isset($this->tab)) {
			$logs = Activity::latest()
            ->when($this->filterId, function ($query){
                return $query->where('id', $this->filterId);
            })
            ->when($this->filterUserId, function ($query){
                return $query->where('causer_type', 'user')
                    ->where('causer_id', $this->filterUserId);
            })
            ->when($this->filterSubjectType, function ($query){
                return $query->where('subject_type', $this->filterSubjectType);
            })
            ->when($this->filterSubjectId, function ($query){
                return $query->where('subject_id', $this->filterSubjectId);
            })
            ->when($this->filterDescription, function ($query){
                return $query->where('description', $this->filterDescription);
            })
            ->paginate($this->perPage);
		}
		elseif ($this->tab == 'copies') {
			$copies = Copy::latest('id')->with(['user','product'])->when($this->search,function($query){
				return $query->whereHas('product',function($query){
					return $query->where('title','like','%'.$this->search.'%');
				});
			})->when($this->category,function($query){
				return $query->whereHas('product',function($query){
					return $query->where('category_id',$this->category);
				});
			})->paginate($this->perPage);
		}
		elseif ($this->tab == 'hash') {
			$requests = PasswordRequest::latest('id')->with(['user','order'])->paginate($this->perPage);
		} 
		elseif ($this->tab == 'wallet') {
			$wallets = PaymentTransaction::latest('id')->where('model_type','transaction')->where('status_code','100')
			->when($this->filterUserMobile,function($q){
				return $q->whereHas('user',function($q){
					return $q->where('mobile',$this->filterUserMobile);
				});
			})->paginate($this->perPage);
		}

        return view('admin.logs.index-log', ['logs' => $logs,'copies'=>$copies,'requests'=>$requests,'wallets' => $wallets])
            ->extends('admin.layouts.admin');
    }
}