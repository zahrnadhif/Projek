<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reject';
    protected $table = 'db_reject';
    protected $guarded = [];
    public $incrementing = false;
}
