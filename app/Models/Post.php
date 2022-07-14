<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];
    // yang di dalam array yang boleh diisi sisanya gak
    // buat ngasih tau field mana aja yg boleh diisi lanjutan di catatan.text di line 24
    // dan ada kebalikan dari yg di atas tersebut (apabila kita capek ngisi lagi field baru nya, nambahin satu satu) yaitu
    protected $guarded = ['id']; // jadi cuman id doank yg gak boleh di isi kurang lebih sperti itu
    // fillable dan guarded ini akan kepakek kalau kita mau melakukan create

    protected $with= ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('title', 'like', '%' . $filters['search'] . '%')->orWhere('body', 'like', '%' . $filters['search'] . '%');
        //  }
        // yang di atas ini dan di bawah sama aja cuman yg di bawah lebih kompleks

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
         });

         $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
            $query->where('slug', $category );
            }); // blm paham di video ke13 menit 29
        }); // ini memakai versi callback

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) =>
        $query->where('username', $author)
        )
    ); // memakai arrow function
}

    // mulai menghubungkan relasi
    public function category() // nama method nya itu sama dengan nama model nya [category]
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
