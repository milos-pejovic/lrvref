<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Book;
use App\Author;

class BookSeeder extends Seeder
{
    
    private function create_random_title() {
        $title = '';
	$words = ['Silmarillion', 'Master', 'Lord', 'Idiot', 'Throne', 'Dragon', 'Ring', 'Battle', 'Game', 'War', 'Sword', 'Magic', 'Horse', 'Steed', 'King', 'Princess', 'Prince', 'Quest'];
	$number_of_title_words = rand(2, 5);

	for ($i = 0; $i < $number_of_title_words; $i++) {
            $word_index = array_rand($words);
            $title .= $words[$word_index] . ' ';
            array_splice($words, $word_index, 1);
	}
	$title = trim($title);
	return $title;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_items_to_seed = 100;
        $author_ids = App\Author::pluck('id');
        
        for ($i = 0; $i < $number_of_items_to_seed; $i++) {
            $book = new Book();
            $book->title = $this->create_random_title();
            $book->about = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit risus id elit sagittis tempor. Ut ex libero, malesuada quis vestibulum at, vehicula quis tortor. Aliquam ac molestie quam, eu tincidunt turpis. Nunc a tincidunt nisi. Mauris blandit libero quis enim tempus maximus. Donec id tempor eros. Donec rhoncus lorem id quam malesuada, et accumsan diam laoreet. Sed at dictum felis.';
            $book->author_id = $author_ids[rand(0, count($author_ids) - 1)];
            $book->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $book->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $book->save();
        }
    }
}
