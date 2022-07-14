<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
   private static $blog_posts = [
    [
        "title" => "Judul Post Pertama",
        "slug" => "Judul-post-pertama",
        "author" => "Raihan hamdani",
        "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident, dolorum qui! Adipisci vitae perferendis assumenda eos excepturi laboriosam, corrupti inventore? Expedita asperiores soluta autem quae aperiam ducimus nesciunt iure dicta reprehenderit recusandae quasi molestiae atque, libero, explicabo sint earum adipisci! Aliquam reprehenderit iusto rerum dolore rem magni perferendis, facilis obcaecati aperiam minus, dolorum odio sapiente architecto. Expedita exercitationem ducimus tempora voluptatum. Vero porro illo aut atque nobis accusantium natus provident totam, nisi inventore rem nemo impedit iure excepturi deleniti minus?",
    ],
    [
        "title" => "Judul Post Kedua",
        "slug" => "Judul-post-kedua",
        "author" => "Raihan",
        "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio quia quaerat provident doloribus ratione neque expedita deleniti sapiente possimus aperiam sit autem, magnam, quae ipsa explicabo nihil illum consequatur! Fugiat tempora distinctio voluptatum laborum, minus quam nobis incidunt voluptatibus? Perspiciatis nostrum excepturi dolores ex cumque, magnam maiores illo facere ratione dignissimos? Voluptate modi dolorem, corporis deleniti reiciendis quia culpa tenetur similique suscipit sunt in iste exercitationem neque eius et consequuntur ipsam non laudantium! Magni deleniti ex fuga veniam aspernatur corrupti possimus culpa. Dolores laborum accusantium quos nisi voluptate quasi et, non eaque minus laudantium excepturi veniam maiores laboriosam, perferendis ratione.",
    ]
    ];

    // Methpod all

    public static function all()
    {
        // karna dia static kita butuh keyword self
        return collect(self::$blog_posts);
    }

    public static function find($slug)
   {
    // cara baca yang di bawah ini => Ambil dulu semua posts nya terrus kita looping satu satu nanti kita repentasikan sebagai $p, nah terus nanti kita lihat, kalau slug nya sama dengan slug yang dikirim ke parameter maka masukkan postingan tsb ke dalam $post (kalau ketemu), di akhiri dengan return $post

    $posts = static::all();
    return $posts->firstWhere('slug', $slug); // jadi ambil semua post yang bentuk nya collection lalu cari yg pertama di temukan dimana slugnya sama dengan $slug
   }
}
