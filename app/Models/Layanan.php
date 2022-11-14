<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    protected $guarded = ['id'];

    public function bahan()
    {
    	return $this->belongsTo(Bahan::class, 'bahanId');
    }

    public function bahanLayanan()
    {
    	return $this->hasMany(BahanLayanan::class, 'layananId');
    }

    public function pengujian()
    {
        return $this->belongsTo(Pengujian::class, 'pengujianId');
    }


}
