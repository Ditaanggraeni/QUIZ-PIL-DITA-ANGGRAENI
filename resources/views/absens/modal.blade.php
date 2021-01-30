@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Tabel Absensi Mahasiswa</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Tambah Absensi
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Waktu Absen</th>
                    <th>Nama Mahasiswa</th>
                    <th>Matakuliah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody id="absens-list" name="absens-list">
                @foreach ($absen as $data)
                <tr id="absen{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->waktu_absen}}</td>
                    <td>{{$data->mahasiswa_id}}</td>
                    <td>{{$data->matakuliah_id}}</td>
                    <td>{{$data->keterangan}}</td>
                    <td class="text-center"> </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Tambah Absensi</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label>Waktu Absen </label>
                                <input type="time" class="form-control" id="waktu_absen" name="waktu_absen"
                                        placeholder="Enter Waktu Absen" value="">
                            </div>

                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="mahasiswa_id" name="mahasiswa_id"
                                        placeholder="Enter Nama Mahasiswa" value="">
                            </div>
                            <div class="form-group">
                                <label>Matakuliah</label>
                                <select name="matakuliah_id" class="form-control">
                                        <option value="">- Pilih -</option>
                                            <option value="Student Exchange(Pemrograman Android)"> Student Exchange(Pemrograman Android) </option>
                                            <option value="Audit Sistem Informasi"> Audit Sistem Informasi </option>
                                            <option value="E-Government"> E-Government </option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Enter Keterangan" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="absen_id" name="absen_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection