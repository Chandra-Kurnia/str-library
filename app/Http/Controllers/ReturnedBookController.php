<?php

namespace App\Http\Controllers;

use App\returnedBook;
use App\borrow;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReturnedBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($borrow_id)
    {
        //
        DB::table('returned_book')->insert([
            'borrow_id' => $borrow_id,
            'verification' => 'unverified',
            'status' => 'avaiable',
        ]);

        return \redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\returnedBook  $returnedBook
     * @return \Illuminate\Http\Response
     */
    public function show(returnedBook $returnedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\returnedBook  $returnedBook
     * @return \Illuminate\Http\Response
     */
    public function edit(returnedBook $returnedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\returnedBook  $returnedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returnedBook $returnedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\returnedBook  $returnedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(returnedBook $returnedBook)
    {
        //

    }

    public function unverification($user_id){

        $unver = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->join('returned_book', 'returned_book.borrow_id', '=', 'borrows.id')
              ->where('borrows.user_id', '=', $user_id)
              ->where('returned_book.verification', '=', 'unverified')
              ->get(['users.name','books.title', 'books.cover', 'returned_book.return_date', 'borrows.id', 'returned_book.borrow_id']);

        return view('user_act.verification_book', ['bookDatas' => $unver]);
    }

    public function showReturned($user_id){
        $returned = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->join('returned_book', 'returned_book.borrow_id', '=', 'borrows.id')
              ->where('borrows.user_id', '=', $user_id)
              ->where('returned_book.verification', '=', 'verified')
              ->get(['users.name','books.title', 'books.cover', 'returned_book.return_date', 'borrows.id', 'borrows.borrow_date']);

        return view('user_act.returnedBooks', ['bookDatas' => $returned]);
    }

    public function cancelReturn($borrow_id){
        DB::table('returned_book')->where('borrow_id', $borrow_id)->delete();

        return \redirect('/');
    }
}
