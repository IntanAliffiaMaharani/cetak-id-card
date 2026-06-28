@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>
            <i class="bi bi-table"></i>
            Data ID Card
        </h3>

        <div>
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>NP</th>
                        <th>Nama</th>
                        <th>Nomor Nota Dinas</th>
                        <th>Operator</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($idcards as $data)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $data->tanggal }}</td>

                        <td>{{ $data->status }}</td>

                        <td>{{ $data->lokasi }}</td>

                        <td>{{ $data->np }}</td>

                        <td>{{ $data->nama }}</td>

                        <td>{{ $data->nomor_nota }}</td>

                        <td>{{ $data->operator }}</td>

                        <td width="170">

                            <a href="{{ route('idcards.edit',$data->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('idcards.destroy',$data->id) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="9" class="text-center">

                            Belum ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection