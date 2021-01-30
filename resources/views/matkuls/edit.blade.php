@extends('layouts.app')

@section('title', 'Edit Data Matakuliah')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Matakuliah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('matkul.update', $matkul->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Matakuliah</label>
                                <input type="text" class="form-control @error('nama_matakuliah') is-invalid @enderror" name="nama_matakuliah" value="{{ old('nama_matakuliah', $matkul->nama_matakuliah) }}" placeholder="Masukkan Nama Mahasiswa">

                            <div class="form-group">
                                <label class="font-weight-bold">SKS</label>
                                <input type="text" class="form-control @error('sks') is-invalid @enderror" name="sks" value="{{ old('sks', $matkul->sks) }}" placeholder="Masukkan SKS">
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection