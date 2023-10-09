<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiModel;
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
                    return optional($model->reject)->nama;
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
        $data = KonsultasiModel::whereMonth('created_at', $currentMonth)->get();

        return $data;
        // return $exuser;
    }
}
