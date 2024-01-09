<?php

namespace App\Http\Controllers\WordpressToLaravel;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommentWordpress
{
    public $meta;

    public function run()
    {
        foreach (DB::connection('forfa')->table('fortfacomments')
                     ->where('comment_type', 'review')->get() as $item) {
            DB::connection('forfa')->table('fortfacomments')
                ->where('comment_ID', $item->comment_ID)->delete();
            DB::connection('forfa')->table('fortfacommentmeta')
                ->where('comment_id', $item->comment_ID)->delete();
        }
        dd(1);

        foreach (DB::connection('forfa')->table('fortfacomments')
                     ->whereNotIn('comment_approved', ['spam', 'trash'])
                     ->where('comment_type', 'review')->get() as $item) {

            $this->meta = DB::connection('forfa')->table('fortfacommentmeta')
                ->where('comment_id', $item->comment_ID)->get();

            if (!User::where('id', $item->user_id)->exists()) {
                continue;
            }

            if (Comment::where('id', $item->comment_ID)->exists()) {
                continue;
            }

            DB::table('comments')->insert([
                'id' => $item->comment_ID,
                'comment' => $item->comment_content,
                'answer' => $this->getAnswer($item->comment_ID),
                'rating' => $this->getRating(),
                'is_confirmed' => $item->comment_approved,
                'commentable_type' => 'product',
                'commentable_id' => $item->comment_post_ID,
                'order_id' => null,
                'user_id' => $item->user_id,
                'created_at' => $item->comment_date,
                'updated_at' => $item->comment_date,
            ]);
        }

        return 'done';
    }

    private function getRating()
    {
        return $this->meta->where('meta_key', 'rating')->first()->meta_value ?? 1;
    }

    private function getAnswer($id)
    {
        $parent = DB::connection('forfa')->table('fortfacomments')
            ->where('comment_parent', $id)->get();

        return $parent->first()->comment_content ?? null;
    }
}