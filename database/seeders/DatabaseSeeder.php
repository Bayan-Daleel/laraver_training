<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use \App\Models\User;
use App\Models\Category;
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
       // User::truncate();
        //Category::truncate();
        //Post::truncate();

        $bayan=User::factory()->create([
            'name' => 'bayan',
            'user_name' => 'bayandl',
        ]);

        $ahmed=User::factory()->create([
          'name' => 'ahmed',
          'user_name' => 'ahmed1',
      ]);
        $category=Category::factory()->create();
        $category2=Category::factory()->create();

        Post::factory(5)->create([
           'user_id' => $bayan->id,
           'category_id' => $category2->id
        ]);

        Post::factory(5)->create([
          'user_id' => $ahmed->id,
          'category_id' => $category->id
       ]);
      //$user=User::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       // User::factory(10)->create();
        /* Category::create([
       'name' => 'html',
        'slug' => 'HTML',
        ]);

        Post::create([
            'title'=>'my third post',
   'excerpt'=>'jfh      ,'body'=>'kkdbdbnjdn',
   'slug'=>'my third post',
   'category_id'=>'1',
   'user_id'=>'1'
             ]);
              */
        
  //  Category::factory(10)->create();
    //  Post::factory(10)->create();
    }
}
