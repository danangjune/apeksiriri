<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RangkaianAcara extends Model
{
    protected $table = "rangkaian_acara";
    protected $fillable = [
        "nama",
        "tanggal",
        "opd"
    ];
}
