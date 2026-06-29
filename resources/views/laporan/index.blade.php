@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card card-custom mb-4">

        <div class="card-header">
            <strong>Laporan Cetak ID Card</strong>
        </div>

        <div class="card-body">

           <form method="GET" action="{{ route('laporan.index') }}">

    <div class="row align-items-end g-3">

        <div class="col-md-3">
            <label class="form-label">Status</label>

            <select name="status" class="form-select">

                <option value="">Semua Status</option>

                @foreach($status as $s)
                    <option value="{{ $s->status }}"
                        {{ request('status') == $s->status ? 'selected' : '' }}>
                        {{ $s->status }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Lokasi</label>

            <select name="lokasi" class="form-select">

                <option value="">Semua Lokasi</option>

                @foreach($lokasi as $l)
                    <option value="{{ $l->lokasi }}"
                        {{ request('lokasi') == $l->lokasi ? 'selected' : '' }}>
                        {{ $l->lokasi }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="col-md-2">
            <label class="form-label">Periode</label>

            <select
                name="periode"
                id="periode"
                class="form-select">

                <option value="">Semua Data</option>

                <option value="hari"
                    {{ request('periode')=='hari'?'selected':'' }}>
                    Hari Ini
                </option>

                <option value="minggu"
                    {{ request('periode')=='minggu'?'selected':'' }}>
                    Minggu Ini
                </option>

                <option value="bulan"
                    {{ request('periode')=='bulan'?'selected':'' }}>
                    Bulan Ini
                </option>

                <option value="tahun"
                    {{ request('periode')=='tahun'?'selected':'' }}>
                    Tahun Ini
                </option>

                <option value="custom"
                    {{ request('periode')=='custom'?'selected':'' }}>
                    Custom
                </option>

            </select>

        </div>

        <div class="col-md-4">

            <label class="form-label">Search</label>

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari Nama, NP, Operator..."
                value="{{ request('search') }}">

        </div>

    </div>

    <div
        id="tanggalCustom"
        class="row mt-3"
        style="{{ request('periode')=='custom' ? '' : 'display:none;' }}">

        <div class="col-md-3">

            <label class="form-label">
                Tanggal Awal
            </label>

            <input
                type="date"
                name="tanggal_awal"
                class="form-control"
                value="{{ request('tanggal_awal') }}">

        </div>

        <div class="col-md-3">

            <label class="form-label">
                Tanggal Akhir
            </label>

            <input
                type="date"
                name="tanggal_akhir"
                class="form-control"
                value="{{ request('tanggal_akhir') }}">

        </div>

    </div>

    <div class="mt-4">

        <button class="btn btn-primary">

            <i class="bi bi-search"></i>

            Filter

        </button>

        <a href="{{ route('laporan.index') }}"
           class="btn btn-outline-secondary">

            Reset

        </a>

    </div>

</form>

    <div class="card card-custom">

        <div class="card-header">

            <strong>Data Laporan</strong>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>NP</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>No Nota</th>
                        <th>Operator</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $item)

                    <tr>

                        <td>{{ $loop->iteration + ($data->firstItem() - 1) }}</td>

                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>

                        <td>{{ $item->np }}</td>

                        <td>{{ $item->nama }}</td>

                        <td>{{ $item->status }}</td>

                        <td>{{ $item->lokasi }}</td>

                        <td>{{ $item->nomor_nota }}</td>

                        <td>{{ $item->operator }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Tidak ada data.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-3">

                {{ $data->withQueryString()->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

</div>
@push('scripts')

<script>

const periode = document.getElementById('periode');
const tanggal = document.getElementById('tanggalCustom');

periode.addEventListener('change',function(){

    if(this.value=="custom"){

        tanggal.style.display='flex';

    }else{

        tanggal.style.display='none';

    }

});

</script>

@endpush
@endsection