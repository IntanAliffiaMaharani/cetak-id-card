<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $query = IdCard::query();
        $total = IdCard::count();

        $hariIni = IdCard::whereDate('tanggal', today())->count();

        $mingguIni = IdCard::whereBetween('tanggal', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        $bulanIni = IdCard::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        $tahunIni = IdCard::whereYear('tanggal', now()->year)
            ->count();

     
        $status = [
            'Alih Daya'      => IdCard::where('status', 'Alih Daya')->count(),
            'Dewas'          => IdCard::where('status', 'Dewas')->count(),
            'Honorer / TPBW' => IdCard::whereIn('status', ['Honorer', 'TPBW'])->count(),
            'KCA'            => IdCard::where('status', 'KCA')->count(),
            'Magang'         => IdCard::whereIn('status', ['Magang', 'Magang Hub'])->count(),
            'PKWT'           => IdCard::where('status', 'PKWT')->count(),
            'Petugas Luar'   => IdCard::where('status', 'Petugas Luar')->count(),
            'Organik'        => IdCard::where('status', 'Organik')->count(),
            'Visitor / VIP'  => IdCard::whereIn('status', ['Visitor', 'VIP'])->count(),
            'Project IOT'    => IdCard::where('status', 'Project IOT BGN')->count(),
        ];

        $statusLabel = array_keys($status);
        $statusTotal = array_values($status);

        $grafik = IdCard::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('tanggal', now()->year)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->orderBy(DB::raw('MONTH(tanggal)'))
            ->get();

        $bulan = [];
        $totalGrafik = [];

        foreach ($grafik as $g) {

            $bulan[] = date('M', mktime(0, 0, 0, $g->bulan, 1));
            $totalGrafik[] = $g->total;

        }

$labelBulan = [
    'Jan','Feb','Mar','Apr','Mei','Jun',
    'Jul','Agu','Sep','Okt','Nov','Des'
];

$statusKategori = [

    'Alih Daya' => ['Alih Daya'],

    'Dewas' => ['Dewas'],

    'Honorer / TPBW' => ['Honorer','TPBW'],

    'KCA' => ['KCA'],

    'Magang' => ['Magang','Magang Hub'],

    'PKWT' => ['PKWT'],

    'Petugas Luar' => ['Petugas Luar'],

    'Organik' => ['Organik'],

    'Visitor / VIP' => ['Visitor','VIP'],

    'Project IOT' => ['Project IOT BGN']

];

$statusDataset = [];

foreach($statusKategori as $label => $listStatus){

    $data=[];

    for($bulan=1;$bulan<=12;$bulan++){

        $jumlah = IdCard::whereMonth('tanggal',$bulan)
                    ->whereYear('tanggal',now()->year)
                    ->whereIn('status',$listStatus)
                    ->count();

        $data[]=$jumlah;

    }

    $statusDataset[]=[

        'label'=>$label,

        'data'=>$data

    ];

}
        
return view('dashboard', compact(
    'total',
    'hariIni',
    'bulanIni',
    'tahunIni',
    'statusLabel',
    'statusTotal',
    'bulan',
    'totalGrafik',
    'statusDataset',
    'labelBulan'
));
    }
}