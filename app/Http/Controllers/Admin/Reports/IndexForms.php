<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Form;

class IndexForms extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('report');

		$forms = Form::all();
		
        return view('admin.reports.index-forms', ['forms'=>$forms])->extends('admin.layouts.admin');
    }

	public function delete($id)
	{
		Form::destroy($id);
		$this->emitNotify('فرم با موفقیت حذف شد');
	}
}