<?php

namespace App\Http\Controllers\WordpressToLaravel;

use Illuminate\Support\Facades\DB;

class CurrencyWordpress
{
    public $meta;

    public function Currency()
    {
        foreach (DB::connection('forfa')->table('fortfaposts')->where('post_type', 'mnswmc')->get() as $item) {

            $this->meta = DB::connection('forfa')->table('fortfapostmeta')->where('meta_key', '_mnswmc_currency_value')->first();

            DB::table('currencies')->insert([
                'old_id' => $item->ID,
                'title' => $item->post_title,
                'amount' => $this->meta->meta_value,
            ]);
        }

        return 'done';
    }
}