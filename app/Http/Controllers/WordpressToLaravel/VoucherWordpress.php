<?php

namespace App\Http\Controllers\WordpressToLaravel;

use App\Models\Voucher;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VoucherWordpress
{
    public $meta;

    public function run()
    {
//        $this->insertDeletedVoucher();
//        dd(123123);

        foreach (DB::connection('forfa')->table('fortfaposts')
                     ->where('post_type', 'shop_coupon')
                     ->where('post_status', 'publish')
                     ->get() as $item) {

            $this->meta = DB::connection('forfa')->table('fortfapostmeta')
                ->where('post_id', $item->ID)
                ->get();

            if (Voucher::where('code', $item->post_title)->exists()) {
                continue;
            }

            $voucherId = DB::table('vouchers')->insertGetId([
                'id' => $item->ID,
                'code' => $item->post_title,
                'description' => null,
                'type' => $this->getType(),
                'amount' => $this->getAmount(),
                'starts_at' => null,
                'expires_at' => '2019-01-01 00:00:00',
                'deleted_at' => '2019-01-01 00:00:00',
                'created_at' => '2019-01-01 00:00:00',
                'updated_at' => '2019-01-01 00:00:00',
//                'expires_at' => $this->getExpiresAt(),
//                'created_at' => $item->post_date,
//                'updated_at' => $item->post_modified,
            ]);

//            foreach (DB::connection('forfa')->table('fortfapostmeta')
//                         ->where('post_id', $item->ID)
//                         ->whereIn('meta_key', [
//                             'minimum_amount', 'maximum_amount',
//                             'product_ids', 'exclude_product_ids', 'exclude_sale_items',
//                             'category_ids', 'exclude_category_ids',
//                             'usage_limit', 'usage_limit_per_user',
//                         ])
//                         ->get() as $itemMeta) {
//
//                if (!is_null($this->getMetaValue($itemMeta))) {
//                    DB::table('voucher_metas')->insert([
//                        'voucher_id' => $voucherId,
//                        'name' => $itemMeta->meta_key,
//                        'value' => $this->getMetaValue($itemMeta),
//                    ]);
//                }
//            }

//            DB::connection('forfa')->table('fortfaposts')->where('ID', $item->ID)->delete();
//            DB::connection('forfa')->table('fortfapostmeta')->where('post_id', $item->ID)->delete();
        }

        return 'done';
    }

    public function getType()
    {
        $meta = $this->meta->where('meta_key', 'discount_type')->first()->meta_value ?? null;

        return $meta == 'percent' ? Voucher::TYPE_PERCENT : Voucher::TYPE_FIXED;
    }

    public function getAmount()
    {
        return $this->meta->where('meta_key', 'coupon_amount')->first()->meta_value ?? null;
    }

    public function getExpiresAt()
    {
        $meta = $this->meta->where('meta_key', 'date_expires')->first()->meta_value ?? null;

        $result = null;
        if (!is_null($meta)) {
            $result = Carbon::createFromTimestamp($meta)->toDateTimeString();
        }

        return $result;
    }

    private function getMetaValue($item)
    {
        $name = $item->meta_key;
        $value = $item->meta_value;
        $result = null;

        if ($name == 'minimum_amount' && $value != '') {
            $result = $value;
        }

        if ($name == 'product_ids' && $value != '') {
            $result = $value;
        }

        if ($name == 'exclude_product_ids' && $value != '') {
            $result = $value;
        }

        if ($name == 'exclude_sale_items' && $value != 'yes') {
            $result = '1';
        }

        if ($name == 'usage_limit' && $value != '0') {
            $result = $value;
        }

        if ($name == 'usage_limit_per_user' && $value != '0') {
            $result = $value;
        }

        return $result;
    }

    private function insertDeletedVoucher()
    {
        $voucher = Voucher::all()->pluck('code');

        $deletedVoucher = DB::connection('forfa')->table('fortfawoocommerce_order_items')
            ->where('order_item_type', 'coupon')
            ->whereNotIn('order_item_name', $voucher)
            ->get();

        $deletedVoucher = $deletedVoucher->unique('order_item_name');

        foreach ($deletedVoucher as $item) {
            $coupon_data = DB::connection('forfa')->table('fortfawoocommerce_order_itemmeta')
                ->where('meta_key', 'coupon_data')
                ->where('order_item_id', $item->order_item_id)->first();

            $coupon_data = unserialize($coupon_data->meta_value);

            try {
                $voucherId = DB::table('vouchers')->insertGetId([
                    'old_id' => $coupon_data['id'],
                    'code' => $coupon_data['code'],
                    'description' => null,
                    'type' => $coupon_data['discount_type'] == 'percent' ? Voucher::TYPE_PERCENT : Voucher::TYPE_FIXED,
                    'amount' => $coupon_data['amount'],
                    'starts_at' => null,
                    'expires_at' => '2019-01-01 00:00:00',
                    'deleted_at' => '2019-01-01 00:00:00',
                    'created_at' => '2019-01-01 00:00:00',
                    'updated_at' => '2019-01-01 00:00:00',
                ]);

            } catch (\Exception $e) {
                echo $e->getMessage();
                dd($coupon_data);
            }
        }
    }
}