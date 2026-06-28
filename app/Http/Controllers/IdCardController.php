<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\IdCardImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\IdCard;

class IdCardController extends Controller
{
    public function index()
    {
        $idcards = IdCard::latest()->get();

        return view('idcards.index', compact('idcards'));
    }

    public function create()
    {
        return view('idcards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required',
            'lokasi' => 'required',
            'np' => 'required',
            'nama' => 'required',
            'nomor_nota' => 'nullable',
            'operator' => 'nullable',
            'gagal_cetak' => 'nullable|integer'
        ]);

        IdCard::create([
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'lokasi' => $request->lokasi,
            'np' => $request->np,
            'nama' => $request->nama,
            'nomor_nota' => $request->nomor_nota,
            'operator' => $request->operator,
            'gagal_cetak' => $request->gagal_cetak ?? 0,
        ]);

        return redirect()
            ->route('idcards.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new IdCardImport, $request->file('file'));

    return redirect()
        ->route('idcards.index')
        ->with('success', 'Import berhasil.');
}
}