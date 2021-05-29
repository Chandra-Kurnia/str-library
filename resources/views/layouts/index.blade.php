<?php

$display = '';
$display2 = '';
$roles = Auth::user()->roles;

if ($roles == 'siswa') {
$display = 'd-none';
} elseif ($roles == 'petugas') {
$display2 = 'd-none';
}
?>

<!doctype html>
<html lang="en">

@section('tittle', 'DashBoard')

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
        <link href="/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/libs/css/style.css">
        <link rel="stylesheet" href="/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="/vendor/fonts/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.ttf">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.svg">
        <link rel="icon" href="/images/icon.png">

    </head>

    <title>
        @yield('tittle')
    </title>

    <body>
        <!-- ===================== Loader ================================= -->

        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <img src="images/icon.png" width="40px" class="ml-2 mr-0" alt="">
                    <a class="navbar-brand" href="/">SteachLib</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                        src="/images/user.png" alt="" class="user-avatar-md rounded-circle"></a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                    aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info text-center">
                                        <img
                                        src="/images/user.png" alt="" class="rounded-circle" width="80px">
                                        <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }}</h5>
                                    </div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fas fa-power-off mr-2"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->
            <div class="nav-left-sidebar sidebar-dark">
                <div class="menu-list">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="d-xl-none d-lg-none" href="">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-divider">
                                    Menu
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <b><a href="/" class="text-decoration-none">Dashboard</a></b>
                                    </div>
                                </li>
                                <li class="nav-item {{ $display }}">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-2" aria-controls="submenu-2"><i
                                            class="fa fas fa-users"></i>Users</a>
                                    <div id="submenu-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="/create-user">Create User <span
                                                        class="badge badge-secondary">New</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                                    data-target="#submenu-2-2" aria-controls="submenu-2-2">View Users</a>
                                                <div id="submenu-2-2" class="collapse submenu" style="">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="/petugas">Petugas</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="/siswa">Siswa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-3" aria-controls="submenu-3"><i
                                            class=" fas fa-book"></i>Books</a>
                                    <div id="submenu-3" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                            <li class="nav-item {{ $display }}">
                                                <a class="nav-link" href="/create-book">Add Book</a>
                                            </li>
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                                data-target="#submenu-11" aria-controls="submenu-11">Books Category</a>
                                            <div id="submenu-11" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'adventure' }}">Adventure</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'children' }}">Children’s</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'comedy' }}">Comedy</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'fantasy' }}">Fantasy</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'horor' }}">Horror</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'mistery' }}">Mistery</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'phsycological' }}">Phsycological</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'romance' }}">Romance</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'scifi' }}">Science
                                                            Fiction</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/books/category/{{ $Category = 'thriller' }}">Thriller</a>
                                                    </li>

                                                </ul>
                                            </div>
                                </li>
                            </ul>
                        </div>
                        </li>
                        <li class="nav-item {{ $display2 }}">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-9" aria-controls="submenu-9"><i class=" fas fa-server"></i>My
                                Activities</a>
                            <div id="submenu-9" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{ $display2 }}">
                                        <a class="nav-link" href="/myBorrowedBook/{{ Auth::user()->id }}">Borrowed
                                            Books</a>
                                    </li>
                                    <li class="nav-item {{ $display2 }}">
                                        <a class="nav-link" href="/unverification/{{ Auth::user()->id }}">Books
                                            Unverification</a>
                                    </li>
                                    <li class="nav-item {{ $display2 }}">
                                        <a class="nav-link" href="/myReturnedBooks/{{ Auth::user()->id }}">Books
                                            Returned</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ $display }}">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Library
                                Activities</a>
                            <div id="submenu-5" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/lib-act/borrowedBooks">Borrowed Books</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/lib-act/returnedBooks">Book Return</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/lib-act/returnVer">Return Verification</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-divider {{ $display }}">
                            Features
                        </li>
                        <li class="nav-item {{ $display }}">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                data-target="#submenu-6" aria-controls="submenu-6"><i class=" fas fa-laptop"></i>
                                Account </a>
                            <div id="submenu-6" class="collapse submenu" style="">
                                <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="/update-account/{{ Auth::user()->id }}">Update My
                                            Account</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        </ul>
                </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    @yield('content')
                </div>
            </div>
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->



        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/libs/js/main-js.js"></script>
        <!-- chart chartist js -->
        <script src="/vendor/charts/chartist-bundle/chartist.min.js"></script>
        <!-- sparkline js -->
        <script src="/vendor/charts/sparkline/jquery.sparkline.js"></script>
        <!-- morris js -->
        <script src="/vendor/charts/morris-bundle/raphael.min.js"></script>
        <script src="/vendor/charts/morris-bundle/morris.js"></script>
        <!-- chart c3 js -->
        <script src="/vendor/charts/c3charts/c3.min.js"></script>
        <script src="/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
        <script src="/vendor/charts/c3charts/C3chartjs.js"></script>
        <script src="/libs/js/dashboard-ecommerce.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
