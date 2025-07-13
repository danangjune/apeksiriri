<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveReport extends Model
{
    use SoftDeletes;
    protected $table = "live_report";
    protected $fillable = [
        'link'
    ];
}
