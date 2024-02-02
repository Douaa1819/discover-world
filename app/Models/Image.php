<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'recit_id'];

    public function recit()
    {
        return $this->belongsTo(Recit::class);
    }
    public function recits()
    {
        return $this->belongsTo(Recit::class);
    }
}
