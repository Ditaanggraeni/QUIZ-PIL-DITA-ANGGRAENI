@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Tabel Mahasiswa</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Tambah Mahasiswa
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomot Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="todos-list" name="todos-list">
                @foreach ($todo as $data)
                <tr id="todo{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->nama_mahasiswa}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->no_tlp}}</td>
                    <td>{{$data->email}}</td>
                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('todo.destroy', $data->id) }}" method="POST">
                                        <a href="{{ route('todo.edit', $data->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                        <h4 class="modal-title" id="formModalLabel">Tambah Mahasiswa</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                                        placeholder="Enter Nama Mahasiswa" value="">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        placeholder="Enter Alamat" value="">
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp"
                                        placeholder="Enter Nomor Telepon" value="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection