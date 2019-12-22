<?php

use App\book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for ($i=1; $i <= 10 ; $i++) { 
        	$arr = [
        		'book_name'     	=> 'book-'.$i,
		        'book_language' 	=> 'hindi',
		        'book_description'  => $i.'=-book description-'.$i,
        	];
        	DB::table('books')->insert($arr);
        }
    }
}
