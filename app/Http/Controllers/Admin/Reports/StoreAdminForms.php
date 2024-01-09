<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\AdminForm;

class StoreAdminForms extends BaseComponent
{
    use AuthorizesRequests;

	public $form , $note , $status;

	public function mount($action, $id = null)
    {
		if ($action != 'edit') {
            abort(404);
        }
		if ( !auth()->user()->hasPermissionTo('report') && !auth()->user()->hasPermissionTo('report_manager') ) {
			abort(403);
		}
		$forms = new AdminForm();

		if (auth()->user()->hasPermissionTo('report_manager')) {
			$forms = $forms->whereHas('form',function($q) {
				return $q->where('managers', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		}
		$this->setMode(self::MODE_UPDATE);
		$this->form = $forms->findOrFail($id);
		$this->data['status'] = AdminForm::getStatus();
		$this->note = $this->form->note;
		$this->status = $this->form->status;
		
	}

	public function update()
    {
        $this->saveInDatabase($this->form);
        $this->emitNotify('فرم با موفقیت ویرایش شد');
    }

	private function saveInDatabase(AdminForm $form )
    {
        $this->validate(
            [
                'status' => ['required', 'string', 'in:'.implode(',',array_keys(AdminForm::getStatus())) ],
				'note' => ['nullable', 'string', 'max:250'],
            ],
            [],
            [
                'status' => 'وضعیت',
				'note' => 'پیام',
            ]
        );

       $form->status = $this->status;
		$form->note = $this->note;
		$form->admin_id = auth()->id();
		$form->save();
	}

    public function render()
    {


        return view('admin.reports.store-admin-forms')->extends('admin.layouts.admin');
    }

	public function resetInputs()
    {
        $this->reset(['note','status']);
    }
}