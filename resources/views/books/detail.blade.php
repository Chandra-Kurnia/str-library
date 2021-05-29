@extends('layouts.index')

@section('tittle', 'Book Detail')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Book Detail</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <hr>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($book as $item)
                            <img src="/images/cover-books/{{ $item->cover }}" class="img-fluid" alt="Responsive image"
                                width="600px">
                            <div class="col">
                                <div class="alert alert-dark" role="alert">
                                    Tittle : {{ $item->title }}
                                </div>
                                <div class="alert alert-dark" role="alert">
                                    Publisher : {{ $item->publisher }}
                                </div>
                                <div class="alert alert-dark" role="alert">
                                    Author : {{ $item->author }}
                                </div>
                                <div class="alert alert-dark" role="alert">
                                    Date Publish : {{ $item->date_publish }}
                                </div>
                                <div class="alert alert-dark" role="alert">
                                    Category : {{ $item->category }}
                                </div>
                                <div class="alert alert-dark" role="alert">
                                    Language : {{ $item->language }}
                                </div>

                                <form action="/borrow/{{ $item->book_id }}" method="POST">
                                    @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-lg btn-primary">Borrow</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
