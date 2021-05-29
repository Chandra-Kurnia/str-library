<?php

namespace App\Http\Controllers;
use App\User;
use App\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mengambil jumlah dari semua user, buku, petugas, dan siswa
        $users = User::get()->count(); //user
        $books = books::get()->count(); //buku
        $officers_count = User::where('roles', '=', 'petugas')->get()->count(); //petugas
        $students = User::where('roles', '=', 'siswa')->get()->count();//siswa

        //mengambil semua data petugas
        $officers = User::where('roles', '=', 'petugas')->get();

        //memasukan data - data count
        $datas = array($users, $books, $officers_count, $students);

        //mengarahkan user ke menus.home dan mengirimkan dara array $datas dan mengirimkan data user $officers
        return view('menus.home', ['datas' => $datas], ['officers' => $officers]);
    }
}
