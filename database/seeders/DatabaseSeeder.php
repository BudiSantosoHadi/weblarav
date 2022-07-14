<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Raihan',
            'username' => 'Reydan',
            'email' => 'Rey@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);

        // User::create([
        //     'name' => 'Hamdani',
        //     'email' => 'dan@gmail.com',
        //     'password' => bcrypt('123')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Progamming',
            'slug' => 'web-progamming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Games',
            'slug' => 'games'
        ]);
        Category::create([
            'name' => 'Music',
            'slug' => 'music'
        ]);
        Category::create([
            'name' => 'Movie',
            'slug' => 'movie'
        ]);





        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'excerpt pertama',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit veniam libero adipisci odit, sequi laboriosam possimus error recusandae natus asperiores, quod ad doloribus. Rem excepturi, quis labore quidem dicta alias laborum? Ab ex consectetur quaerat inventore et corrupti itaque ducimus nesciunt eius repudiandae molestias dolorem, nam maxime fugiat voluptates dicta doloremque unde possimus aliquam officia adipisci iure? Neque temporibus sit quos, nihil maiores accusantium corporis eos nam velit. Veniam, minima perspiciatis. Doloribus accusantium similique aliquid nulla totam dolor officiis pariatur ipsa eligendi voluptate, minus cupiditate rem culpa id architecto, minima cum. Ratione unde ullam dicta incidunt omnis, itaque necessitatibus non!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'excerpt kedua',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit veniam libero adipisci odit, sequi laboriosam possimus error recusandae natus asperiores, quod ad doloribus. Rem excepturi, quis labore quidem dicta alias laborum? Ab ex consectetur quaerat inventore et corrupti itaque ducimus nesciunt eius repudiandae molestias dolorem, nam maxime fugiat voluptates dicta doloremque unde possimus aliquam officia adipisci iure? Neque temporibus sit quos, nihil maiores accusantium corporis eos nam velit. Veniam, minima perspiciatis. Doloribus accusantium similique aliquid nulla totam dolor officiis pariatur ipsa eligendi voluptate, minus cupiditate rem culpa id architecto, minima cum. Ratione unde ullam dicta incidunt omnis, itaque necessitatibus non!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'excerpt ketiga',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit veniam libero adipisci odit, sequi laboriosam possimus error recusandae natus asperiores, quod ad doloribus. Rem excepturi, quis labore quidem dicta alias laborum? Ab ex consectetur quaerat inventore et corrupti itaque ducimus nesciunt eius repudiandae molestias dolorem, nam maxime fugiat voluptates dicta doloremque unde possimus aliquam officia adipisci iure? Neque temporibus sit quos, nihil maiores accusantium corporis eos nam velit. Veniam, minima perspiciatis. Doloribus accusantium similique aliquid nulla totam dolor officiis pariatur ipsa eligendi voluptate, minus cupiditate rem culpa id architecto, minima cum. Ratione unde ullam dicta incidunt omnis, itaque necessitatibus non!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);


        // Post::create([
        //     'title' => 'Judul KeEmpat',
        //     'slug' => 'judul-kempat',
        //     'excerpt' => 'excerpt keempat',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit veniam libero adipisci odit, sequi laboriosam possimus error recusandae natus asperiores, quod ad doloribus. Rem excepturi, quis labore quidem dicta alias laborum? Ab ex consectetur quaerat inventore et corrupti itaque ducimus nesciunt eius repudiandae molestias dolorem, nam maxime fugiat voluptates dicta doloremque unde possimus aliquam officia adipisci iure? Neque temporibus sit quos, nihil maiores accusantium corporis eos nam velit. Veniam, minima perspiciatis. Doloribus accusantium similique aliquid nulla totam dolor officiis pariatur ipsa eligendi voluptate, minus cupiditate rem culpa id architecto, minima cum. Ratione unde ullam dicta incidunt omnis, itaque necessitatibus non!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
