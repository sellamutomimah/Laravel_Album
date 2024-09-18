<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_foto',
        'deskripsi_foto',
        'foto',
        'album_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
