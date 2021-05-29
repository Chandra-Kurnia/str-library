@extends('layouts.index')

@section('content')

<div class="ecommerce-widget">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Number Of Users</h5>
                    <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $datas[0] }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-users fa-4x"></i></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Number Of Books</h5>
                    <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $datas[1] }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-book fa-4x"></i></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Number Of Officer</h5>
                    <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $datas[2] }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span><i class=" fas fa-chess-king fa-4x"></i></span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Number Of Students</h5>
                    <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $datas[3] }}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span><i class="fas fa-chess-pawn fa-4x"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col col-sm-6">
                                <label for="">
                                    Officer Contact
                                </label>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Telp</th>
                                    <th>Sex</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Foreach Datas -->
                                @foreach ($officers as $item)
                                    <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->gender }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
