<?php

namespace App\Http\Controllers\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class BaseComponent extends Component
{
    use WithPagination;

    const MODE_NONE = 'none';
    const MODE_SHOW = 'show';
    const MODE_CREATE = 'create';
    const MODE_UPDATE = 'update';

    public $mode = self::MODE_NONE;

    public $search = '';
    public $perPage = 10;

    public $data;
    public $model;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        $this->resetErrorBag();
        $this->resetInputs();
    }

    public function emptyToNull($value)
    {
        return $value == '' ? null : $value;
    }

    public function emitNotify($title, $icon = 'success')
    {
        $data['title'] = $title;
        $data['icon'] = $icon;

        $this->emit('notify', $data);
    }

    public function emitShowModal($id)
    {
        $this->emit('showModal', $id);
    }

    public function emitHideModal($id)
    {
        $this->emit('hideModal', $id);
    }
}