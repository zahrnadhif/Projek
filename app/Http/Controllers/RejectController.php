<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use App\Models\RejectModel;
use App\Models\GejalaModel;
use App\Models\KonsultasiGejalaModel;
use App\Models\KonsultasiModel;
use App\Models\PerbaikanModel;
use App\Models\RejectGejalaModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Konsultasi;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RejectController extends Controller
{
    //
    // ============================= // MENENTUKAN SHIFT // ================================= //
    function Shift()
    {
        $time = date('H:i:s');
        // $time = '00:00:00';
        if ($time >= '00:00:00' && $time < '07:10:00') {
            $shift = "SHIFT-1";
        } else if ($time >= '07:10:00' && $time < '16:00:00') {
            $shift = "SHIFT-2";
        } else if ($time >= '16:00:00' && $time <= '23:59:59') {
            $shift = "SHIFT-3";
        } else {
            $shift = "SHIFT TIDAK TERDEFINISI";
        }
        return $shift;
    }

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

    public function modalEditReject($reject)
    {
        $data = RejectModel::where('kode_reject', $reject)->first();
        return view('modalEditReject', compact('data'));
    }

    public function UpdateReject(Request $request, $reject)
    {
        $idReject = RejectModel::Where('kode_reject', $reject)->first();
        $idReject->update([
            'nama' => $request->nama_reject
        ]);
        $data = RejectModel::all(); //Memanggil  data pada tabel Reject

        return redirect()->route('index', compact('data'))->with('success', 'Data Berhasil Di Update');
    }

    public function destroyReject($reject)
    {
        $data = RejectModel::where('kode_reject', $reject)->first();
        $data->delete();
        // return view('modalEditReject', compact('data'));
    }

    public function tambahData()
    {
        return view('tambah');
    }

    public function insertData(Request $request)
    {
        // Membuat kode  reject Baru
        RejectModel::create([
            'kode_reject' => $request->kode_reject,
            'nama' => $request->nama_reject
        ]);

        // Membuat id Relasi pada tabel Reject_Gejala
        $dataGejala = GejalaModel::all();
        foreach ($dataGejala as $key) {
            RejectGejalaModel::create([
                'kode_reject' => $request->kode_reject,
                'kode_gejala' => $key->kode_gejala,
            ]);
        }

        $data = RejectModel::all(); //Memanggil  data pada tabel Reject

        return redirect()->route('index', compact('data'))->with('success', 'Data Berhasil Di Tambahkan');
    }

    // public function tampilkanData($id)
    // {
    //     $data = Reject::find($id);

    //     return view('tampildata', compact('data'));
    // }

    // public function updateData(Request $request, $id)
    // {
    //     $data = Reject::find($id);
    //     $data->update($request->all());

    //     return redirect()->route('index')->with('success', 'Data Berhasil Di Update');
    // }

    // public function deleteData($id)
    // {
    //     $data = Reject::find($id);
    //     $data->delete();

    //     return redirect()->route('index')->with('success', 'Data Berhasil Di Hapus');
    // }

    public function buatKonsultasi(Request $request)
    {
        $shift = $this->Shift();
        KonsultasiModel::create([
            'nrp' => $request->nrp,
            'shift' => $shift
        ]);
        $id = KonsultasiModel::all();
        $id = $id->last();
        $dataGejala = GejalaModel::all();
        $gejalaPertama = $dataGejala->first();
        // $id = KonsultasiModel::where('id', $id)->first();
        $urutan = 0;
        $bukanGejala = null;
        return redirect()->route('konsultasi1',  compact('dataGejala', 'gejalaPertama', 'id', 'urutan', 'bukanGejala'));
    }

    public function konsultasi1($id)
    {
        $dataGejala = GejalaModel::all();
        $gejalaPertama = $dataGejala->first();
        $id = KonsultasiModel::where('id', $id)->first();
        $urutan = 0;
        $benarGejala = null;
        $bukanGejala = null;
        $bukanReject = null;
        // $dataReject[] = ['kode' => 'R1', 'keterangan' => 'ya'];
        // $dataReject[] = ['kode' => 'R2', 'keterangan' => 'tidak'];
        // dd($dataReject);
        return view('konsultasi', compact('dataGejala', 'gejalaPertama', 'id', 'urutan', 'bukanGejala', 'benarGejala', 'bukanReject'));
    }

    public function submitKonsultasi1(Request $request, $id, $urutan)
    {
        // dd($request);
        $id = KonsultasiModel::where('id', $id)->first();

        if ($request->jawaban == 1) { //Jika Jawabannya Ya
            if ($urutan == 1) {
                $bukanReject = $request->bukanReject;
                $bukanGejala = $request->bukanGejala;
                $urutan = 1;

                KonsultasiGejalaModel::create([
                    'kode_konsultasi' => $id->id,
                    'kode_gejala' => $request->gejala
                ]);

                $dataGejala = GejalaModel::all();
                $getRelasi = RejectGejalaModel::where('kode_gejala', $request->gejala)->where('keterangan', 1)->get();
                $getRelasi1 = $getRelasi->first();
                $getReject = $getRelasi1->kode_reject;
                // dd($getReject);
                if ($request->benarGejala == null) {
                    $benarGejala[] = $request->gejala;
                } else {
                    $benarGejala = $request->benarGejala;
                    $benarGejala[] = $request->gejala;
                }

                $filterGejala = RejectGejalaModel::where('kode_gejala', '!=', $request->gejala)->where('kode_reject', $getReject)->where('keterangan', 1)->get();
                for ($i = 0; $i < count($benarGejala); $i++) {
                    $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                }
                // dd($bukanGejala);
                if ($bukanGejala != null) {
                    for ($i = 0; $i < count($bukanGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=', $bukanGejala[$i]);
                    }
                }
                $filterGejala2 = $filterGejala
                    ->where('kode_gejala', '!=', $request->gejala)
                    // ->where('kode_gejala', '!=', $bukanGejala[0])
                    ->where('kode_reject', $getReject)
                    ->where('keterangan', 1);
                $filterGejala2Object = collect($filterGejala2);
                // dd($filterGejala2Object);
                $getGejala = $filterGejala2Object->first();

                if ($getGejala == null) {
                    $id = $id->id;
                    $idKonsultasi = KonsultasiModel::where('id', $id)->first();
                    if ($getRelasi1 == null) {
                        $reject = 0;
                        $idKonsultasi->update([
                            'kode_reject' => null
                        ]);
                    } else {
                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi->update([
                            'kode_reject' => $reject
                        ]);
                    }

                    $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                    $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
                    $bukanReject = null;
                    foreach ($getGejala as $key) {
                        $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                    }
                    // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                }
                $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
            } elseif ($urutan == 2) {
                $bukanReject = $request->bukanReject;
                $bukanGejala = $request->bukanGejala;
                $urutan = 2;
                KonsultasiGejalaModel::create([
                    'kode_konsultasi' => $id->id,
                    'kode_gejala' => $request->gejala
                ]);
                $dataGejala = GejalaModel::all();
                $getRelasi = RejectGejalaModel::where('kode_gejala', $request->gejala)->where('keterangan', 1)->get();
                // dd($dataGejala);
                for ($i = 0; $i < count($bukanReject); $i++) {
                    $filteredReject = $getRelasi->where('kode_reject', $bukanReject[$i]);
                }
                $getRelasi1 = $filteredReject->first();
                $getReject = $getRelasi1->kode_reject;

                if ($request->benarGejala == null) {
                    $benarGejala[] = $request->gejala;
                } else {
                    $benarGejala = $request->benarGejala;
                    $benarGejala[] = $request->gejala;
                }

                $filterGejala = RejectGejalaModel::where('kode_gejala', '!=', $request->gejala)->where('kode_reject', $getReject)->where('keterangan', 1)->get();
                // dd($getReject);
                for ($i = 0; $i < count($benarGejala); $i++) {
                    $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                }

                if ($bukanGejala != null) {
                    for ($i = 0; $i < count($bukanGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=', $bukanGejala[$i]);
                    }
                }
                // dd($filterGejala);
                $getGejala =  $filterGejala->first();


                if ($getGejala == null) {
                    $id = $id->id;
                    $idKonsultasi = KonsultasiModel::where('id', $id)->first();
                    if ($getRelasi1 == null) {
                        $reject = 0;
                        $idKonsultasi->update([
                            'kode_reject' => null
                        ]);
                    } else {
                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi->update([
                            'kode_reject' => $reject
                        ]);
                    }

                    $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                    $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
                    foreach ($getGejala as $key) {
                        $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                    }
                    // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                }
                $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
            } else {

                if ($request->bukanGejala) {
                    $bukanGejala = $request->bukanGejala;
                } else {
                    $bukanGejala = null;
                }
                KonsultasiGejalaModel::create([
                    'kode_konsultasi' => $id->id,
                    'kode_gejala' => $request->gejala
                ]);
                $dataGejala = GejalaModel::all();
                $getRelasi = RejectGejalaModel::where('kode_gejala', $request->gejala)->where('keterangan', 1)->get();
                $getRelasi1 = $getRelasi->first();
                $getReject = $getRelasi1->kode_reject;
                // dd($getReject);
                if ($request->benarGejala == null) {
                    $benarGejala[] = $request->gejala;
                } else {
                    $benarGejala = $request->benarGejala;
                    $benarGejala[] = $request->gejala;
                }


                $filterGejala = RejectGejalaModel::where('kode_gejala', '!=', $request->gejala)->where('kode_reject', $getReject)->where('keterangan', 1);
                if ($bukanGejala != null) {
                    for ($i = 0; $i < count($bukanGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=', $bukanGejala[$i]);
                    }
                }

                for ($i = 0; $i < count($benarGejala); $i++) {
                    $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                }
                // dd($filterGejala);
                $getGejala =  $filterGejala->first();

                if ($getGejala == null) {
                    // dd($getGejala);
                    // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    // foreach ($getRelasi as $key) {
                    //     $dataReject[] = ['kode' => $key->kode_reject, 'keterangan' => 'belum'];
                    // }
                    // dd($gejalaPertama);
                    $urutan = 1;
                    $bukanGejala = null;
                    $bukanReject = null;

                    $idKonsultasi = KonsultasiModel::where('id', $id->id)->first();
                    // dd($idKonsultasi, $id);
                    $reject = $getRelasi1->kode_reject;
                    $idKonsultasi->update([
                        'kode_reject' => $reject
                    ]);

                    $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                    $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id->id)->get();

                    foreach ($getGejala as $key) {
                        $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                    }
                    // dd($getGejala);
                    return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                }
                // dd($getGejala);
                $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                // foreach ($getRelasi as $key) {
                //     $dataReject[] = ['kode' => $key->kode_reject, 'keterangan' => 'belum'];
                // }
                // dd($gejalaPertama);
                $urutan = 1;
                // $bukanGejala = null;
                $bukanReject = null;
                return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
            }
        } elseif ($request->jawaban == 0) { // Jika Jawabannya Tidak 
            if ($urutan == 0) {
                if ($request->bukanGejala == null) {
                    $bukanGejala[] = $request->gejala;
                } else {
                    $bukanGejala = $request->bukanGejala;
                    $bukanGejala[] = $request->gejala;
                }

                $gejala = $request->gejala;
                $getRelasi = RejectGejalaModel::where('kode_gejala', $request->gejala)->where('keterangan', 1)->get();
                $getRelasi1 = $getRelasi->first();
                $getReject = $getRelasi1->kode_reject;
                // dd($bukanGejala);
                if ($request->bukanReject == null) {
                    $bukanReject[] = $getReject;
                } else {
                    $bukanReject = $request->bukanReject;
                    $bukanReject[] = $getReject;
                }

                $sementara = RejectGejalaModel::where('kode_reject',  $bukanReject[0])->where('keterangan', 1)->get();
                foreach ($sementara as $key) {
                    $bukanGejala[] = $key->kode_gejala;
                }
                // dd($bukanReject, $bukanGejala, $sementara);
                // for ($i = 0; $i < count($bukanReject); $i++) {
                //     $filterGejala = RejectGejalaModel::where('kode_reject', '!=', $bukanReject[$i])->where('keterangan', 1)->get();
                //     // dd($filterGejala);
                //     // ->sortBy('created_at');
                //     // $filterGejala = ;
                // }
                // dd($filterGejala->first());
                $filterGejala = RejectGejalaModel::where('kode_gejala', '!=',  $bukanGejala[0]);
                for ($i = 0; $i < count($bukanGejala); $i++) {
                    $filterGejala = $filterGejala->where('kode_gejala', '!=',  $bukanGejala[$i]);
                    // ->sortBy('created_at');
                }
                for ($i = 0; $i < count($bukanReject); $i++) {
                    $filterGejala = $filterGejala->where('kode_reject', '!=', $bukanReject[$i])->where('keterangan', 1);
                    // dd($filterGejala);
                    // ->sortBy('created_at');
                    // $filterGejala = ;
                }
                $filterGejala = $filterGejala->get()->sortBy('created_at');
                // dd($sementara2->first());
                $getGejala = $filterGejala->first();


                if ($getGejala == null) {
                    $id = $id->id;
                    $reject = 0;
                    $idKonsultasi = KonsultasiModel::where('id', $id)->first();
                    $idKonsultasi->update([
                        'kode_reject' => null
                    ]);
                    $jenisReject = null;
                    $gejala = null;
                    return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                }
                $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                // dd($gejalaPertama);
                $urutan = 0;
                // $bukanReject = null;
                $benarGejala = null;
                // dd($bukanGejala);
                // dd($gejalaPertama);
                return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
            } elseif ($urutan >= 1) {
                if ($request->bukanGejala == null) {
                    $bukanGejala[] = $request->gejala;
                } else {
                    $bukanGejala = $request->bukanGejala;
                    $bukanGejala[] = $request->gejala;
                }

                $benarGejala = $request->benarGejala;
                $getRelasi = RejectGejalaModel::where('kode_gejala', $request->gejala)->where('keterangan', 1)->get();
                $getRelasi1 = $getRelasi->first();
                $getReject = $getRelasi1->kode_reject;

                if (count($bukanGejala) == 1) {
                    $filterGejala = RejectGejalaModel::where('kode_gejala', '!=', $request->gejala)->where('kode_reject', $getRelasi1->kode_reject)->where('keterangan', 1)->get();
                    for ($i = 0; $i < count($benarGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                    }
                    // dd(${'filter' . 0});
                    $getGejala =  $filterGejala->first();
                    // dd($getRelasi1->kode_reject);
                    if ($getGejala == null) {
                        // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                        // $bukanReject = null;

                        $id = $id->id;
                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi = KonsultasiModel::where('id', $id)->first();

                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi->update([
                            'kode_reject' => $reject
                        ]);

                        $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
                        foreach ($getGejala as $key) {
                            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                        }
                        return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                    }
                    $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    $bukanReject = null;

                    return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
                } elseif (count($bukanGejala) == 2) {
                    $filterGejala = RejectGejalaModel::where('kode_gejala', '!=', $bukanGejala[0])->where('kode_reject', $getRelasi1->kode_reject)->where('keterangan', 1)->get();
                    $filterGejala = $filterGejala->where('kode_gejala', '!=', $bukanGejala[1])->where('kode_reject', $getRelasi1->kode_reject)->where('keterangan', 1);
                    $filterGejala = collect($filterGejala);
                    for ($i = 0; $i < count($benarGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                    }
                    $getGejala =  $filterGejala->first();
                    // dd($filterGejala);
                    if ($getGejala == null) {
                        // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                        // $bukanReject = null;

                        $id = $id->id;
                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi = KonsultasiModel::where('id', $id)->first();

                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi->update([
                            'kode_reject' => $reject
                        ]);

                        $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
                        foreach ($getGejala as $key) {
                            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                        }
                        return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                    }
                    $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    $bukanReject = null;

                    return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
                } elseif (count($bukanGejala) > 2) {

                    // $makeListReject = RejectGejalaModel::where('kode_reject', $getRelasi1->kode_reject)->where('keterangan', 1)->get();
                    // foreach ($makeListReject as $key) {
                    //     $listReject1[] = $key->kode_gejala;
                    // }
                    // // $combineGejala = $bukanGejala;
                    // // $combineGejala[] =  $benarGejala;
                    // for ($i = 0; $i < count($benarGejala); $i++) {
                    //     $combineGejala[] = $benarGejala[$i];
                    // }
                    // for ($i = 0; $i < count($bukanGejala); $i++) {
                    //     $combineGejala[] =  $bukanGejala[$i];
                    // }
                    // dd($combineGejala, $listReject1, $getRelasi1->kode_reject);

                    $filterGejala = RejectGejalaModel::where('kode_reject', $getRelasi1->kode_reject)->where('keterangan', 1)->get();
                    for ($i = 0; $i < count($benarGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                        // $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                    }
                    for ($i = 0; $i < count($bukanGejala); $i++) {
                        $filterGejala = $filterGejala->where('kode_gejala', '!=',  $bukanGejala[$i]);
                    }
                    // dd($filterGejala);
                    // if (count($filterGejala) == 0) {
                    //     // dd('test');
                    //     $filterGejala = RejectGejalaModel::where('kode_reject', '=', $getRelasi1->kode_reject)->where('keterangan', 1)->get();
                    //     for ($i = 0; $i < count($benarGejala); $i++) {
                    //         $filterGejala = $filterGejala->where('kode_gejala', '!=',  $benarGejala[$i]);
                    //     }
                    // }

                    $getGejala =  $filterGejala->first();
                    // dd($getRelasi1->kode_reject);
                    if ($getGejala == null) {
                        // $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                        $urutan = 2;
                        $bukanReject[] = $getRelasi1->kode_reject;

                        $id = $id->id;
                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi = KonsultasiModel::where('id', $id)->first();

                        $reject = $getRelasi1->kode_reject;
                        $idKonsultasi->update([
                            'kode_reject' => $reject
                        ]);

                        $jenisReject = RejectModel::where('kode_reject', $reject)->first();
                        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
                        foreach ($getGejala as $key) {
                            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
                        }
                        return redirect()->route('hasilKonsultasi', compact('id', 'gejala', 'jenisReject', 'reject'));
                    }
                    $gejalaPertama =  GejalaModel::where('kode_gejala', $getGejala->kode_gejala)->first();
                    $urutan = 2;
                    $bukanReject[] = $getRelasi1->kode_reject;

                    return view('konsultasi', compact('gejalaPertama', 'urutan', 'id', 'bukanGejala', 'benarGejala', 'bukanReject'));
                }
            }
        }
    }


    public function hasilKonsultasi($id, $reject)
    {
        $id = KonsultasiModel::where('id', $id)->first();
        $jenisReject = RejectModel::where('kode_reject', $reject)->first();
        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id->id)->get();
        // dd($getGejala);
        if (count($getGejala) == 0) {
            $gejala = null;
        }
        foreach ($getGejala as $key) {
            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
        }
        // dd($getGejala);
        return view('hasilDiagnosa', compact('id', 'gejala', 'jenisReject', 'reject'));
    }


    public function riwayatUser()
    {
        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        $data = KonsultasiModel::whereDate('created_at', $currentDate)->get();
        // dd($data);
        return view('riwayatUser', compact('data'));
    }

    public function dataRelasi()
    {
        $dataGejala = GejalaModel::orderBy('created_at')->get();
        $dataReject = RejectModel::orderBy('created_at')->get();
        $relasi = RejectGejalaModel::orderBy('created_at')->get();
        return view('dataRelasi', compact('dataGejala', 'dataReject', 'relasi'));
    }

    public function modalDetailRiwayat($id)
    {
        // dd('test');
        $dataKonsultasi = KonsultasiModel::where('id', $id)->first();
        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
        // dd($getGejala);
        // dd($dataKonsultasi);
        if (count($getGejala) == 0) {
            $gejala = null;
        }
        foreach ($getGejala as $key) {
            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
        }
        return view('modalDetailRiwayat', compact('dataKonsultasi', 'gejala'));
    }

    public function modalPerbaikan($id)
    {
        $dataKonsultasi = KonsultasiModel::where('id', $id)->first();
        $getGejala = KonsultasiGejalaModel::where('kode_konsultasi', $id)->get();
        // dd($getGejala);
        if (count($getGejala) == 0) {
            $gejala = null;
        }
        foreach ($getGejala as $key) {
            $gejala[] = GejalaModel::where('kode_gejala', $key->kode_gejala)->first();
        }
        return view('modalPerbaikan', compact('dataKonsultasi', 'gejala'));
    }

    public function isiPerbaikan(Request $request, $id)
    {
        // Get the current date
        // dd($request, $id);
        PerbaikanModel::create([
            'keterangan' => $request->keterangan_perbaikan,
            'kode_konsultasi' => $id
        ]);


        return redirect('/data/perbaikan');
    }


    public function dataKonsultasi()
    {
        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        $dataToday = KonsultasiModel::whereDate('created_at', $currentDate)->get();
        $data = KonsultasiModel::all();
        return view('dataKonsultasi', compact('data', 'dataToday'));
    }

    public function destroyKonsultasi($kode)
    {
        $data = KonsultasiModel::where('id', $kode)->first();
        $data->delete();
        // return view('modalEditReject', compact('data'));
    }
    public function dataPerbaikan()
    {
        // Get the current date
        $currentDate = Carbon::now()->toDateString();

        $data = PerbaikanModel::all();
        return view('perbaikan', compact('data'));
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
        $dataGejala = GejalaModel::orderBy('created_at')->get();
        $dataReject = RejectModel::orderBy('created_at')->get();
        $relasi = RejectGejalaModel::orderBy('created_at')->get();
        return view('aturan', compact('dataGejala', 'dataReject', 'relasi'));
    }

    public function modalEditRelasi($reject)
    {
        $dataReject = RejectModel::where('kode_reject', $reject)->first();
        $dataRelasi = RejectGejalaModel::where('kode_reject', $reject)->get();
        //    dd($dataRelasi);
        return view('modalEditRelasi', compact('dataRelasi', 'dataReject'));
    }

    public function updateRelasi(Request $request, $reject)
    {
        // dd($request);
        $dataReject = RejectModel::where('kode_reject', $reject)->first();
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
        return redirect('/aturan')->with('success', 'Data diUbah');
    }

    public function inserKonsultasi(Request $request)
    {
        // $dataReject = RejectModel::where('kode_reject', $reject)->first();
        // $dataRelasi = RejectGejalaModel::where('kode_reject', $reject)->get();
        //    dd($dataRelasi);

        dd($request);
        return view('modalEditRelasi', compact('dataRelasi', 'dataReject'));
    }
}
