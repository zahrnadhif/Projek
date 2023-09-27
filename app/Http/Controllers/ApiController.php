<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function dtkyrw($nrp)
    {
        $user = User::where('nrp', '=', $nrp)->get()->all();
        if ($user != null) {
            $exuser = $user;
        } else {
            $exuser = ["NULLAH"];
        }
        return $exuser;
    }
}
