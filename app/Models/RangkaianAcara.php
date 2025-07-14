<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RangkaianAcara extends Model
{
    use SoftDeletes;
    protected $table = "rangkaian_acara";
    protected $fillable = [
        "nama",
        "tanggal",
        "opd",
        "sampai"
    ];

    public function detail()
    {
        return $this->hasMany(DetailRangkaianAcara::class, 'rangkaian_acara_id', 'id'); 
    }
}
