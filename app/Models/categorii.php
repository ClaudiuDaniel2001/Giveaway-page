<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorii extends Model
{
    protected $fillable = [
        'nameCategory'
    ];

    public function produse(){
        return $this->hasMany(Produse::class, 'categoriis_id');
    }

}
