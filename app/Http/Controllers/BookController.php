<?php

namespace App\Http\Controllers;

use PDF;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function __construct(Book $book)
    {
        $this->middleware('auth');
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->latest()->paginate(5);
        // return $books;
        return view('book/book_list',compact('books'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'book_language' => 'required',
            'book_description' => 'required',
        ]);
  
        $this->book->create($request->all());
   
        return redirect()->route('books.index')
                        ->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
         return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('book.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'book_name' => 'required',
            'book_language' => 'required',
            'book_description' => 'required',
        ]);
        $book->update($request->all());
  
        return redirect()->route('books.index')
                        ->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
  
        return redirect()->route('books.index')
                        ->with('success','Book deleted successfully');
    }

    /**
     * [downloadPDF description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function downloadfullPDF() {
    $books = $this->book->latest()->paginate(10);
    $pdf = PDF::loadView('book.full_row_pdf', compact('books'));    
    return $pdf->download('books.pdf');
    }
    /**
     * [downloadPDF description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function downloadPDF($id) {
        $book = $this->book->find($id);
        $pdf = PDF::loadView('book.row_pdf', compact('book'));
        return $pdf->download('book.pdf');
    }
}
