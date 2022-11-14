<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanPengajuan extends Model
{
    use HasFactory;

    protected $table = 'bahan_pengajuan';
    protected $guarded = ['id'];

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

    public function bahanPengajuan()
    {
    	return $this->belongsTo(BahanPengajuan::class, 'bahanPengajuanId');
    }
    
    public function pengajuanBahan()
    {
    	return $this->belongsTo(PengajuanBahan::class, 'pengajuanBahanId');
    }

    public function bahanLayanan()
    {
    	return $this->belongsTo(BahanLayanan::class, 'bahanlayananId');
    }
    
}
