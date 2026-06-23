<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'orders_id',
        'produses_id',
        'users_id',
        'ticket_number',
    ];
}
