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
        $data = Reject::all();
        return view('index', compact('data'));
    }

    public function tambahData(){
        return view('tambah');
    }

    public function insertData(Request $request){
        // dd($request->all());
        $data = Reject::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gambarReject/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('index')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkanData($id){
        $data = Reject::find($id);
        
        return view('tampildata', compact('data'));
    }

    public function updateData(Request $request, $id){
        $data = Reject::find($id);
        $data->update($request->all());
        
        return redirect()->route('index')->with('success','Data Berhasil Di Update');
    }

    public function deleteData($id){
        $data = Reject::find($id);
        $data->delete();
        
        return redirect()->route('index')->with('success','Data Berhasil Di Hapus');
    }
}
