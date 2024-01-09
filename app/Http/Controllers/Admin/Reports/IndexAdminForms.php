<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\AdminForm;
use Spatie\Permission\Models\Role;

class IndexAdminForms extends BaseComponent
{
    use AuthorizesRequests;

	public $status , $role ;
	protected $queryString = ['status','role'];

	public function mount()
    {
        $this->data['role'] = Role::whereNotIn('name', ['administrator', 'super_admin'])->get()->pluck('name', 'id');
		$this->data['status'] = AdminForm::getStatus();
    }

    public function render()
    {
		if ( !auth()->user()->hasPermissionTo('report') && !auth()->user()->hasPermissionTo('report_manager') ) {
			abort(403);
		}
		$forms = AdminForm::latest('id');

		if (auth()->user()->hasPermissionTo('report_manager')) {
			$forms = $forms->whereHas('form',function($q) {
				return $q->where('managers', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		}

		$forms = $forms->when($this->search,function($q) {
			return $q->whereHas('user',function($q){
				return $q->where('mobile',$this->search);
			});
		})->when($this->role, function ($query){
            return $query->whereHas('user',function($query){
				return $query->role($this->role);
			});
        })->when($this->status,function($q){
			return $q->where('status',$this->status);
		})->paginate($this->perPage);
        return view('admin.reports.index-admin-forms', ['forms'=>$forms])->extends('admin.layouts.admin');
    }
	public function delete($id)
    {
        

        AdminForm::findOrFail($id)->delete();

        $this->emitNotify('فرم با موفقیت حذف شد');
    }
}