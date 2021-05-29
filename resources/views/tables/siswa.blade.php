@extends('layouts.index')

@section('tittle', 'View Users - siswa')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Users</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                    vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">View Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Table</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col col-sm-6">

                            </div>
                            <div class="col-6 text-right">
                                <label for="search">
                                    <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="Search" autocomplete="off">
                                </label>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Alamat</th>
                                    <th>NO. Telp</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Foreach Datas -->
                                @foreach ($siswa as $sw)
                                    <tr>
                                        <td>{{ $sw->name }}</td>
                                        <td>{{ $sw->email }}</td>
                                        <td>{{ $sw->roles }}</td>
                                        <td>{{ $sw->address }}</td>
                                        <td>{{ $sw->phone }}</td>
                                        <td>{{ $sw->gender }}</td>
                                        <td class="text-center">
                                            <a href="delete-siswa/{{ $sw->id }}" class="btn btn-sm btn-danger mt-1">hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Alamat</th>
                                    <th>NO. Telp</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
