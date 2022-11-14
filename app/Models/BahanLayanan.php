<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanLayanan extends Model
{
    use HasFactory;

    protected $table = 'bahan_layanan';
    protected $guarded = ['id'];

    public function bahan()
    {
    	return $this->belongsTo(Bahan::class, 'bahanId');
    }
}
