<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = IdCard::query();
        if ($request->tanggal_awal && $request->tanggal_akhir) {
            $query->whereBetween('tanggal', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->lokasi) {
            $query->where('lokasi', $request->lokasi);
        }

        $data = $query->orderBy('tanggal', 'desc')->paginate(15);

        $status = IdCard::select('status')->distinct()->orderBy('status')->get();

        $lokasi = IdCard::select('lokasi')->distinct()->orderBy('lokasi')->get();

        return view('laporan.index', compact(
            'data',
            'status',
            'lokasi'
        ));
    }
}