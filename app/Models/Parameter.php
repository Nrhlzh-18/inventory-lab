<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengujian extends Model
{
    use HasFactory;

    protected $table = 'parameter';
    protected $guarded = ['id'];


    public function layananId()
    {
    	return $this->belongsTo(BahanPengajuan::class, 'bahanPengajuanId');
    }

}
