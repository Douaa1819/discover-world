<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Recit extends Model
{
    protected $fillable = ['name', 'description', 'conseil', 'id_destination'];

    public function images()
    {
        return $this->hasMany(Image::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
    }
    public function UserDestination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }

}

