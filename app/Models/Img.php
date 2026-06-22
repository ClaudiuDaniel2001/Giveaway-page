<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $fillable = [
        'produses_id',
        'image'
    ];
    public function produse(){
        return $this->belongsTo(Produse::class, 'produses_id');
    }
}
