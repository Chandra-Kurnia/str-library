@extends('layouts.index')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create User</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create User</li>
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
                <h5 class="card-header">Input Data User</h5>
                <div class="card-body">

                    <!-- shows error  -->
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="">
                            <div class="card-header">
                                <h3 class="mb-1">Registrations Form</h3>
                                <p>Please enter your user information.</p>
                            </div>
                            <div class="card-body">
                                <!-- Username -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="off" autofocus
                                        placeholder="Username">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Roles -->
                                <div class="form-group">
                                    <!--
                                    <input class="form-control form-control-lg" id="roles" type="text"
                                        class="form-control @error('roles') is-invalid @enderror" name="roles"
                                        value="{{ old('roles') }}" required autocomplete="off" autofocus
                                        placeholder="Roles"> -->

                                        <select name="roles" id="roles" class=" form-control form-control-lg" required>
                                            <option value="" id="roles-opt">Roles</option>
                                            <option value="petugas">Petugas</option>
                                            <option value="siswa">Siswa</option>
                                            <script>

                                            </script>
                                        </select>

                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- address -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="off" autofocus
                                        placeholder="Address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- phone -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="off" autofocus
                                        placeholder="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- gender -->
                                <div class="form-group">
                                    <select name="gender" id="gender" class=" form-control form-control-lg" required>
                                        <option value="" id="gender-opt">gender</option>
                                        <option value="L">Laki - laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="off" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Pass -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password" minlength="5">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- C Pass -->
                                <div class="form-group">
                                    <input class="form-control form-control-lg" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password" placeholder="Password Confirm">
                                </div>

                                <div class="form-group pt-2">
                                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" required><span
                                            class="custom-control-label">By creating an account, you agree the <a
                                                href="#">terms and
                                                conditions</a></span>
                                    </label>
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
