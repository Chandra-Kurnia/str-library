@extends('layouts.index')

@section('tittle', 'Update Book')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Update Books</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Books</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Book</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- basic form  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">

                    <!-- shows error  -->
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @foreach ($book as $data)
                        <form method="POST" action="/update-book/{{ $data->book_id }}">
                        @csrf
                        <div class="">
                            <div class="card-header">
                                <h3 class="mb-1">Update Form</h3>
                                <p>Please enter new book information.</p>
                            </div>
                            <div class="card-body">
                                <!-- tittle -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="tittle" type="text"
                                        class="form-control @error('tittle') is-invalid @enderror" name="tittle"
                                        value="{{ $data->title }}" required autocomplete="off" autofocus
                                        placeholder="Book Tittle">

                                    @error('tittle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Publisher -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="publisher" type="text"
                                        class="form-control @error('publisher') is-invalid @enderror" name="publisher"
                                        value="{{ $data->publisher }}" required autocomplete="off" autofocus
                                        placeholder="Book publisher">

                                    @error('publisher')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="Author" type="text"
                                        class="form-control @error('Author') is-invalid @enderror" name="Author"
                                        value="{{ $data->author }}" required autocomplete="off" autofocus
                                        placeholder="Book Author">

                                    @error('Author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- date-publish -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="date-publish" type="text"
                                        class="form-control @error('date-publish') is-invalid @enderror" name="date-publish"
                                        value="{{ $data->date_publish }}" required autocomplete="off" autofocus
                                        placeholder="Date-publish">

                                    @error('date-publish')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- category -->
                                <div class="form-group">
                                    <select name="category" id="category" class="form-control form-control-lg">
                                        <option value="" id="category-opt">Category</option>
                                        <option value="adventure">Adventure</option>
                                        <option value="children">Children's</option>
                                        <option value="comedy">Comedy</option>
                                        <option value="fantasy">Fantasy</option>
                                        <option value="horor">Horror</option>
                                        <option value="mistery">Mistery</option>
                                        <option value="phsycological">Phsycological</option>
                                        <option value="romance">Romance</option>
                                        <option value="scifi">Science Fiction</option>
                                        <option value="thriller">Thriller</option>
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- language -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="language" type="text"
                                        class="form-control @error('language') is-invalid @enderror" name="language"
                                        value="{{ $data->language }}" required autocomplete="off" autofocus
                                        placeholder="Book language">

                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @endforeach
                                <!-- status -->


                                <div class="form-group pt-2">
                                    <button class="btn btn-block btn-primary" type="submit">Update Book</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form  -->
    <!-- ============================================================== -->
@endsection
