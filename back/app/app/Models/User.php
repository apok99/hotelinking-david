<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function coupons(){
        return $this->hasMany('App\Models\Coupon');
    }

    /**
     * 
     *  Funcion que recorre cada cupon y lo traduce.
     * 
     */

    public function getCoupons(){
        if ($this->coupons !=null) {
            return $this->coupons->map(function($coupon){
                return $coupon->createResponseArray();
            });
        }else{
            return null;
        }
    }
}