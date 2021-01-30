@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Tabel Matakuliah</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Tambah Matakuliah
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="matkuls-list" name="matkuls-list">
                @foreach ($matkul as $data)
                <tr id="matkul{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->nama_matakuliah}}</td>
                    <td>{{$data->sks}}</td>
                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('matkul.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('matkul.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Tambah Matakuliah</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label>Nama Matakuliah</label>
                                <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah"
                                        placeholder="Enter Nama Matakuliah" value="">
                            </div>

                            <div class="form-group">
                                <label>SKS</label>
                                    <input type="text" class="form-control" id="sks" name="sks"
                                        placeholder="Enter sks" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="matkul_id" name="matkul_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection