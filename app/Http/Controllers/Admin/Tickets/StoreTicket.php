<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class StoreTicket extends BaseComponent
{
    use AuthorizesRequests ;
    public $ticket , $header;
    public $subject , $user_phone , $content , $file , $priority , $status , $child = [] , $user_name , $answer , $answerFile;
    public function mount($action , $id = null)
    {
        $this->authorize('show_tickets');

		if ($action == 'create') {	
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
        $this->data['priority'] = Ticket::getPriority();
        $this->data['status'] = Ticket::getStatus();
        $this->data['subject'] = Setting::getSingleRow('subject',[]);

    }

	public function create()
    {
		
        $this->authorize('edit_tickets');

        $this->setMode(self::MODE_CREATE);
    }


    public function store()
    {
		 $this->authorize('edit_tickets');
        $this->saveInDatabase(new Ticket());

        $this->emitNotify('تیکت با موفقیت ثبت شد');
        $this->resetInputs();
    }


	public function edit($id)
    {
        $this->authorize('edit_tickets');

        $this->setMode(self::MODE_UPDATE);
 		$this->ticket = Ticket::findOrFail($id);
        $this->subject = $this->ticket->subject;
        $this->user_phone = $this->ticket->user->mobile;
        $this->user_name = $this->ticket->user->username;
        $this->content = $this->ticket->content;
        $this->file = $this->ticket->file;
        $this->priority = $this->ticket->priority;
        $this->status = $this->ticket->status;
        $this->child = $this->ticket->child;
    }

    public function update()
    {
        $this->authorize('edit_tickets');

        $this->saveInDatabase($this->ticket);

        $this->emitNotify('تیکت با موفقیت ویرایش شد');
    }

    public function saveInDataBase(Ticket $model)
    {
        $this->validate(
            [
                'subject' => ['required','string','max:250'],
                'content' => ['required','string','max:95000'],
                'file' => ['nullable','string','max:800'],
                'priority' => ['required','in:'.implode(',',array_keys(Ticket::getPriority()))],
                'status' => ['required', 'in:'.implode(',',array_keys(Ticket::getStatus()))],
				'user_phone' => ['required','exists:users,mobile']
            ] , [] , [
                'subject' => 'موضوع',
                'content' => 'متن',
                'file' => 'فایل',
                'priority' => 'الویت',
                'status' => 'وضعیت',
				'user_phone' => 'شماره کاربر',
            ]
        );
        $model->subject = $this->subject;
        $model->user_id = User::where('mobile',$this->user_phone)->first()->id;
        $model->content = $this->content;
        $model->file = $this->file;
        $model->parent_id = null;
        $model->sender_id  = \auth()->id();
        $model->sender_type  = Ticket::ADMIN;
        $model->priority = $this->priority;
        $model->status = $this->status;
        $model->save();
        $this->emitNotify('اطلاعات با موفقیت ثبت شد');
    }

    public function deleteItem()
    {
        $this->ticket->delete();
        return redirect()->route('admin.ticket');
    }


    public function newAnswer()
    {
        $this->authorize('edit_tickets');
        $this->validate(
            [
                'answer' => ['required', 'string'],
                'answerFile' => ['nullable' , 'max:250','string']
            ] , [] , [
                'answer' => 'پاسخ',
                'answerFile' => 'فایل'
            ]
        );
        $new = new Ticket();
        $new->subject = $this->subject;
        $new->user_id  = User::where('mobile',$this->user_phone)->first()->id;
        $new->parent_id = $this->ticket->id;
        $new->content = $this->answer;
        $new->file = $this->answerFile;
        $new->sender_id = Auth::id();
        $new->sender_type = Ticket::ADMIN;
        $new->priority = $this->priority;
        $new->status = Ticket::ANSWERED;
        $this->ticket->status = Ticket::ANSWERED;
        $this->ticket->save() ;
        $new->save();
        $this->child->push($new);
        $this->emitNotify('اطلاعات با موفقیت ثبت شد');
    }


    public function delete($key)
    {
        $this->authorize('delete_tickets');
        $ticket = $this->child[$key];
        $ticket->delete();
        unset($this->child[$key]);
    }



    public function render()
    {
        return view('admin.tickets.store-ticket')->extends('admin.layouts.admin');
    }

	public function resetInputs()
    {
        $this->reset(['subject','user_phone','content','file','priority','status']);
    }
}
