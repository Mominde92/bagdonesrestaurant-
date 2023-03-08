<?php

namespace Database\Seeders;

use App\Models\Content_type;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // $content_types = [ ['name' =>'offer' ], ['name' =>'category'] , ['name' =>'sub category'] , ['name' =>'item'] , ['name' =>'store']];
        // $content_types = json_encode($content_types);
        // $content_types = json_decode($content_types, true);
        // $content_types = array_chunk($content_types, 1000);
        // for ($i = 1; $i < (int)ceil(count($content_types) / 1000); $i++) {
        //     Content_type::insert($content_types[$i]);
        // }

        Content_type::create([
            'name' => 'offer'
        ]);

        Content_type::create([
            'name' => 'category'
        ]);
        Content_type::create([
            'name' => 'sub category'
        ]);

       Content_type::create([
            'name' => 'The Empire Strikes Back'
        ]);
        Content_type::create([
            'name' => 'item'
        ]);

        Content_type::create([
            'name' => 'store'
        ]);
    }
}
