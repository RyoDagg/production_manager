<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function units()
    {
        return $this->hasOne(Unit::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
