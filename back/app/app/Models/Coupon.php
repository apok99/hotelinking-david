<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DateHelper;

class Coupon extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }   

    public function isUsed(){
        if ($this->used) {
            return true;
        }else{
            return false;
        }
    }

    public function getDiscount(){
        if (!$this->discount) {
            return number_format($this->discount, 2);
        }else{
            return null;
        }
    }

    public function use(){
        $this->used = true;
        $this->save();
    }

    /**
     * 
     *  Crea un array con el mismo formato para el frontend.
     * 
     */
    public function createResponseArray(){
        return [
            'id' => $this->id,
            'code' => $this->code,
            'isUsed' => $this->isUsed(),
            'discount' => $this->getDiscount(),
            'created_at' => DateHelper::format($this->created_at, 'd-m-Y H:i')  
        ];
    }

}
