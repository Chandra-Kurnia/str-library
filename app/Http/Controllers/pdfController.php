<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\borrow;

class pdfController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function print()
    {
        $returned = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->join('returned_book', 'returned_book.borrow_id', '=', 'borrows.id')
              ->where('returned_book.verification', '=', 'verified')
              ->get(['users.name','books.title', 'books.cover', 'borrows.borrow_date', 'returned_book.return_date']);

        $pdf = PDF::loadview('print', ['bookDatas' => $returned])->setPaper('A3', 'potrait');
        return $pdf->stream();

        redirect('lib-act/returnedBooks');
    }
}
