<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgressHarian extends Model
{
    use SoftDeletes;
    protected $table = "progress_harian";
    protected $fillable = [
        "keterangan",
        "rangkaian_acara_id",
        "detail_rangkaian_acara_id",
        "progress"
    ];
}
