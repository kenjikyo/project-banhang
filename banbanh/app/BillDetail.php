<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public function product(){
        return $this->belongsTo(Product::class,'id_product');
    }

    public function bill(){
        return $this->belongsTo(Bill::class,'id_bill');
    }
}
