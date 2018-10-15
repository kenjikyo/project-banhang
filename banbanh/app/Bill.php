<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    protected $fillable = [
        'id_customer',
        'date_order',
        'total',
        'payment',
        'note'
    ];

    public function customer(){
        return $this->belongsTo('App\Customer','id_customer');
    }
    // public function billdetail(){
    //     return $this->hasMany(BillDetail::class,'id_bill');
    // }
}
