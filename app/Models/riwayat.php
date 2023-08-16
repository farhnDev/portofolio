<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable =
    [
        'judul',
        'tipe',
        'tgl_mulai',
        'tgl_akhir',
        'info1',
        'info2',
        'info3',
        'isi'
    ];

    //kolom bantuan 
    protected $appends = ['tgl_mulai_indo', 'tgl_akhir_indo'];
    //ini itu untuk mengubah format yang tadinya angka, jadi format indo,
    //supaya menjadi tulisan dalam tanggal dengan acesor

    //acesor
    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])
            ->translatedFormat('d F Y');  // ini itu perubahan data format
    }

    public function getTglAkhirIndoAttribute()
    {
        if ($this->attributes['tgl_akhir']) {
            return Carbon::parse($this->attributes['tgl_akhir'])
                ->translatedFormat('d F Y');
        } else {
            return "Sekarang";
        };
    }
}
