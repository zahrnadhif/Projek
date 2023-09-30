<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'db_konsultasi';
    protected $guarded = [];
    public function users()
    {
        return $this->belongsTo(user::class, 'nrp', 'nrp');
    }
}
