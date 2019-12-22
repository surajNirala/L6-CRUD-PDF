<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $table = 'books';
	protected $primaryKey  = 'id';
    protected $fillable = ['book_name','book_language','book_description','status'];

    public $timestamps = true;
}
