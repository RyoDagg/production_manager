<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

public function materials()
    {
        return $this->belongsTo(Materials::class,'material_id');
    }
}
