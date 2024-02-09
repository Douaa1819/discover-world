<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Recit extends Model
{
    protected $fillable = ['name', 'description', 'conseil', 'id_destination'];

    public function images()
    {
        return $this->hasMany(Image::class, 'id_adventure');
    }
  
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
    }

}

