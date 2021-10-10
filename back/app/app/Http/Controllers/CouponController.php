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

    //Busca en el usuario que tiene sesion iniciada y saca todos sus cupones.
    public function index(Request $request){
        return response()->json(['coupons' => $this->user->getCoupons(), 'error' => false], 200);
    }
    //LLama al action de crear cupon, se pasa el usuario para validar.
    public function create(CouponAction $couponAction){
        return response()->json(['coupon' => $couponAction->execute($this->user), 'error' => false], 200);
    }
    //LLama al action de usar cupon, se pasa el usuario para validar.
    public function use(\App\Http\Requests\UseCoupon $request, CouponAction $couponAction){
        return response()->json(['coupon' => $couponAction->useCoupon($request->id, $this->user), 'error' => false], 200);
    }

}
