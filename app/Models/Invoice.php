<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    public function clients(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function fournisseurs(){
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
    
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
