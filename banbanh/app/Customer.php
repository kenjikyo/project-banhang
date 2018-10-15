<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    protected $fillable = [
        'name',
        'email',
        'gender',
        'address',
        'phone_number',
        'note'
    ];

    public function bill(){
        return $this->hasMany(Bill::class,'id_customer');
    }
}
