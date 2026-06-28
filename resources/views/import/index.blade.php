@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Import Data ID Card</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Pilih File Excel</label>

                    <input type="file" class="form-control" name="file" required>

                </div>

                <button class="btn btn-success">

                    Import Excel

                </button>

            </form>

        </div>

    </div>

</div>

@endsection