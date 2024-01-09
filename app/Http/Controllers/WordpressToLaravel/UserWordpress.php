<?php

namespace App\Http\Controllers\WordpressToLaravel;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserWordpress
{
    public $meta;

    public function run()
    {
//        $this->insertUserWallet();
//        $this->deleteInsertedUser();

        dd(1);

        foreach (DB::connection('forfa')->table('fortfausers')->cursor()->all() as $item) {

            $this->meta = DB::connection('forfa')->table('fortfausermeta')
                ->where('user_id', $item->ID)
                ->get();

            $mobile = $this->getMobile();
            if (!is_null($mobile) && User::where('mobile', $mobile)->exists()) {
                continue;
            }

            DB::table('users')->insert([
                'id' => $item->ID,
                'name' => $this->getName(),
                'family' => $this->getFamily(),
                'username' => $item->user_login,
                'mobile' => $mobile,
                'email' => ($item->user_email != '') ? $item->user_email : null,
                'password' => Hash::make(Str::random(8)),
                'otp' => Hash::make(rand(10100, 90900)),
                'created_at' => $item->user_registered,
                'updated_at' => $this->getUpdatedAt($item->user_registered)
            ]);
        }

        return 'done';
    }

    private function getName()
    {
        $name = $this->meta->where('meta_key', 'first_name')->first()->meta_value ?? null;

        return ($name != '') ? $name : null;
    }

    private function getFamily()
    {
        $family = $this->meta->where('meta_key', 'last_name')->first()->meta_value ?? null;

        return ($family != '') ? $family : null;
    }

    private function getMobile()
    {
        $mobile = $this->meta->where('meta_key', 'digits_phone')->first()->meta_value ?? null;

        if ($mobile == '') {
            $mobile == null;
        }

        if ($mobile != null) {
            $mobile = str_replace('+98+98', '0', $mobile);
            $mobile = str_replace('+9898', '0', $mobile);
            $mobile = str_replace('+98+0', '0', $mobile);
            $mobile = str_replace('+98+', '0', $mobile);
            $mobile = str_replace('+980', '0', $mobile);

            if (str_starts_with($mobile, '98')) {
                $mobile = str_replace('98', '0', $mobile);
            }

            $mobile = str_replace('+98', '0', $mobile);

            if ($mobile == '0') {
                $mobile == null;
            }
        }

        return $mobile;
    }

    private function getUpdatedAt($createdAt)
    {
        $updatedAt = $this->meta->where('meta_key', 'last_update')->first()->meta_value ?? null;

        if ($updatedAt == null) {
            $updatedAt = $createdAt;
        }

        return Carbon::createFromTimestamp($updatedAt)->toDateTimeString();
    }

    private function deleteInsertedUser()
    {
        foreach (User::all() as $item) {
            DB::connection('forfa')->table('fortfausers')->where('ID', $item->id)->delete();
            DB::connection('forfa')->table('fortfausermeta')->where('user_id', $item->id)->delete();
        }
    }

    private function insertUserWallet()
    {
        foreach (DB::connection('forfa')->table('fortfawoo_wallet_transactions')->cursor()->all() as $item) {
            if (User::where('id', $item->user_id)->exists()) {
                $user = User::find($item->user_id);

                if ($item->type == 'credit') {
                    $user->deposit($item->amount, ['description' => $item->details]);
                } else {
                    $user->forceWithdraw($item->amount, ['description' => $item->details]);
                }

                DB::connection('forfa')->table('fortfawoo_wallet_transactions')
                    ->where('transaction_id', $item->transaction_id)->delete();
            }
        }
    }
}