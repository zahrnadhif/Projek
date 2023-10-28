<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\GejalaModel;
use App\Models\PenyebabModel;
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
        // $dataSolusi = SolusiModel::all();
        return view('gejala', compact('datagejala'));
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
        $filename = 'image_' .  $request->kode_gejala . '.' . $request->gambar->getClientOriginalExtension();

        // dd($filename);

        // Store the uploaded image in the public/images directory
        $request->gambar->move(public_path('imageGejala'), $filename);

        //  Cek Solusi baru ada atau tidak  
        // $cekSolusi = $request->keterangan_solusi_baru;
        // dd($cekSolusi);
        // if ($cekSolusi != null) {
            // dd('1');
            // Membuat id solusi baru
            // $dataSolusi = SolusiModel::all();
            // $lastSolusi = $dataSolusi->count();
            // Remove 'S' and convert to an integer
            // $lastId = (int)str_replace('S', '', $lastSolusi->id_solusi);
            // $lastSolusi = $dataSolusi->count();
            // $newId = 'S' . ($lastSolusi + 1);

            // SolusiModel::create([
            //     'id_solusi' =>  $newId,
            //     'keterangan' => $request->keterangan_solusi_baru
            // ]);

            // Membuat id Gejala Baru
            $data = GejalaModel::create([
                'kode_gejala' => $request->kode_gejala,
                'nama' => $request->keterangan,
                // 'kode_solusi' => $newId,
                'gambar' => $filename
            ]);
        // } else {
            // dd('2');
            // Membuat id Gejala Baru
            // $data = GejalaModel::create([
            //     'kode_gejala' => $request->kode_gejala,
            //     'nama' => $request->keterangan,
            //     'kode_solusi' => $request->solusi,
            //     'gambar' => $filename
            // ]);
        // }

        // Membuat id Relasi pada tabel Reject_Gejala
        $dataReject = RejectModel::all();
        foreach ($dataReject as $key) {
            RejectGejalaModel::create([
                'kode_reject' => $key->kode_reject,
                'kode_gejala' =>  $request->kode_gejala
            ]);
        }

        $datagejala = GejalaModel::all();
        // $dataSolusi = SolusiModel::all();
        return redirect()->route('gejala', compact('datagejala'))->with('success', 'Data Berhasil Di Tambahkan');
    }


    public function destroyGejala($gejala)
    {
        $data = GejalaModel::where('kode_gejala', $gejala)->first();
        $data->delete();
        // return view('modalEditReject', compact('data'));
    }

    public function tampilGejala($id)
    {
        $datagejala = GejalaModel::find($id);
        // $dataSolusi = SolusiModel::all();

        return view('tampilGejala', compact('datagejala'));
    }

    public function updateGejala(Request $request, $id)
    {
        $datagejala = GejalaModel::where('kode_gejala', $id)->first();

        //Update data dasar 

        $datagejala->update([
            'nama' => $request->keterangan_gejala,
        ]);
        if ($request->gambar_baru != null) {
            //Custom nama gambar
            $filename = 'image_' .  $request->kode_gejala . '.' . $request->gambar_baru->getClientOriginalExtension();

            // dd($filename);

            // Store the uploaded image in the public/images directory
            $request->gambar_baru->move(public_path('imageGejala'), $filename);

            $datagejala->update([
                'gambar' => $filename,
            ]);
        }

        if ($request->solusi_baru != null || $request->keterangan_solusi_baru != null) {
            $cekSolusi = $request->keterangan_solusi_baru;
            // dd($cekSolusi);

            if ($cekSolusi != null) {
                // dd('1');
                // Membuat id solusi baru
                $dataSolusi = SolusiModel::all();
                $lastSolusi = $dataSolusi->count();
                // Remove 'S' and convert to an integer
                // $lastId =  $lastSolusi;
                $newId = 'S' . ($lastSolusi + 1);

                SolusiModel::create([
                    'id_solusi' =>  $newId,
                    'keterangan' => $request->keterangan_solusi_baru
                ]);

                // Membuat id Gejala Baru
                $datagejala->update([
                    'kode_solusi' => $newId,
                ]);
            } else {
                // dd('2');
                // Update Solusi Gejala Baru

                $datagejala->update([
                    'kode_solusi' =>  $request->solusi_baru,
                ]);
            }
        }

        return redirect()->route('gejala')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteGejala($id)
    {
        $datagejala = Gejala::find($id);
        $datagejala->delete();

        return redirect()->route('gejala')->with('success', 'Data Berhasil Di Hapus');
    }

    public function Penyebab()
    {
        $datagejala = GejalaModel::orderBy('created_at')->get();
        $data = PenyebabModel::orderBy('created_at')->get();
        return view('penyebab', compact('data','datagejala'));
    }

    public function tambahPenyebab(Request $request)
    {
        // dd($request);
        PenyebabModel::create([
            'kode_penyebab' => $request->kode_penyebab,
            'penyebab' => $request->penyebab,
            'solusi' => $request->solusi,
            'kode_gejala' => $request->kode_gejala
        ]);
        return redirect()->route('penyebab')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function modalEditPenyebab($penyebab)
    {
        $data = PenyebabModel::where('kode_penyebab', $penyebab)->first();
        $datagejala = GejalaModel::all();
        return view('modalEditPenyebab', compact('data', 'datagejala'));
    }

    public function UpdatePenyebab(Request $request, $penyebab)
    {
        $idReject = PenyebabModel::Where('kode_penyebab', $penyebab)->first();
        $idReject->update([
            'penyebab' => $request->penyebab,
            'solusi' => $request->solusi,
            'kode_gejala' => $request->kode_gejala
        ]);
        $data = PenyebabModel::all(); //Memanggil  data pada tabel Reject

        return redirect()->route('penyebab')->with('success', 'Data Berhasil Di Update');
    }

    public function destroyPenyebab($penyebab)
    {
        $data = PenyebabModel::where('kode_penyebab', $penyebab)->first();
        $data->delete();
        // return view('modalEditReject', compact('data'));
    }


}
