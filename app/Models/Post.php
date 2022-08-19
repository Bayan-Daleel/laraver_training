<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected $with=['category','author'];
    protected $fillable=['title','excerpt','body','slug','category_id'];

public function category(){
   return  $this->belongsTo(Category::class);
}

public function author(){
    return  $this->belongsTo(User::class ,'user_id');
}
}
  
