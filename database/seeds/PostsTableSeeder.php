<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
                array(
                    [
                        'title' => "Php is awesome",
                        'alias' => "php_is_awesome",
                        'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non.",
                        'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus volutpat lectus non aliquet. Pellentesque viverra rhoncus vehicula."
                    ],
                    [
                        'title' => "Laravel 7.0",
                        'alias' => "laravel70",
                        'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non.",
                        'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus volutpat lectus non aliquet. Pellentesque viverra rhoncus vehicula."
                    ],
                    [
                        'title' => "Thanks to seeds",
                        'alias' => "seeds",
                        'intro' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non.",
                        'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse maximus volutpat lectus non aliquet. Pellentesque viverra rhoncus vehicula."
                    ]
                )
                );
    }
}
