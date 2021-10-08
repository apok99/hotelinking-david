<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Actions\CouponAction;

class CouponController extends Controller
{

    public function __construct(){
        $this->user = auth()->user();
    } 

    public function index(Request $request){
        return response()->json(['coupons' => $this->user->getCoupons()], 200);
    }

    public function create(CouponAction $couponAction){
        return response()->json(['coupon' => $couponAction->execute($this->user)]);
    }

    public function use(\App\Http\Requests\UseCoupon $request, CouponAction $couponAction ){
        return response()->json($couponAction->useCoupon($request->id, $this->user));
    }

}
