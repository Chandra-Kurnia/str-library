<?php

$display = '';
$roles = Auth::user()->roles;

if ($roles == 'siswa') {
$display = 'd-none';
}
?>

@extends('layouts.index')

@section('tittle', 'Borrowed Books')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Borrowed Books</h2>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->

    <div class="row">
    @if ($borrow_count == 0)
        <div class="alert">tidak ada buku yang dipinjam</div>
    @else
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col col-sm-6">

                            </div>
                            <div class="col-6 text-right">
                                <label for="search">
                                    <input type="text" name="search" id="search" class="form-control form-control-sm"
                                        placeholder="Search" autocomplete="off">
                                </label>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>cover</th>
                                    <th>Date Borrow</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Foreach Datas -->
                                @foreach ($bookDatas as $book)
                                    <tr>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td><img src="/images/cover-books/{{ $book->cover }}" class="img-fluid" alt="Cover" width="150px" ></td>
                                        <td>{{ $book->borrow_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>cover</th>
                                    <th>Date Borrow</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
@endsection
