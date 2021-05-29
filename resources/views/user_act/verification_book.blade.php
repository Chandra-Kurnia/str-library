<?php

$display = '';
$roles = Auth::user()->roles;

if ($roles == 'siswa') {
$display = 'd-none';
}
?>

@extends('layouts.index')

@section('tittle', 'Books Unverified')
@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Books Unverification</h2>
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
                                <label for="">
                                    <select name="" id=""
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </label>
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
                                    <th>Title</th>
                                    <th>cover</th>
                                    <th>Date Return</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Foreach Datas -->
                                @foreach ($bookDatas as $book)
                                    <tr>
                                    <td>{{ $book->title }}</td>
                                    <td><img src="/images/cover-books/{{ $book->cover }}" class="img-fluid" alt="cover" width="150px"></td>
                                    <td>{{ $book->return_date }}</td>
                                    <td><a href="/cancel-return/{{ $book->borrow_id }}" class="btn btn-sm btn-danger">Cancel Return</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>cover</th>
                                    <th>Date Return</th>
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
