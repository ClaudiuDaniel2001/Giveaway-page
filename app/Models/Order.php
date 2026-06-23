<?php

namespace App\Models;
use App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'users_id',
        'orderNumber',
        'orderDate',
        'shippedDate',
        'status',
        'Total'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'users_id');

    }
    public function orderDetails()
{
    return $this->hasMany(
        OrderDetails::class,
        'orders_id'
    );
}

public function tickets()
{
    return $this->hasMany(Ticket::class, 'orders_id');
}
}
