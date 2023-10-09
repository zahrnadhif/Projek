<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbaikanModel extends Model
{
    use HasFactory;
    protected $table = 'db_perbaikan';
    protected $guarded = [];

    public function konsultasi()
    {
        return $this->belongsTo(KonsultasiModel::class, 'kode_konsultasi', 'id');
    }
}
