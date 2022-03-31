<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

public function partners()
    {
        return $this->belongsTo(Partner::class);
    }

public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
