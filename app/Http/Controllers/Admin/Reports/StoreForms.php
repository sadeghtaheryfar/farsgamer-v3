<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Form;
use App\Traits\Admin\FormBuilder;
use Illuminate\Support\Facades\DB;

class StoreForms extends BaseComponent
{
	public $title, $cron, $managers , $form_messages , $users;

    use AuthorizesRequests;
	use FormBuilder;

	public function mount($action, $id = null)
    {
		if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
		$this->data['crons'] = Form::getCron();
	}

	public function create()
    {
        $this->setMode(self::MODE_CREATE);
    }

	public function edit($id)
    {
		$this->setMode(self::MODE_UPDATE);
		$this->model = Form::findOrFail($id);
        $this->cron = $this->model->cron;
		$this->title = $this->model->title;
		$this->managers = $this->model->managers;
        $this->form = $this->model->forms;
		$this->form_messages = $this->model->message;
        $this->users = $this->model->users;
    }

	public function resetInputs()
    {
        $this->reset(['title','cron','managers','form','form_messages','users']);
    }

	public function store()
    {
	
        $this->saveInDatabase(new Form());

        $this->emitNotify('فرم با موفقیت ثبت شد');
        $this->resetInputs();
    }

	public function update()
    {
        $this->saveInDatabase($this->model);
        $this->emitNotify('فرم با موفقیت ویرایش شد');
    }

	private function saveInDatabase(Form $form )
    {
        $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
				'cron' => ['required', 'string', 'in:'.implode(',',array_keys(Form::getCron())) ],
                'form' => ['present', 'array'],
				'managers' => ['nullable','string','max:250'],
				'form_messages' => ['nullable','string','max:250'],
				'users' => ['nullable','string','max:250']
            ],
            [],
            [
                'title' => 'عنوان',
				'cron' => 'بازه زمانی',
                'form' => 'فرم',
				'managers' => 'مدیر فرم ها',
				'form_messages' => 'پیام',
				'users' => 'کاربران'
            ]
        );
       DB::transaction(function () use ($form) {
            $form->title = $this->title;
			$form->cron = $this->cron;
			$form->forms = json_encode($this->form);
			$form->managers = $this->managers;
			$form->message = $this->form_messages;
			$form->users = $this->users;
			$form->save();
        });

		return $form->id;
	}

    public function delete($id)
    {
        Form::findOrFail($id)->delete();
        $this->emitNotify('فرم با موفقیت حذف شد');
		redirect()->route('admin.forms');
    }

    public function render()
    {
        $this->authorize('report');


        return view('admin.reports.store-forms', [])->extends('admin.layouts.admin');
    }
}