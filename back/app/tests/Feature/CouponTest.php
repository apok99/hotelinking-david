<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Coupon;
class CouponTest extends TestCase
{

    public function login() {
        $response = $this->post('/login',[
            'email' => 'prueba@mail.com',
            'password' => 'Octubre2021'
        ]);

        return $response->getOriginalContent()['token'];
    }

    public function headers() {
        return [
            'Authorization' => 'Bearer '.$this->login()
        ];
    }

    public function testGetCoupons()
    {

        $response = $this->get('/coupons/get', $this->headers());
        $response->assertJson(['error' => false ]);

    }

    public function testGetCouponsWithoutLogin(){
        $response = $this->get('/coupons/get');
        $response->assertJson(['message' => 'Please, login again.']);
    }

    public function testCreateCoupon(){
        $response = $this->get('/coupons/create', $this->headers());
        $response->assertJson(['error' => false]);
    }

    public function testUseCoupon(){
        $coupon = Coupon::orderby('id', 'DESC')->first();
        $response = $this->post('/coupons/use', ['id' => $coupon->id], $this->headers());
        $response->assertJson(['error' => false]);
    }

}
