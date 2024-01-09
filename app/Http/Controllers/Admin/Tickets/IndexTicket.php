<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class IndexTicket extends BaseComponent
{
    use WithPagination , AuthorizesRequests;
    public $status , $priority , $subject  , $placeholder = 'شماره یا نام کاربری کاربر';

    protected $queryString = ['status','priority','subject'];

    public function render()
    {
        $this->authorize('show_tickets');

        $tickets = Ticket::latest('id')->with(['user'])->
        where('parent_id',null)->when($this->status, function ($query) {
            return $query->where('status' , $this->status);
        })->when($this->priority, function ($query) {
            return $query->where('priority' , $this->priority);
        })->when($this->subject, function ($query) {
            return $query->where('subject' , $this->subject);
        })->when($this->search,function ($query){
            return $query->whereHas('user',function ($query){
                return is_numeric($this->search) ?
                    $query->where('mobile',$this->search) : $query->where('username',$this->search);
            });
        })->paginate($this->perPage);

        $this->data['status'] = Ticket::getStatus();
        $this->data['priority'] = Ticket::getPriority();
        $this->data['subject'] = Setting::getSingleRow('subject',[]);

        return view('admin.tickets.index-ticket',['tickets' => $tickets])->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_tickets');
        Ticket::findOrFail($id)->delete();
    }
}
