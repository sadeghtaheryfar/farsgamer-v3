<?php

namespace App\Http\Controllers\Admin\Vouchers;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Voucher;
use App\Models\VoucherMeta;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreVoucher extends BaseComponent
{
    use AuthorizesRequests;

    public $code, $description, $type, $amount, $starts_at, $expires_at;
    public $minimum_amount, $maximum_amount, $product_ids, $exclude_product_ids, $exclude_sale_items,
        $category_ids, $exclude_category_ids, $usage_limit, $usage_limit_per_user,$value_limit;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }

        $this->data['type'] = Voucher::getType();
    }

    public function render()
    {
        return view('admin.vouchers.store-voucher')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_vouchers');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_vouchers');

        $this->saveInDatabase(new Voucher());

        $this->emitNotify('کد تخفیف با موفقیت ثبت شد');
        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->authorize('edit_vouchers');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Voucher::find($id);

        $meta = VoucherMeta::where('voucher_id', $this->model->id)->get();

        $this->code = $this->model->code;
        $this->description = $this->model->description;
        $this->type = $this->model->type;
        $this->amount = $this->model->amount;
        $this->starts_at = $this->model->starts_at;
        $this->expires_at = $this->model->expires_at;

        $this->minimum_amount = $meta->where('name', 'minimum_amount')->first()->value ?? '';
        $this->maximum_amount = $meta->where('name', 'maximum_amount')->first()->value ?? '';
        $this->product_ids = $meta->where('name', 'product_ids')->first()->value ?? '';
        $this->exclude_product_ids = $meta->where('name', 'exclude_product_ids')->first()->value ?? '';
        $this->exclude_sale_items = $meta->where('name', 'exclude_sale_items')->first()->value ?? '';
        $this->category_ids = $meta->where('name', 'category_ids')->first()->value ?? '';
        $this->exclude_category_ids = $meta->where('name', 'exclude_category_ids')->first()->value ?? '';
        $this->usage_limit = $meta->where('name', 'usage_limit')->first()->value ?? '';
        $this->usage_limit_per_user = $meta->where('name', 'usage_limit_per_user')->first()->value ?? '';
		$this->value_limit =  $meta->where('name', 'value_limit')->first()->value ?? '';
    }

    public function update()
    {
        $this->authorize('edit_vouchers');

        $this->saveInDatabase($this->model);

        $this->emitNotify('کد تخفیف با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Voucher $voucher)
    {
        $this->validate(
            [
                'code' => ['required', 'string', 'max:250', 'unique:vouchers,code,' . ($this->model->id ?? 0)],
                'description' => ['nullable', 'string', 'max:250'],
                'type' => ['required', 'string', 'max:250'],
                'amount' => ['required', 'integer', 'min:0'],
//                'starts_at' => ['required', 'string', 'max:65500'],
//                'expires_at' => ['required', 'string', 'max:250'],
                'minimum_amount' => ['nullable', 'integer', 'min:0'],
                'maximum_amount' => ['nullable', 'integer', 'min:0'],
                'product_ids' => ['nullable', 'string', 'max:250'],
                'exclude_product_ids' => ['nullable', 'string', 'max:250'],
                'exclude_sale_items' => ['nullable', 'boolean'],
                'category_ids' => ['nullable', 'string', 'max:250'],
                'exclude_category_ids' => ['nullable', 'string', 'max:250'],
                'usage_limit' => ['nullable', 'integer', 'min:0'],
                'usage_limit_per_user' => ['nullable', 'integer', 'min:0'],
				'value_limit' => ['nullable', 'integer', 'min:0'],
            ],
            [],
            [
                'code' => 'کد',
                'description' => 'توضیحات',
                'type' => 'نوع',
                'amount' => 'مقدار',
//                'starts_at' => 'تاریخ شروع',
//                'expires_at' => 'تاریخ انقضاء',
                'minimum_amount' => 'حداقل میزان خرید',
                'maximum_amount' => 'حداکثر میزان خرید',
                'product_ids' => 'محصولات مجاز',
                'exclude_product_ids' => 'محصولات غیرمجاز',
                'exclude_sale_items' => 'محصولات دارای تخفیف',
                'category_ids' => 'دسته بندی های مجاز',
                'exclude_category_ids' => 'دسته بندی های غیرمجاز',
                'usage_limit' => 'حداکثر استفاده',
                'usage_limit_per_user' => 'حداکثر استفاده برای کاربر',
				'value_limit' => 'حداکثر مقدار تخفیف ',
            ]
        );

        $voucher->code = $this->code;
        $voucher->description = $this->description;
        $voucher->type = $this->type;
        $voucher->amount = $this->amount;
//        $voucher->starts_at = $this->starts_at;
       $voucher->expires_at = $this->expires_at;
        $voucher->save();

        $meta = [
            'minimum_amount' => $this->minimum_amount,
            'maximum_amount' => $this->maximum_amount,
            'product_ids' => $this->product_ids,
            'exclude_product_ids' => $this->exclude_product_ids,
            'exclude_sale_items' => $this->exclude_sale_items,
            'category_ids' => $this->category_ids,
            'exclude_category_ids' => $this->exclude_category_ids,
            'usage_limit' => $this->usage_limit,
            'usage_limit_per_user' => $this->usage_limit_per_user,
			'value_limit' => $this->value_limit,
        ];

        foreach ($meta as $key => $item) {
            if (is_null($item) || $item == '') {
                VoucherMeta::where('voucher_id', $voucher->id)
                    ->where('name', $key)
                    ->delete();
            } else {
                VoucherMeta::updateOrCreate(
                    ['voucher_id' => $voucher->id, 'name' => $key],
                    ['value' => $item]
                );
            }
        }
    }

    public function delete($id)
    {
        $this->authorize('delete_vouchers');

        VoucherMeta::where('voucher_id', $id)->delete();
        Voucher::findOrFail($id)->delete();

        $this->emitNotify('کد تخفیف با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['code', 'description', 'type', 'amount', 'starts_at', 'expires_at',
            'minimum_amount', 'maximum_amount', 'product_ids', 'exclude_product_ids',
            'exclude_sale_items', 'category_ids', 'exclude_category_ids', 'usage_limit', 'usage_limit_per_user']);
    }
}