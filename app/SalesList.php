<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesList extends Model
{
    protected $fillable = [
        'sales_id','product_id','price','qtys','total'
    ];
    public function order(){
        return $this->belongsTo(Sales::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
   
}
