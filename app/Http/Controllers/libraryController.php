<?php

namespace App\Http\Controllers;

use App\books;
use App\borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class libraryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBorrowed()
    {
        $borrowed = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->where('borrows.status', '=', 'borrow')
              ->get(['users.name','books.title', 'books.cover', 'borrows.borrow_date']);

        $borrow_count = borrow::get()->count();

        return view('lib-act.showBorrowed', ['bookDatas' => $borrowed], ['borrow_count' => $borrow_count]);
    }

    public function showReturned()
    {
        $returned = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->join('returned_book', 'returned_book.borrow_id', '=', 'borrows.id')
              ->where('returned_book.verification', '=', 'verified')
              ->get(['users.name','books.title', 'books.cover', 'borrows.borrow_date', 'returned_book.return_date']);

        return view('lib-act\showReturned', ['bookDatas' => $returned]);
    }

    public function returnVer()
    {
        $ver = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->join('returned_book', 'returned_book.borrow_id', '=', 'borrows.id')
              ->where('returned_book.verification', '=', 'unverified')
              ->get(['users.name','books.title', 'books.cover', 'borrows.borrow_date', 'returned_book.return_date', 'returned_book.borrow_id']);

        return view('lib-act\returnVer', ['bookDatas' => $ver]);
    }

    public function verify($borrow_id)
    {
        $book_borrowed = DB::table('borrows')->where('id', $borrow_id)->get();
        foreach ($book_borrowed as $book) {
            $book_id =  $book->book_id;
        }

        DB::table('borrows')->where('id', $borrow_id)->update([
            'status' => 'returned',
        ]);

        DB::table('returned_book')->where('borrow_id', $borrow_id)->update([
                'verification' => 'verified',
            ]);

        DB::table('books')->where('book_id', $book_id)->update([
                    'status' => 'avaiable',
                ]);

                return $this->returnVer();
    }
}
