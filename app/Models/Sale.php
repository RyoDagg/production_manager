<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

public function clients()
    {

        return $this->belongsTo(Client::class,'client_id');

        return $this->belongsTo(Client::class);

    }
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
