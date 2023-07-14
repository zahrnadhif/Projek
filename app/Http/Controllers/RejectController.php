<?php

namespace App\Http\Controllers;
use App\Models\Reject;
use Illuminate\Http\Request;

class RejectController extends Controller
{
    //
    public function dashboard()
    {
        $rejects = Reject::latest()->paginate(10);
        return view('dashboard');
    }

    public function index()
    {
    //    $jenis_reject = "Kulit Jeruk";
    //    $keterangan = " balabaal";
    //    $penyebab ="badsfuiwfew";
    //    $solusi = "ehdiuewfhiew";
    //    $gambar = "hidahcifadcf";
        $data = Reject::all();
        // dd($data);

        return view('index', compact('data'));
    }
}
