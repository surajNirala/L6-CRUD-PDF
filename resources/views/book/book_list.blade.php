@extends('book.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Book List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New book</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-pending" href="{{ route('downloadfullPDF') }}">Download PDF</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th scope="col">#</th>
		    <th scope="col">Book Name</th>
		    <th scope="col">Book Language</th>
		    <th scope="col">Description</th>
		    <th scope="col">Status</th>
            <th width="300px">Action</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($books as $book)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $book->book_name }}</td>
            <td>{{ $book->book_language }}</td>
            <td>{{ $book->book_description }}</td>
            <td>
				@if ($book->status == 1)
				<a class="btn btn-success" href="{{ route('books.show',$book->id) }}">Active</a>
				@elseif($book->status == 2)	
				<a class="btn btn-danger" href="{{ route('books.show',$book->id) }}">Inactive</a>
				@else
				<a class="btn btn-pending" href="{{ route('books.show',$book->id) }}">Pending</a>
				@endif	
            </td>
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
   					
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <br>
            	<a class="btn btn-warning" href="{{action('BookController@downloadPDF', $book->id)}}">PDF</a>
            </td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </table>
  
    {!! $books->links() !!}
      
@endsection