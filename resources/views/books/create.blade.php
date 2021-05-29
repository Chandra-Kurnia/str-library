@extends('layouts.index')

@section('tittle', 'Add Book')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Add Book</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Books</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Book</li>
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

                    <form method="POST" action="/create-book" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="card-header">
                                <h3 class="mb-1">Book Registrasion</h3>
                                <p>Please enter book information.</p>
                            </div>
                            <div class="card-body">
                                <!-- tittle -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="tittle" type="text"
                                        class="form-control @error('tittle') is-invalid @enderror" name="tittle"
                                        value="{{ old('tittle') }}" required autocomplete="off" autofocus
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
                                        value="{{ old('publisher') }}" required autocomplete="off" autofocus
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
                                        value="{{ old('Author') }}" required autocomplete="off" autofocus
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
                                        value="{{ old('date-publish') }}" required autocomplete="off" autofocus
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
                                        value="{{ old('language') }}" required autocomplete="off" autofocus
                                        placeholder="Book language">

                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- cover -->
                                <input type="file" class="dropify" data-allowed-file-extensions="jpg png jpeg" id="cover" name="cover"/>
                                <!-- status -->
                                <input type="hidden" name="status" value="avaiable">

                                <div class="form-group pt-2">
                                    <button class="btn btn-block btn-primary" type="submit">Add Book</button>
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
