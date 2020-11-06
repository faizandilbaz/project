<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'amount','qty','sale_type','type'
    ];
    
    public function items(){
        return $this->hasMany(SalesList::class);
    }
}
