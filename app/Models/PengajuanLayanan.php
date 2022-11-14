<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_layanan';
    protected $guarded = ['id'];

    public function layanan()
    {
    	return $this->belongsTo(Layanan::class, 'layananId');
    }

    public function bahanLayanan()
    {
    	return $this->belongsTo(BahanLayanan::class, 'bahanLayananId');
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahanId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function userVerif()
    {
        return $this->belongsTo(User::class, 'userVerifikasi');
    }

    public function pengujian()
    {
        return $this->belongsTo(Pengujian::class, 'pengujianId');
    }
}
