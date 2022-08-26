<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Fragment\FragmentUriGenerator;

class comment extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $fillable = [
        'user_id',
        'body',
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
