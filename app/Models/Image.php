<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'id_adventure'];

    public function recit()
    {
        return $this->belongsTo(Recit::class, 'id_adventure');
    }
}
