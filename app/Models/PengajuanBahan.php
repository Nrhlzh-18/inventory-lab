<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBahan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bahan';
    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'userId');
    }
    
    public function bahanPengajuan()
    {
        return $this->hasMany(BahanPengajuan::class, 'pengajuanBahanId');
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahanId');
    }
}
