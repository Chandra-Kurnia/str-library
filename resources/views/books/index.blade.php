<?php

$display = '';
$display2 = '';
$roles = Auth::user()->roles;

if ($roles == 'siswa') {
$display = 'd-none';
}elseif ($roles == 'petugas') {
    $display2 = 'd-none';
}
?>

@extends('layouts.index')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Books Categories</h2>
                <!--breadcumb -->
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Books</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $category }}</li>
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
            <div class="card {{ $display }}">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col col-sm-6">

                                </label>
                            </div>
                            <div class="col-6 text-right">
                                @csrf
                                <form action="/books/search/{{ $category }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" autocomplete="off" placeholder="Search here" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                                        <button type="submit" class="input-group-text" id="basic-addon2">search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>cover</th>
                                    <th>Publisher</th>
                                    <th>Author</th>
                                    <th>Date Publish</th>
                                    <th>Language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Foreach Datas -->
                                @foreach ($books as $book)
                                        <tr>
                                            @section('tittle', 'Books - '.$book->category)
                                            <td>{{ $book->title }}</td>
                                            <td><img src="/images/cover-books/{{ $book->cover }}" alt="cover" width="80px"></td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->date_publish }}</td>
                                            <td>{{ $book->language }}</td>
                                            <td class="text-center">
                                                <a href="/delete/{{ $book->book_id }}" class="btn btn-sm btn-danger mt-1">hapus</a>
                                                <a href="/update-book/{{ $book->book_id }}" class="btn btn-sm btn-success mt-1">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{$books->appends(Request::all())->links()}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Cover</th>
                                        <th>Publisher</th>
                                        <th>Author</th>
                                        <th>Date Publish</th>
                                        <th>Language</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="row {{ $display2 }}">
                    @foreach ($books as $book)
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            {{-- col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 --}}
                            <div class="card">
                                <img class="card-img-top img-fluid"src="/images/cover-books/{{ $book->cover }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $book->title }}</h3>
                                    <p class="card-text">a {{ $book->category }} book by {{ $book->author }}, which was published on
                                        the {{ $book->date_publish }}</p>
                                    <a href="/borrow/{{ $book->book_id }}" class="btn btn-primary">borrow</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
    @endsection
