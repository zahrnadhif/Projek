<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    //
    public function gejala()
    {
        $datagejala = Gejala::all();
        return view('gejala', compact('datagejala'));
    }

    public function tambahGejala(){

        return view('tambahGejala');
    }

    public function insertGejala(Request $request){
        // dd($request->all());
        // $gejala = Gejala::create($request->all());
        $datagejala = Gejala::create($request->all());

        
        return redirect()->route('gejala')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilGejala($id){
        $datagejala = Gejala::find($id);
        
        return view('tampilGejala', compact('datagejala'));
    }

    public function updateGejala(Request $request, $id){
        $datagejala = Gejala::find($id);
        $datagejala->update($request->all());
        
        return redirect()->route('gejala')->with('success','Data Berhasil Di Update');
    }

    public function deleteGejala($id){
        $datagejala = Gejala::find($id);
        $datagejala->delete();
        
        return redirect()->route('gejala')->with('success','Data Berhasil Di Hapus');
    }

}
