@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('books') }}" class="btn btn-sm btn-info">&larr; List of Books</a>
            <div class="clearfix"><br/></div>
            <div class="panel panel-default">
                <div class="panel-heading">Update Book</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      <form method="post" action="{{ url('books') }}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $book->title }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Genre</label>
                                <select name="genre" class="form-control">
                                    <option value="Suspense" {{ $book->genre == 'Suspense' ? 'selected' : '' }}>Suspense</option>
                                    <option value="Drama" {{ $book->genre == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Romance" {{ $book->genre == 'Science' ? 'selected' : '' }}>Science</option>
                                    <option value="NonFiction" {{ $book->genre == 'NonFiction' ? 'selected' : '' }}>NonFiction</option>
                                    <option value="Other" {{ $book->genre == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $book->author }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Publisher</label>
                                <input type="text" name="publisher" class="form-control" placeholder="Publisher" value="{{ $book->publisher }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Pages</label>
                                <input type="number" name="pages" class="form-control" placeholder="Pages" value="{{ $book->pages }}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" placeholder="Description"> {{ $book->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Image URL</label>
                                <input type="text" name="image_url" class="form-control" placeholder="Image URL" value="{{ $book->image_url }}">
                            </div>
                            
                            <div class="form-group">
                                <label>Purchase URL</label>
                                <input type="text" name="purchase_url" class="form-control" placeholder="Purchase URL" value="{{ $book->purchase_url }}">
                            </div>

                            <input type="hidden" name="book_id" value="{{ $book->id }}" />
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection