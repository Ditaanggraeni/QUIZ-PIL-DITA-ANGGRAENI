@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="card">
        <div class="card-body">
            <h3>Nama Matakuliah : {{ $matkul['nama_matakuliah'] }}</h3>
            <h3>SKS : {{ $matkul['sks'] }}</h3>
     </div>
</div>
@endsection