<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolusiModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_solusi';
    protected $table = 'db_solusi';
    protected $guarded = [];
    public $incrementing = false;
}
