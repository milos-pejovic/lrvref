<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_of_items_to_seed = 20;
        $first_names = ['John', 'Peter', 'Samuel', 'Ann', 'Susan', 'Igor', 'Frank'];
        $last_names = ['Samson', 'Johnson', 'Peterson', 'Frankson'];
        
        for ($i = 0; $i < $number_of_items_to_seed; $i++) {
            $author = new Author();
            $author->first_name = $first_names[array_rand($first_names)];
            $author->last_name = $last_names[array_rand($last_names)];
            $author->about = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit risus id elit sagittis tempor. Ut ex libero, malesuada quis vestibulum at, vehicula quis tortor. Aliquam ac molestie quam, eu tincidunt turpis. Nunc a tincidunt nisi. Mauris blandit libero quis enim tempus maximus. Donec id tempor eros. Donec rhoncus lorem id quam malesuada, et accumsan diam laoreet. Sed at dictum felis. Aliquam erat volutpat. Nulla at metus eros. Fusce pulvinar mi sit amet ipsum tincidunt, et viverra turpis lobortis. Proin dictum tortor sit amet ante tincidunt cursus. Vivamus magna orci, finibus ut dui non, rutrum lobortis est. Duis ac sem eget purus tempor rutrum. Etiam viverra lacus ut est finibus, a feugiat enim semper.';
            $author->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $author->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $author->save();
        }
        
        
    }
}
