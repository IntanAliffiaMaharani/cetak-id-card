@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="card card-custom mb-4">

        <div class="card-body d-flex justify-content-between align-items-center">

            <div>

                <h3 class="mb-1">
                    <i class="bi bi-table"></i>
                    Data ID Card
                </h3>

                <small class="text-muted">
                    Daftar seluruh data ID Card
                </small>

            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('idcards.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Data
                </a>

                <a href="{{ route('import.index') }}" class="btn btn-success">
                    <i class="bi bi-file-earmark-excel"></i>
                    Import Excel
                </a>

            </div>

        </div>

    </div>

    {{-- Search --}}
    <div class="card card-custom mb-4">

    <div class="card-body">

        <form method="GET" action="{{ route('idcards.index') }}">

            <div class="row align-items-end g-3">

                <div class="col-md-9">

                    <label class="form-label">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari Nama, NP, Status, Lokasi, Operator..."
                        value="{{ request('search') }}">

                </div>

                <div class="col-md-3">

                    <label class="form-label">&nbsp;</label>

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary flex-fill">

                            <i class="bi bi-search"></i>
                            Search

                        </button>

                        <a href="{{ route('idcards.index') }}"
                           class="btn btn-outline-secondary">

                            Reset

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>
    {{-- Alert --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert">

            </button>

        </div>

    @endif

    {{-- Table --}}
    <div class="card card-custom">

        <div class="card-header">

            <strong>Data ID Card</strong>

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th width="60">No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>NP</th>
                        <th>Nama</th>
                        <th>Nomor Nota Dinas</th>
                        <th>Operator</th>
                        <th width="120">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($idcards as $data)

                    <tr>

                        <td>

                            {{ $loop->iteration + ($idcards->firstItem() - 1) }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}

                        </td>

                        <td>{{ $data->status }}</td>

                        <td>{{ $data->lokasi }}</td>

                        <td>{{ $data->np }}</td>

                        <td>{{ $data->nama }}</td>

                        <td>{{ $data->nomor_nota }}</td>

                        <td>{{ $data->operator }}</td>

                        <td>

                            <a
                                href="{{ route('idcards.edit',$data->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <form
                                action="{{ route('idcards.destroy',$data->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9" class="text-center py-4">

                            Belum ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            {{-- Pagination --}}
            <div class="mt-3 d-flex justify-content-between align-items-center">

    <div>
        Showing {{ $idcards->firstItem() }} to {{ $idcards->lastItem() }}
        of {{ $idcards->total() }} results
    </div>

    <div>
        {{ $idcards->withQueryString()->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection