@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="row">

    {{-- INPUT MANUAL --}}
    <div class="col-lg-7">

        <div class="card card-custom">

            <div class="card-header bg-primary text-white">
                <strong>📝 Input Data Manual</strong>
            </div>

            <div class="card-body">

                <form action="{{ route('idcards.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>

                            <select name="status" class="form-control">

                                <option>Alih Daya</option>
                                <option>Dewas</option>
                                <option>Honorer</option>
                                <option>TPBW</option>
                                <option>KCA</option>
                                <option>Magang</option>
                                <option>Magang Hub</option>
                                <option>PKWT</option>
                                <option>Petugas Luar</option>
                                <option>Organik</option>
                                <option>Visitor</option>
                                <option>VIP</option>
                                <option>Project IOT BGN</option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>NP</label>
                            <input type="text" name="np" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nomor Nota</label>
                            <input type="text" name="nomor_nota" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Operator</label>
                            <input type="text" name="operator" class="form-control">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>Gagal</label>
                            <input type="number" value="0" name="gagal_cetak" class="form-control">
                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Simpan Data
                    </button>

                </form>

            </div>

        </div>

    </div>

    {{-- IMPORT EXCEL --}}
    <div class="col-lg-5">

        <div class="card card-custom">

            <div class="card-header bg-success text-white">
                <strong>📥 Import Excel</strong>
            </div>

            <div class="card-body">

                <form action="{{ route('idcards.import') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label>File Excel</label>

                        <input type="file"
                               class="form-control"
                               name="file"
                               required>

                    </div>

                    <button class="btn btn-success w-100">

                        Import Excel

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

@endsection