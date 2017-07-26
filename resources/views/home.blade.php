@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('books') }}" class="btn btn-default">View Your Books</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
