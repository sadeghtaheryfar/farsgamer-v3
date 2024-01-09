<?php

namespace App\Http\Controllers\WordpressToLaravel;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class OrderWordpress
{
    public $postMeta;
    public $orderItem;
    public $orderItemMeta;
    public $orderNote;
    public $orderNoteMeta;

    public function run()
    {
//        foreach (DB::connection('forfa')->table('fortfaposts')
//                     ->where('post_type', 'shop_order')
//                     ->cursor()->all() as $item) {
//
//            if (Order::where('id', $item->ID)->exists()) {
//                DB::connection('forfa')->table('fortfaposts')
//                    ->where('ID', $item->ID)
//                    ->delete();
//            }
//        }
//        dd(1);

//        foreach (OrderDetail::select('order_id')->get() as $item){
//
//            $this->orderItem = DB::connection('forfa')->table('fortfawoocommerce_order_items')
//                ->where('order_id', $item->order_id)->get();
//
//            DB::connection('forfa')->table('fortfawoocommerce_order_items')
//                ->where('order_id', $item->order_id)->delete();
//            DB::connection('forfa')->table('fortfawoocommerce_order_itemmeta')
//                ->whereIn('order_item_id', $this->orderItem->pluck('order_item_id'))->delete();
//
//        }
//        dd(1);

//        $this->insertOrderNote();
//        dd(1);

        foreach (DB::connection('forfa')->table('fortfaposts')
                     ->where('post_type', 'shop_order')
                     ->whereNotIn('post_status', ['trash', 'wc-pending', 'wc-cancelled'])
                     ->cursor()->all() as $item) {

            if (Order::where('id', $item->ID)->exists()) {
                continue;
            }

            $this->postMeta = DB::connection('forfa')->table('fortfapostmeta')
                ->where('post_id', $item->ID)->get();
            $this->orderItem = DB::connection('forfa')->table('fortfawoocommerce_order_items')
                ->where('order_id', $item->ID)->get();
            $this->orderItemMeta = DB::connection('forfa')->table('fortfawoocommerce_order_itemmeta')
                ->whereIn('order_item_id', $this->orderItem->pluck('order_item_id'))->get();

            if (is_null($this->getUserId()) || $this->getUserId() == '0'
                || !User::where('id', $this->getUserId())->exists()) {
                continue;
            }

            DB::table('orders')->insert([
                'id' => $item->ID,
                'name' => $this->getName(),
                'family' => $this->getFamily(),
                'mobile' => $this->getMobile(),
                'email' => $this->getEmail(),
                'description' => ($item->post_excerpt != '') ? $item->post_excerpt : null,

                'price' => $this->getPrice(),
                'discount' => 0,
                'voucher_id' => $this->getVoucherId(),
                'voucher_data' => $this->getVoucherData(),
                'voucher_amount' => $this->getVoucherAmount(),
                'wallet_pay' => $this->getWalletPay(),
                'total_price' => $this->getTotalPrice(),
                'delivery_time' => $item->post_date,

                'user_id' => $this->getUserId(),
                'user_ip' => $this->getUserIp(),
                'created_at' => $item->post_date,
                'updated_at' => $item->post_modified,
            ]);
        }

        return 'done';
    }

    private function getDetailProductId($order_item_id)
    {
        if (!Product::where('id', $this->orderItemMeta
            ->where('order_item_id', $order_item_id)
            ->where('meta_key', '_product_id')->first()->meta_value)->exists()) {
            return null;
        }

        return $this->orderItemMeta
            ->where('order_item_id', $order_item_id)
            ->where('meta_key', '_product_id')->first()->meta_value;
    }

    private function getDetailProductData($order_item_id)
    {
        $meta['id'] = $this->orderItemMeta
            ->where('order_item_id', $order_item_id)
            ->where('meta_key', '_product_id')->first()->meta_value;

        $meta['title'] = $this->orderItem
            ->where('order_item_id', $order_item_id)->first()->order_item_name;

        return json_encode($meta);
    }

    private function getDetailPrice($order_item_id)
    {
        return $this->orderItemMeta
            ->where('order_item_id', $order_item_id)
            ->where('meta_key', '_line_total')->first()->meta_value;
    }

    private function getDetailQuantity($order_item_id)
    {
        return $this->orderItemMeta
            ->where('order_item_id', $order_item_id)
            ->where('meta_key', '_qty')->first()->meta_value;
    }

    private function getDetailForm($order_item_id)
    {
        $form = $this->orderItemMeta
                ->where('order_item_id', $order_item_id)
                ->where('meta_key', '_tmcartepo_data')->first()->meta_value ?? '[]';

        $newForm = [];
        if ($form != '[]') {
            $form = unserialize($form);

            foreach ($form as $f) {
                $price = 0;
                if (sizeof($f['price_per_currency']) > 0 && $f['price_per_currency']['IRT'] != '') {
                    $price = $f['price_per_currency']['IRT'];
                }

                $newForm[] = [
                    'label' => $f['name'],
                    'value' => $f['value'],
                    'price' => $price,
                ];
            }
        }

        return json_encode($newForm);
    }

    private function getDetailLicence($order_item_id)
    {
        $str = $this->orderItemMeta
                ->where('order_item_id', $order_item_id)
                ->where('meta_key', 'کد(های) لایسنس ')->first()->meta_value ?? '';

        $str = str_replace('<br>', ',', $str);
        $str = strip_tags($str);
        $str = substr($str, 0, -1);
        $str = explode(',', $str);

        $newStr = '';
        foreach ($str as $k => $s) {
            $kk = $k + 1;
            $str[$k] = str_replace("کد#$kk: ", '', $s);
            $newStr .= $str[$k];
        }
        return $newStr;
    }

