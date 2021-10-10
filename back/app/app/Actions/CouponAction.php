<?php 
namespace App\Actions;

use \App\Repositories\CouponRepository;

class CouponAction{

    public function __construct(){
        $this->couponRepository = new CouponRepository;
    }

    /**
     * 
     *  Crea el cupon y devuelve el objeto.
     * 
     */
    public function execute(\App\Models\User $user) : Array {
        return ($this->couponRepository->create($user, $this->validateCode()))->createResponseArray();
    }

    /**
     * 
     *  Valida el codigo, es decir, genera uno y comprueba si esta en la base de datos. Si todo es correcto, devuelve un string.
     * 
     */
    public function validateCode(){

        $code = $this->generateCode();

        if ($this->checkCode($code) == null) {
            return $code;
        }else{
            $this->validateCode(); 
        }
    }

    /**
     * 
     *  Comprueba si el codigo existe, devuelve el cupon si existe o null si no.
     * 
     */
    public function checkCode(string $code) : \App\Models\Coupon | null {
        return $this->couponRepository->exists($code);
    }

    /**
     * 
     * Genera un codigo random.
     * 
     */
    public function generateCode(){
        return 'HLW' . mt_rand(1,9999); 
    }


    /**
     * 
     * Funcion que usa el cupon, primero comprueba que el cupon sea nuestro y si ya esta usado.
     * 
     */

    public function useCoupon($id, $user) : Array{
        
        $coupon = $this->isMyCoupon($id, $user);

        if (!$coupon) {
            return ['error' => true, 'message' => 'Coupon does not exist.'];
        }

        if ($coupon->isUsed()) {
            return ['error' => true, 'message' => 'Coupon is not avalible.'];
        }

        $coupon->use();

        return ['error' => false, 'message' => 'Coupon has been applied.'];

    }

    public function isMyCoupon($id, $user){
        return $this->couponRepository->findByUser($id, $user);
    }

}