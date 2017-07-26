<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BookController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = \Auth::user()->books;
        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $messages = [
            'title.required'   =>  'You must enter book title.',
            'author.required'  =>  'Enter the name of the book author.',
            'publisher.required'  =>  'Enter the name of the publisher.',
            'image_url.required'  =>  'Image URL required.',
            'image_url.url'  =>  'Enter valid Image URL.',
        ];

        $this->validate($request, [
            'title' => 'required|max:256',
            'genre' => 'required|max:64',
            'author' => 'required|max:64',
            'image_url' => 'required|url',
        ], $messages);

        if ($bookId = $request->get('book_id')) {
            $book = Books::find($bookId);
        } else {
            $book = new Books;
        }

        $book->user_id = \Auth::user()->id;
        $book->title = $request->get('title');
        $book->genre = $request->get('genre');
        $book->description = $request->get('description');
        $book->author = $request->get('author');
        $book->publisher = $request->get('publisher');
        $book->pages = $request->get('pages');
        $book->image_url = $request->get('image_url');
        $book->purchase_url = $request->get('purchase_url');

        $book->save();

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Books::find($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Books::find($id)->delete();

        return redirect('books');
    }
}