    public function getName()
    {
        $meta = $this->postMeta->where('meta_key', '_billing_first_name')->first()->meta_value ?? '';

        return ($meta != '') ? $meta : '';
    }

    public function getFamily()
    {
        $meta = $this->postMeta->where('meta_key', '_billing_last_name')->first()->meta_value ?? '';

        return ($meta != '') ? $meta : '';
    }

    public function getMobile()
    {
        $meta = $this->postMeta->where('meta_key', '_billing_phone')->first()->meta_value ?? 0;

        return ($meta != '') ? $meta : 0;
    }

    public function getEmail()
    {
        $meta = $this->postMeta->where('meta_key', '_billing_email')->first()->meta_value ?? '';

        return ($meta != '') ? $meta : '';
    }

    public function getPrice()
    {
        $meta = $this->postMeta->where('meta_key', '_order_total')->first()->meta_value ?? null;

        return $meta + $this->getVoucherAmount() + $this->getWalletPay();
    }

    public function getVoucherId()
    {
        $voucher_id = null;
        if ($this->orderItem->contains('order_item_type', 'coupon')) {
            $voucher_id = Voucher::where('code', $this->orderItem->where('order_item_type', 'coupon')->first()->order_item_name)->first()->id ?? null;
        }

        return $voucher_id;
    }

    public function getVoucherData()
    {
        $voucher_data = null;
        if ($this->orderItem->contains('order_item_type', 'coupon')) {
            $voucher_data = $this->orderItemMeta->where('meta_key', 'coupon_data')->first()->meta_value ?? null;

            if (! is_null($voucher_data)){
                $voucher_data = json_encode(unserialize($voucher_data));
            }
        }

        return $voucher_data;
    }

    public function getVoucherAmount()
    {
        $voucher_amount = 0;
        if ($this->orderItem->contains('order_item_type', 'coupon')) {
            $voucher_amount = $this->orderItemMeta->where('meta_key', 'discount_amount')->first()->meta_value ?? 0;
        }

        return $voucher_amount;
    }

    public function getWalletPay()
    {
        $wallet_pay = 0;
        if ($this->orderItem->contains('order_item_type', 'fee')) {
            $wallet_pay = ($this->orderItemMeta->where('meta_key', '_fee_amount')->first()->meta_value ?? 0) * -1;
        }

        return $wallet_pay;
    }

    public function getTotalPrice()
    {
        return $this->postMeta->where('meta_key', '_order_total')->first()->meta_value ?? null;
    }

    public function getUserId()
    {
        return $this->postMeta->where('meta_key', '_customer_user')->first()->meta_value ?? null;
    }

    public function getUserIp()
    {
        return $this->postMeta->where('meta_key', '_customer_ip_address')->first()->meta_value ?? '';
    }

    private function insertOrderDetails($item)
    {
        foreach ($this->orderItem as $detail) {

            if ($detail->order_item_type != 'line_item') {
                continue;
            }

            if (!Order::where('id', $item->ID)->exists()) {
                continue;
            }

            if (OrderDetail::where('id', $detail->order_item_id)->exists()) {
                continue;
            }

            OrderDetail::insert([
                'id' => $detail->order_item_id,
                'product_id' => $this->getDetailProductId($detail->order_item_id),
                'product_data' => $this->getDetailProductData($detail->order_item_id),
                'price' => $this->getDetailPrice($detail->order_item_id),
                'quantity' => $this->getDetailQuantity($detail->order_item_id),
                'status' => $item->post_status,
                'form' => $this->getDetailForm($detail->order_item_id),
                'licenses' => $this->getDetailLicence($detail->order_item_id),
                'order_id' => $item->ID,
            ]);
        }
    }

    private function insertOrderNote()
    {
        foreach (DB::connection('forfa')->table('fortfacomments')
                     ->where('comment_type', 'order_note')
                     ->cursor() as $note) {

            if (!Order::where('id', $note->comment_post_ID)->exists()) {
                DB::connection('forfa')->table('fortfacomments')
                    ->where('comment_post_ID', $note->comment_post_ID)->delete();
                DB::connection('forfa')->table('fortfacommentmeta')
                    ->where('comment_id', $note->comment_ID)->delete();
                continue;
            }

            if (OrderNote::where('id', $note->comment_ID)->exists()) {
                DB::connection('forfa')->table('fortfacomments')
                    ->where('comment_post_ID', $note->comment_post_ID)->delete();
                DB::connection('forfa')->table('fortfacommentmeta')
                    ->where('comment_id', $note->comment_ID)->delete();
                continue;
            }

            $this->orderNoteMeta = DB::connection('forfa')->table('fortfacommentmeta')
                ->where('comment_id', $note->comment_ID)->get();

            $isUserNote = false;
            if ($this->orderNoteMeta->contains('meta_key', 'is_customer_note')) {
                $isUserNote = true;
            }

            DB::table('order_notes')->insert([
                'id' => $note->comment_ID,
                'note' => $note->comment_content,
                'is_user_note' => $isUserNote,
                'is_read' => 1,
                'order_id' => $note->comment_post_ID,
                'created_at' => $note->comment_date,
                'updated_at' => $note->comment_date,
            ]);

            DB::connection('forfa')->table('fortfacomments')
                ->where('comment_post_ID', $note->comment_post_ID)->delete();
            DB::connection('forfa')->table('fortfacommentmeta')
                ->where('comment_id', $note->comment_ID)->delete();
        }
    }
}