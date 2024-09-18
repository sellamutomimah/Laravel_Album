<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_album',
        'deskripsi_album',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
