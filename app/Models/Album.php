<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = "album";
    protected $guarded = [];

    public function foto()
    {
        return $this->hasMany(FotoAlbum::class, 'id_album');
    }
}
