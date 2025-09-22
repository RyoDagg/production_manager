<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_materials', 'material_id', 'product_id');
    }
    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
