<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_gejala';
    protected $table = 'db_gejala';
    protected $guarded = [];
    public $incrementing = false;

    public function solusi()
    {
        return $this->belongsTo(SolusiModel::class, 'kode_solusi', 'id_solusi');
    }
}

