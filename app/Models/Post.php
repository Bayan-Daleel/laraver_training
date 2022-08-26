<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\FuncCall;

use App\Http\Requests;

class Post extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected $with=['category','author','comments'];
    protected $fillable=['title','excerpt','body','slug','category_id'];

public function category(){
   return  $this->belongsTo(Category::class);
}

public function author(){
    return  $this->belongsTo(User::class ,'user_id');
}

public function comments(){
    return $this->hasMany( comment::class);
}
public function scopeFilter($query,array $filters)
{
    $query->when($filters ['search'] ?? false , function ($query,$search){
        $query->where(fn($query)=>
        $query->where('title','like', '%' .$search .'%')
            ->orwhere('body','like', '%' .$search .'%')
        );
    });

}
}

