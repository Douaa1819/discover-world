<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    public function recits()
    {
        return $this->hasMany(Recit::class, 'id_destination');
    }

    
}
