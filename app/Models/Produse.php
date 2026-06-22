<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produse extends Model
{
    protected $fillable = [
        'categoriis_id',
        'title',
        'description',
        'price',
        'discount',
        'tickets',
        'tickets_sold'
    ];
    public function category(){
        return $this->belongsTo(categorii::class, 'categoriis_id');
    }
    public function images(){
        return $this->hasMany(Img::class , 'produses_id');
    }
    public function orders(){
        return $this->hasMany(OrderDatails::class, 'produses_id');
    }
}
