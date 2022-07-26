<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $timestamaps=false ;
    
    protected $fillable = [
        "fullName",
        "numTel",
        "address",
        "birthday",
        "user_email",
        "user_id"
    ];
}
