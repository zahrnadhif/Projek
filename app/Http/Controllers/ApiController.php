<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiModel;
use App\Models\RejectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

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

    public function RiwayarMonthly()
    {
        $data = KonsultasiModel::all();

        // return $exuser;
    }

    public function dataRiwayat(Request $request)
    {
        if ($request->ajax()) {
            $model = KonsultasiModel::with('users', 'reject')->select('*');
            return DataTables::of($model)
                ->addColumn('detailButton', function ($model) {
                    $po = '<button class="btn btn-primary" onclick="detailReject(' . $model->id . ')"> Detail</button>';
                    return $po;
                })
                ->addColumn('nama', function ($model) {
                    return optional($model->users)->name;
                })
                ->addColumn('reject', function ($model) {
                    if ($model->reject) {
                        return $model->reject->nama;
                    } else {
                        return 'Tidak ditemukan'; // Gantilah pesan ini dengan pesan yang sesuai
                    }
                })
                

                ->addColumn('created_at', function ($model) {
                    return $model->created_at->format('d/m/Y');
                })
                ->rawColumns(['detailButton', 'nama', 'reject', 'created_at'])
                ->make(true);
        }
    }

    public function grafikRiwayat()
    {
        $currentMonth = Carbon::now()->month;
        $konsultasi = KonsultasiModel::whereMonth('created_at', $currentMonth)->get();
        $reject = RejectModel::all();
        $data = [];

        foreach ($reject as $key) {
            $listReject[] = $key->kode_reject;
            $namaReject[] = $key->nama;
        }

        // $angka = 0;

        // foreach ($konsultasi as $key) {
        for ($i = 0; $i < count($listReject); $i++) {
            $data[] = [
                'reject' => $namaReject[$i],
                'jumlah' => $konsultasi->where('kode_reject', $listReject[$i])->count()
            ];
        }

        // $angka++;
        // }

        return $data;
        // return $exuser;
    }
}
