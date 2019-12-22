@extends('book.layout')  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>View Book</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('books.update',$book->id) }}" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book Name:</strong>
                <input type="text" name="book_name" class="form-control" disabled="" value="{{ $book->book_name }}" placeholder="Book Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book language:</strong>
                <input type="text" name="book_language" class="form-control" disabled="" value="{{ $book->book_language }}" placeholder="Book language">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Book description:</strong>
                <textarea class="form-control" style="height:150px" disabled="" name="book_description" placeholder="Book description">{{ $book->book_description }}</textarea>
            </div>
        </div>
    </div>
   
</form>
@endsection