<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = [
        'orders_id',
        'produses_id',
        'quantityOrdered',
        'gift'
    ];
    public function produs(){
        return $this->belongsTo(Produse::class, 'produses_id');
    }
    public function order(){
        return $this->belongsTo(Order::class , 'orders_id');
    }
}
