<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository {

    public function exists($code) : Coupon | null {
        return Coupon::where('code', $code)->first();
    }

    public function create($user, $code) : Coupon | null {
        $coupon = new Coupon;
        $coupon->code = $code;
        $coupon->user_id = $user->id;
        $coupon->used = 0;
        $coupon->discount = 9.99;
        $coupon->save();
        return $coupon;
    }

    public function findByUser($id, $user){   
        return Coupon::where('id', $id)->where('user_id', $user->id)->first();
    }

} 