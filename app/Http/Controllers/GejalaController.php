<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\GejalaModel;
use App\Models\SolusiModel;
use App\Models\RejectModel;
use App\Models\RejectGejalaModel;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    //
    public function gejala()
    {
        $datagejala = GejalaModel::orderBy('created_at')->get();
        $dataSolusi = SolusiModel::all();
        return view('gejala', compact('datagejala', 'dataSolusi'));
    }

    public function tambahGejala()
    {

        return view('tambahGejala');
    }

    public function insertGejala(Request $request)
    {
        // dd($request->gambar->getClientOriginalExtension());
        //Validasi Gambar
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        // ]);
        // dd($request);
        //Custom nama gambar
        $filename = 'image_' .  $request->id_gejala . '.' . $request->gambar->getClientOriginalExtension();

        // dd($filename);

        // Store the uploaded image in the public/images directory
        $request->gambar->move(public_path('imageGejala'), $filename);

        //  Cek Solusi baru ada atau tidak  
        $cekSolusi = $request->keterangan_solusi_baru;
        // dd($cekSolusi);
        if ($cekSolusi != null) {
            // dd('1');
            // Membuat id solusi baru
            $dataSolusi = SolusiModel::all();
            $lastSolusi = $dataSolusi->last();
            // Remove 'S' and convert to an integer
            $lastId = (int)str_replace('S', '', $lastSolusi->id_solusi);
            $newId = 'S' . ($lastId + 1);

            SolusiModel::create([
                'id_solusi' =>  $newId,
                'keterangan' => $request->keterangan_solusi_baru
            ]);

            // Membuat id Gejala Baru
            $data = GejalaModel::create([
                'id_gejala' => $request->id_gejala,
                'nama' => $request->keterangan,
                'kode_solusi' => $newId,
                'gambar' => $filename
            ]);
        } else {
            // dd('2');
            // Membuat id Gejala Baru
            $data = GejalaModel::create([
                'id_gejala' => $request->id_gejala,
                'nama' => $request->keterangan,
                'kode_solusi' => $request->solusi,
                'gambar' => $filename
            ]);
        }

        // Membuat id Relasi pada tabel Reject_Gejala
        $dataReject = RejectModel::all();
        foreach ($dataReject as $key) {
            RejectGejalaModel::create([
                'kode_reject' => $key->id_reject,
                'kode_gejala' =>  $request->id_gejala
            ]);
        }

        $datagejala = GejalaModel::all();
        $dataSolusi = SolusiModel::all();
        return redirect()->route('gejala', compact('datagejala', 'dataSolusi'))->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilGejala($id)
    {
        $datagejala = Gejala::find($id);

        return view('tampilGejala', compact('datagejala'));
    }

    public function updateGejala(Request $request, $id)
    {
        $datagejala = Gejala::find($id);
        $datagejala->update($request->all());

        return redirect()->route('gejala')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteGejala($id)
    {
        $datagejala = Gejala::find($id);
        $datagejala->delete();

        return redirect()->route('gejala')->with('success', 'Data Berhasil Di Hapus');
    }
}
