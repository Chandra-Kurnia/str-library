<?php

namespace App\Http\Controllers;

use App\books;
use App\borrow;
use App\returnedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
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
    public function index($category)
    {
        //
        $books = DB::table('books')->where(['category'=>$category, 'status' => 'avaiable'])->paginate(5);
        return view('books.index', ['books' => $books], ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This Is Validation
        $this->validate($request, [
            'tittle' => ['required', 'string', 'max:100'],
            'publisher' => ['required', 'string', 'max:30'],
            'Author' => ['required', 'string', 'max:30'],
            'date-publish' => ['required', 'string', 'max:30'],
            'language' => ['required', 'string', 'max:15'],
            'category' => ['required', 'string', 'max:15'],
            'status' => ['required', 'string', 'max:15'],
         ]);

        $file = $request->file('cover');
        //get File Information
        $ex =  $file->getClientOriginalExtension();
        //Create book_id, slug, date added, name_file
        $slug = str_replace(' ', '-', $request['tittle']);
        $slug = strtolower($slug);
        $dateAdded = date('d-m-Y-i-s');
        $id = str_replace('-', '', $dateAdded);
        $name_file = $id.'.'.$ex;

        //upload file
        $target_upload = 'images/cover-books';
        $file->move($target_upload,$name_file);

        DB::table('books')->insert([
            'book_id' => $id,
            'title' => $request['tittle'],
            'slug' => $slug,
            'publisher' => $request['publisher'],
            'author' => $request['Author'],
            'date_publish' => $request['date-publish'],
            'date_added' => $dateAdded,
            'category' => $request['category'],
            'language' => $request['language'],
            'cover' => $name_file,
            'status' => $request['status'],
        ]);

        // return $this->create();
        $category = $request['category'];
        return $this->index($category);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($books)
    {
        //
        $book = DB::table('books')->where('book_id', $books)->get();
        return view('books.detail', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit($books)
    {
        //
        $book = DB::table('books')->where('book_id', $books)->get();
        return view('books.update', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tittle' => ['required', 'string', 'max:100'],
            'publisher' => ['required', 'string', 'max:30'],
            'Author' => ['required', 'string', 'max:40'],
            'date-publish' => ['required', 'string', 'max:30'],
            'language' => ['required', 'string', 'max:15'],
            'category' => ['required', 'string', 'max:15'],
            // 'status' => ['required', 'string', 'max:15'],
         ]);

        $slug = str_replace(' ', '-', $request['tittle']);
        $slug = strtolower($slug);
        $dateAdded = date('d-m-Y-i-s');

        DB::table('books')->where('book_id', $id)->update([
            'title' => $request['tittle'],
            'slug' => $slug,
            'publisher' => $request['publisher'],
            'author' => $request['Author'],
            'date_publish' => $request['date-publish'],
            'category' => $request['category'],
            'language' => $request['language'],
        ]);

        $category = $request['category'];
        return $this->index($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('books')->where('book_id', $id)->delete();
        return redirect('home');
    }

    public function borrow(request $request, $id){
        //get user_id & book_id
        $user_id = $request['user_id'];
        $book_id = $id;

        DB::table('borrows')->insert([
            'user_id' => $user_id,
            'book_id' => $id,
            'status' => 'borrow',
        ]);

        return redirect('/books/category/horor');
    }

    public function showBorrowed($user){
        //$borrowed = DB::table('borrows')->where('user_id', $user)->get();

        $borrowed = borrow::join('users', 'users.id', '=', 'borrows.user_id')
              ->join('books', 'books.book_id', '=', 'borrows.book_id')
              ->where('borrows.status', '=', 'borrow')
              ->where('borrows.user_id', '=', $user)
              ->get(['users.name','books.title', 'books.cover', 'borrows.borrow_date', 'borrows.id']);

              return view('user_act\MyBorrowedBook', ['bookDatas' => $borrowed]);
    }

    public function clear(){
        borrow::truncate();
        returnedBook::truncate();

        return \redirect('lib-act/returnedBooks');
    }

    public function search(request $request, $category){
        $keyword = $request['keyword'];

        $books = DB::table('books')->where(['category'=>$category, 'status' => 'avaiable'])->get();
        return view('books.index', ['books' => $books], ['category' => $category]);
    }
}

