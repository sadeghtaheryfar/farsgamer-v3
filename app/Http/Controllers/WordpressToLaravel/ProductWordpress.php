<?php

namespace App\Http\Controllers\WordpressToLaravel;

use App\Models\ProductLicense;
use Illuminate\Support\Facades\DB;

class ProductWordpress
{
    public function run()
    {
        foreach (DB::connection('forfa')->table('fortfawc_product_licences')
                     ->cursor() as $item) {

            if (ProductLicense::where('id', $item->licence_id)->exists()) {
                continue;
            }

            DB::table('product_licenses')->insert([
                'id' => $item->licence_id,
                'license' => $item->licence_code,
                'product_id' => $item->product_id,
                'is_used' => $item->licence_status == 'assigned' ? 1 : 0,
                'created_at' => $item->creation_date,
                'updated_at' => $item->creation_date,
            ]);
        }
            dd(1);

//        foreach (Product::all() as $product){
//            $product->update([
//                'id' => $product->old_id,
//            ]);
//        }
//        dd(1);

        foreach (DB::connection('forfa')->table('fortfaposts')
                     ->where('post_type', 'product')
                     ->cursor() as $item) {

            DB::connection('forfa')->table('fortfaposts')
                ->where('ID', $item->ID)
                ->delete();
            DB::connection('forfa')->table('fortfapostmeta')
                ->where('post_id', $item->ID)
                ->delete();

//            DB::table('products')->insert([
//                'id' => $item->ID,
//                'title' => $item->post_title,
//                'short_description' => $item->post_excerpt,
//                'description' => $item->post_content,
//                'currency_id' => null,
//                'amount' => 0,
//                'partner_amount' => 0,
//                'image' => 'test.jpg',
//                'score' => 0,
//                'type' => Product::TYPE_NORMAL_DELIVERY,
//                'status' => Product::STATUS_AVAILABLE,
//                'form' => '[]',
//                'category_id' => null,
//                'discount_type' => Product::DISCOUNT_FIXED,
//                'discount_amount' => 0,
//                'slug' => $item->post_name,
//                'seo_keywords' => 'test,test,test',
//                'seo_description' => 'test',
//                'created_at' => $item->post_date,
//                'updated_at' => $item->post_modified,
//            ]);
        }

        return 'done';
    }
}