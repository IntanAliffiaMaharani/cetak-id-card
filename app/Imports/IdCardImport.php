<?php

namespace App\Imports;

use App\Models\IdCard;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IdCardImport implements ToModel, WithStartRow
{
    private $lastTanggal = null;
    private $lastNota = '-';
    private $lastOperator = '';

    public function startRow(): int
    {
        return 4;
    }

    public function model(array $row)
    {
        if (empty(array_filter($row, fn($v) => trim((string) $v) !== ''))) {
            return null;
        }

        if (
            ($row[10] ?? '') === 'NO' ||
            ($row[11] ?? '') === 'STATUS' ||
            ($row[12] ?? '') === 'JUMLAH'
        ) {
            return null;
        }

        if (empty(trim($row[4] ?? '')) || empty(trim($row[5] ?? ''))) {
            return null;
        }

        if (!empty(trim($row[0] ?? ''))) {
            $this->lastTanggal = $this->formatTanggal($row[0]);
        }

        if (empty($this->lastTanggal)) {
            return null;
        }

        if (!empty(trim($row[6] ?? ''))) {
            $this->lastNota = trim($row[6]);
        }

        if (!empty(trim($row[7] ?? ''))) {
            $this->lastOperator = trim($row[7]);
        }

        $gagalCetak = trim((string)($row[8] ?? ''));

        if ($gagalCetak === '' || !is_numeric($gagalCetak)) {
            $gagalCetak = 0;
        }

        return new IdCard([
            'tanggal'      => $this->lastTanggal,
            'status'       => trim($row[2] ?? ''),
            'lokasi'       => trim($row[3] ?? ''),
            'np'           => trim($row[4] ?? ''),
            'nama'         => trim($row[5] ?? ''),
            'nomor_nota'   => $this->lastNota ?: '-',
            'operator'     => $this->lastOperator ?: '-',
            'gagal_cetak'  => (int) $gagalCetak,
        ]);
    }

    private function formatTanggal($tanggal)
    {
        if (empty($tanggal)) {
            return null;
        }

        if (is_numeric($tanggal)) {
            return Date::excelToDateTimeObject($tanggal)
                ->format('Y-m-d');
        }

        $tanggal = preg_replace('/^[^,]+,\s*/u', '', $tanggal);

        $bulan = [
            'Januari'   => 'January',
            'Februari'  => 'February',
            'Maret'     => 'March',
            'April'     => 'April',
            'Mei'       => 'May',
            'Juni'      => 'June',
            'Juli'      => 'July',
            'Agustus'   => 'August',
            'September' => 'September',
            'Oktober'   => 'October',
            'November'  => 'November',
            'Desember'  => 'December',
        ];

        $tanggal = str_replace(
            array_keys($bulan),
            array_values($bulan),
            $tanggal
        );

        try {
            return Carbon::parse($tanggal)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}