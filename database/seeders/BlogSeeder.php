<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $tagsArray = ['Laravel', 'PHP', 'Backend', 'Programming', 'Tech', 'Coding', 'Development'];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('blogs')->insert([
                'title' => 'Blog Post ' . $i,
                'summary' => 'Lorem ipsum dolor adipisicing minim sint cillum sint',
                'content' => 'Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.',
                'reads' => rand(0, 1000),
                'tags' => implode(',', array_rand(array_flip($tagsArray), rand(2, 5))),
                'read_time' => rand(1, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

