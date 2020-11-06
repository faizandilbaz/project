<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
       'nature','description','debit','credit','type','opening_balance','closing_balance',
    ];
}
