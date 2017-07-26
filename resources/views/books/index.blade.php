@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Books 
                    <a href="{{ url('books/create') }}" class="btn btn-primary btn-sm pull-right">Add New Book</a>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        @foreach ($books as $book)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ $book->image_url }}" alt="{{ $book->title }}">
                                <div class="caption">
                                    <h3>{{ $book->title }}</h3>
                                    <p>{{ $book->description }}</p>
                                    <p><a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-primary btn-sm " role="button">Edit</a> 
                                    <a href="{{ url('books/'.$book->id.'/delete') }}" class="btn btn-danger btn-sm" role="button">Delete</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
