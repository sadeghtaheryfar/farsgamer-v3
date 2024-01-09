<?php

namespace App\Http\Controllers\Partner\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\PartnerSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Setting extends BaseComponent
{
	public $sms;

	public function mount()
    {
        $this->mode = self::MODE_UPDATE;
		
        PartnerSetting::where('user_id',auth()->id())->whereIn('status', $this->getSmsNames())->get()->each(function ($item) {
            $this->sms[$item->status] = $item->text;
        });
    }

	public function update()
    {
        $this->validate(
			[
				'sms.*' => ['nullable','string','max:550']
			]
		);

        $this->saveInDatabase();

        $this->emitNotify('پیامک با موفقیت ویرایش شد');
    }

	private function saveInDatabase()
    {
		
        foreach ($this->getSmsNames() as $item) {
             PartnerSetting::updateOrCreate([
					'user_id' => auth()->id(),
					'status' => $item
				],[
                	'text' => $this->sms[$item] ?? '',
            ]);
        }
    }

	protected function getSmsNames()
    {
        return [
            'user_wc-pending', 'user_wc-on-hold', 'user_wc-processing',
            'user_wc-custom-status', 'user_wc-failed', 'user_wc-post',
            'user_wc-cancelled', 'user_wc-refunded', 'user_wc-completed'
        ];
    }

	protected function resetInputs()
    {
        $this->reset();
    }

    public function render()
    {
        return view('partner.settings.setting')->extends('admin.layouts.admin');
    }
}