<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyebabModel extends Model
{
    use HasFactory;
    protected $table = 'db_penyebab';
    protected $guarded = [];
    protected $primaryKey = 'kode_penyebab';
    public $incrementing = false;

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'kode_gejala', 'kode_gejala');
    }

}
