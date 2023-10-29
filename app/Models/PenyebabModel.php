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

    public function reject()
    {
        return $this->belongsTo(RejectModel::class, 'kode_reject', 'kode_reject');
    }

}
