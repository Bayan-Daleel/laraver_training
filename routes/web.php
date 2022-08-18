<?php

use App\Models\Post;
use App\Models\Category;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\Slack\SlackRecord;
use App\Http\Controllers\InvController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserContraller;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\CategoryController;
use SebastianBergmann\Comparator\DoubleComparator;
use League\CommonMark\Extension\FrontMatter\Data\LibYamlFrontMatterParser;
use Spatie\LaravelIgnition\Solutions\UseDefaultValetDbCredentialsSolution;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PostController::class, 'index']);
Route::resource('posts',PostController::class)->only(
   ['show']);



//Route::get('/posts/{post:slug}', [PostController::class, 'show']    
//$post_content=Post::findOrFail($post->id);
//ddd($post_content);
 
//);


Route::get('/categories/{category}', function ( Category $category)   
{
   return view('posts.index',[
      'posts'=>$category->posts]);
  // $post_content=Post::findOrFail($post->id);
}); 

Route::get('users', [UserContraller::class, 'index']);
 
Route::get('users/invoke', InvController::class);

//Route::resource('categories',CategoryController::class); 

Route::get('test', function(){ 
   Post::create(['title'=>'my first post',
   'excerpt'=>'jfhvjfvjdfvfdv','body'=>'kkdbdbnjdn',
   'slug'=>'my first post','category_id'=>'2']);
  Post::create(['title'=>'my second post',
   'excerpt'=>'jfhvjfvjdfvfdv','body'=>'kkdbdbnjdn',
   'slug'=>'my second post','category_id'=>'1']);
   Post::create(['title'=>'my third post',
   'excerpt'=>'jfhvjfvjdfvfdv','body'=>'kkdbdbnjdn',
   'slug'=>'my third post','category_id'=>'2']);
   
  return 'Post created';
   /*  $post1=Post::find(1);
$post1 */

   });
