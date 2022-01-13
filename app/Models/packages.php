<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo('App\Models\User'); //Birebir ilişki Her Company'nin bir adet paket tanımlaması vardır.
    }
}
