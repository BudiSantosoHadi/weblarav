<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

     // ini untuk telasi category
     // method yang mengarah ke post [Untuk menghubungkan categoty dan post]
    public function posts()
    {

        // kita return terus relasi nya apa [di miliki banyak] post
        return $this->hasMany(Post::class);
    }
}
