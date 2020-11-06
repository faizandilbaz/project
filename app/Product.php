<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','name','barcode','price','qty','status'
    ];
    // protected $attributes = [
    //     'status' => 'active',
    //  ];
    public function category(){
     return $this->belongsTo(Category::class);
 }
 public function salesList(){
    return $this->hasMany(salesList::class);
}
}
