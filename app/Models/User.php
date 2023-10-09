<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'nrp';

    public function isEngineering()
    {
        return $this->jabatan === 'ENGINEERING';
    }

    public function isForeman()
    {
        return $this->jabatan === 'FOREMAN';
    }
}
