<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

public function fournisseurs()
    {

        return $this->belongsTo(Fournisseur::class,'fournisseur_id');

    }

public function materials()
    {
        return $this->belongsTo(Materials::class,'material_id');
    }
}
