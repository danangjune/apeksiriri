<?php

namespace App\Helpers;

class TanggalHelper
{

    public static function formatTanggalIndonesia($tanggal1, $tanggal2 = null) {
        // Array nama bulan Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $tgl1 = date('d', strtotime($tanggal1));
        $bln1 = date('n', strtotime($tanggal1));
        $thn1 = date('Y', strtotime($tanggal1));

        if ($tanggal2) {
            $tgl2 = date('d', strtotime($tanggal2));
            $bln2 = date('n', strtotime($tanggal2));
            $thn2 = date('Y', strtotime($tanggal2));

            // Jika bulan dan tahun sama
            if ($bln1 == $bln2 && $thn1 == $thn2) {
                return "{$tgl1}-{$tgl2} {$bulanIndo[$bln1]} {$thn1}";
            } else {
                // Jika berbeda
                return "{$tgl1} {$bulanIndo[$bln1]} {$thn1} - {$tgl2} {$bulanIndo[$bln2]} {$thn2}";
            }
        }

        // Jika hanya 1 tanggal
        return "{$tgl1} {$bulanIndo[$bln1]} {$thn1}";
    }

}