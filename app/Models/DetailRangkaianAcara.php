<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailRangkaianAcara extends Model
{
    use SoftDeletes;
    protected $table = "detail_rangkaian_acara";
    protected $fillable = [
        "rangkaian_acara_id",
        "mulai",
        "selesai",
        "kegiatan",
        "tanggal",
        "lokasi",
        "uraian",
        "perlengkapan",
        "catatan"
    ];

    public function progress()
    {
        return $this->hasOne(ProgressHarian::class, 'detail_rangkaian_acara_id', 'id')
                    ->latest('created_at'); 
    }

    public function rangkaianAcara()
    {
        return $this->hasOne(RangkaianAcara::class, 'id', 'rangkaian_acara_id'); 
    }
}
