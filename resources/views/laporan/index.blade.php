@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card card-custom mb-4">

        <div class="card-header">
            <strong>Laporan Cetak ID Card</strong>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('laporan.index') }}">

                <div class="row">

                    <div class="col-md-3">
                        <label>Tanggal Awal</label>
                        <input type="date"
                               name="tanggal_awal"
                               value="{{ request('tanggal_awal') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Tanggal Akhir</label>
                        <input type="date"
                               name="tanggal_akhir"
                               value="{{ request('tanggal_akhir') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>

                        <select name="status" class="form-control">

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
                        <label>Lokasi</label>

                        <select name="lokasi" class="form-control">

                            <option value="">Semua Lokasi</option>

                            @foreach($lokasi as $l)
                                <option value="{{ $l->lokasi }}"
                                    {{ request('lokasi') == $l->lokasi ? 'selected' : '' }}>
                                    {{ $l->lokasi }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="mt-3">

                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i> Filter
                    </button>

                    <a href="{{ route('laporan.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>


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

                {{ $data->withQueryString()->links() }}

            </div>

        </div>

    </div>

</div>

@endsection