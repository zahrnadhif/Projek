<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectGejalaModel extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id';
    protected $table = 'db_reject_gejala';
    protected $guarded = [];
    // public $incrementing = false;

    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'kode_gejala', 'id_gejala');
    }

    public function reject()
    {
        return $this->belongsTo(RejectModel::class, 'kode_reject', 'id_reject');
    }
}
