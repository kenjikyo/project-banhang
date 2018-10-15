<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'name',
        'id_type',
        'description',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'new'
    ];

    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type');
    }

    public function bill_detail(){
        return $this->hasMany('App/BillDetail','id_product','id');
    }
}
