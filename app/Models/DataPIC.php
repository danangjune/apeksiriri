<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPIC extends Model
{
    use SoftDeletes;
    protected $table = "data_pic";
    protected $fillable = [
        "jenis",
        "nama",
        "kota",
        "contact"
    ];
}
