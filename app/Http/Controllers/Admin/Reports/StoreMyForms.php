<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\AdminForm;
use App\Http\Controllers\FormBuilder\Facades\FormBuilder;

class StoreMyForms extends BaseComponent
{
	public $base_form , $form , $note , $status;

	public function mount($action, $id = null)
    {
		if ($action != 'edit') {
            abort(404);
        }
		$this->setMode(self::MODE_UPDATE);
		$this->base_form = auth()->user()->forms()->findOrFail($id);

		$this->form = $this->base_form->form->forms;
	}

	public function update()
    {
		if ($this->base_form->status == AdminForm::OK) {
			return $this->emitNotify('این فرم قبلا ارسال شده است','warning');
		}
        $this->saveInDatabase($this->base_form);
        $this->emitNotify('فرم با موفقیت ویرایش شد');
    }

	private function saveInDatabase(AdminForm $form )
    {
        $this->resetErrorBag();
        foreach ($this->form as $key => $item) {
            if (FormBuilder::isVisible($this->form, $item) && $item['required'] && strlen($item['value']) == 0) {
                $this->addError('form.' . $key . '.error', __('validation.required', ['attribute' => '']));
            }
        }

        if (sizeof($this->getErrorBag()) > 0) {
            $this->addError('error', 'موارد خواسته شده را تکمیل کنید');
            return;
        }

       	$form->forms = json_encode($this->form);
		$form->status = AdminForm::OK;
		$form->answerd_at = now();
		$form->save();
	}

    public function render()
    {
        return view('admin.reports.store-my-forms')->extends('admin.layouts.admin');
    }

	public function resetInputs()
    {
       
    }
}