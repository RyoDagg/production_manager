<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function materials()
    {
        return $this->belongsToMany(
            Materials::class,
            'product_materials',
            'product_id',
            'material_id'
        )->withPivot('quantity');
    }

    public function product_materials()
    {
        return $this->hasMany(ProductMaterial::class);
    }

    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
