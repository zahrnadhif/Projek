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
        return view('gejala.gejala', compact('datagejala'));
    }

    public function tambahGejala(){
        return view('gejala.tambahGejala');
    }

    public function insertGejala(Request $request){
        // dd($request->all());
        $datagejala = Gejala::create($request->all());
        
        return redirect()->route('gejala.gejala')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilGejala($id){
        $datagejala = Gejala::find($id);
        
        return view('gejala.tampilGejala', compact('data'));
    }

    public function updateGejala(Request $request, $id){
        $datagejala = Gejala::find($id);
        $datagejala->update($request->all());
        
        return redirect()->route('gejala.gejala')->with('success','Data Berhasil Di Update');
    }

    public function deleteGejala($id){
        $datagejala = Gejala::find($id);
        $datagejala->delete();
        
        return redirect()->route('gejala.gejala')->with('success','Data Berhasil Di Hapus');
    }

}
