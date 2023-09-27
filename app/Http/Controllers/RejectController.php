<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use App\Models\RejectModel;
use App\Models\GejalaModel;
use App\Models\KonsultasiGejalaModel;
use App\Models\KonsultasiModel;
use App\Models\RejectGejalaModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RejectController extends Controller
{
    //
    public function dashboard()
    {
        $rejects = RejectModel::latest()->paginate(10);
        return view('dashboard');
    }

    public function home()
    {
        return view('dashboardUser');
    }

    public function index()
    {
        $data = RejectModel::all();
        return view('index', compact('data'));
    }

    public function tambahData()
    {
        return view('tambah');
    }

    public function insertData(Request $request)
    {
        // Membuat ID reject Baru
        RejectModel::create([
            'id_reject' => $request->id_reject,
            'nama' => $request->nama_reject
        ]);

        // Membuat id Relasi pada tabel Reject_Gejala
        $dataGejala = GejalaModel::all();
        foreach ($dataGejala as $key) {
            RejectGejalaModel::create([
                'kode_reject' => $request->id_reject,
                'kode_gejala' => $key->id_gejala,
            ]);
        }

        $data = RejectModel::all(); //Memanggil  data pada tabel Reject

        return redirect()->route('index', compact('data'))->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkanData($id)
    {
        $data = Reject::find($id);

        return view('tampildata', compact('data'));
    }

    public function updateData(Request $request, $id)
    {
        $data = Reject::find($id);
        $data->update($request->all());

        return redirect()->route('index')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteData($id)
    {
        $data = Reject::find($id);
        $data->delete();

        return redirect()->route('index')->with('success', 'Data Berhasil Di Hapus');
    }

    public function konsultasi1($id)
    {
        $dataGejala = GejalaModel::all();
        $gejalaPertama = $dataGejala->first();
        $id = KonsultasiModel::where('id', $id)->first();
        $urutan = 0;
        $bukanGejala = null;
        // $dataReject[] = ['kode' => 'R1', 'keterangan' => 'ya'];
        // $dataReject[] = ['kode' => 'R2', 'keterangan' => 'tidak'];
        // dd($dataReject);
        return view('konsultasi', compact('dataGejala', 'gejalaPertama', 'id', 'urutan', 'bukanGejala'));
    }

    public function submitKonsultasi1(Request $request, $id, $urutan)
    {
        // dd($request);
        $id = KonsultasiModel::where('id', $id)->first();

        if ($request->jawaban == 1) {
            KonsultasiGejalaModel::create([
                'kode_konsultasi' => $id,
                'kode_gejala' => $request->gejala
            ]);
            $dataGejala = GejalaModel::all();
            $getRelasi = RejectGejalaModel::where('kode_Gejala', $request->gejala)->where('keterangan', 1)->get();

            foreach ($getRelasi as $key) {
                $dataReject[] = ['kode' => $key->kode_reject, 'keterangan' => 'belum'];
            }
            $urutan = 1;
            return view('konsultasi', compact('dataGejala', 'gejalaPertama'));
        } elseif ($request->jawaban == 0) {
            if ($request->bukanGejala == null) {
                $bukanGejala[] = $request->gejala;
            } else {
                $bukanGejala = $request->bukanGejala;
                $bukanGejala[] = $request->gejala;
            }
            // dd($bukanGejala);
            $filterGejala = GejalaModel::where('id_gejala', '!=', $request->gejala)->get();
            for ($i = 0; $i < count($bukanGejala); $i++) {
                $filterGejala = $filterGejala->where('id_gejala', '!=',  $bukanGejala[$i]);
            }
            // dd(${'filter' . 0});
            $gejalaPertama =  $filterGejala->first();
            // dd($gejalaPertama);
            $urutan = 0;
            // dd($bukanGejala);
            return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala'));
        }
    }


    public function formKonsultasi()
    {

        return view('formKonsultasi');
    }

    public function detail()
    {
        // $id = 0;
        // $data = Reject::where('id', $id)->first();
        // $nama_reject = $rejection->reject;
        // $penyebab = $rejection->penyebab;
        // $solusi = $rejection->solusi;


        $rejection = "Kulit Jeruk";
        // $gambar = asset('gambarReject/' .$data->gambar);
        // $nama_reject = $rejection->reject;
        // $gambar = $rejection->gambar;

        // $penyebab = $rejection->penyebab;
        // $solusi = $rejection->solusi;

        return view('detail', compact('rejection',));
    }

    public function aturan()
    {
        $dataGejala = GejalaModel::all();
        $dataReject = RejectModel::all();
        $relasi = RejectGejalaModel::all();
        return view('aturan', compact('dataGejala', 'dataReject', 'relasi'));
    }

    public function modalEditRelasi($reject)
    {
        $dataReject = RejectModel::where('id_reject', $reject)->first();
        $dataRelasi = RejectGejalaModel::where('kode_reject', $reject)->get();
        //    dd($dataRelasi);
        return view('modalEditRelasi', compact('dataRelasi', 'dataReject'));
    }

    public function updateRelasi(Request $request, $reject)
    {
        // dd($request);
        $dataReject = RejectModel::where('id_reject', $reject)->first();
        $dataRelasi = RejectGejalaModel::where('kode_reject', $reject)->get();
        $angka = 0;
        foreach ($dataRelasi as $key) {
            $key->update([
                'keterangan' => $request->relasi[$angka]
            ]);
            $angka = $angka + 1;
        }
        //    dd($dataRelasi);
        // $title = 'Relasi';
        $dataGejala = GejalaModel::all();
        $dataReject = RejectModel::all();
        $relasi = RejectGejalaModel::all();
        // dd($relasi->where('kode_reject', 'R1')->where('kode_gejala','G1')->first());
        return view('aturan', compact('dataGejala', 'dataReject', 'relasi'))->with('success', 'Data diUbah');
    }

    public function inserKonsultasi(Request $request)
    {
        // $dataReject = RejectModel::where('id_reject', $reject)->first();
        // $dataRelasi = RejectGejalaModel::where('kode_reject', $reject)->get();
        //    dd($dataRelasi);

        dd($request);
        return view('modalEditRelasi', compact('dataRelasi', 'dataReject'));
    }
}
