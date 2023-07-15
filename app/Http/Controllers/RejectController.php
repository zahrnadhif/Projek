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

    public function tambah(){
        return view('tambah');
    }

    public function insertData(Request $request){
        // dd($request->all());
        Reject::create($request->all());
        return redirect()->route('index')->with('success','Data Berhasil Di Tambahkan');
    }

    public function tampilkanData($id){
        $data = Reject::find($id);
        
        
    }
}
