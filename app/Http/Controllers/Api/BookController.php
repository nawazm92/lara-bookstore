<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Books;

class BookController extends Controller
{
    protected $messages;
    protected $rules;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic');

        $this->messages = [
            'title.required'   =>  'Book title required.',
            'author.required'  =>  'Book author name required.',
            'genre.required'    => 'Genre required',
            'description.required'    => 'Book description required',
            'publisher.required'  =>  'Name of the publisher required.',
            'pages.required'    =>  'How many pages book have?',
            'image_url.required'  =>  'Image URL required.',
            'image_url.url'  =>  'Invalid Image URL.',
            'purchase_url.required'    =>  'Where to purchase book?',
            'purchase_url.url'    =>  'Invalid Purchase URL',
        ];

        $this->rules = [
            'title' => 'required|max:256',
            'author' => 'required|max:64',
            'genre' => 'required|max:64',
            'description' => 'required',
            'publisher' => 'required',
            'pages' => 'required',
            'image_url' => 'required|url',
            'purchase_url' => 'required|url',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Auth::user()->books->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            $response['errors'] = $validator->messages();
        } else {
            $book = new Books;

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

            $response = ['message' => 'New book deatils successfully saved.'];
        }
        
        return response()->json($response);
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
        //
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
        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            $response['errors'] = $validator->messages();
        } else {
            $book = Books::find($id);

            if (!$book) {
                return response()->json(['error' => 'Invalid request, book not found in records.'], 204);
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

            $response = ['message' => 'Book deatils successfully updated.'];
        }
        
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        
        if (!$book) {
            return response()->json(['error' => 'Invalid request, book not found in records.'], 204);
        } else {
            $book->delete();
            return response()->json(['message' => 'Book has been deleted successfully.']);
        }
    }
}
