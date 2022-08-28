<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;
use function PHPSTORM_META\map;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\Slack\SlackRecord;
use App\Http\Controllers\InvController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserContraller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentContraller;
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
Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('posts',PostController::class)->only(
   ['show']);


//Route::get('/posts/{post:slug}', [PostController::class, 'show']
//$post_content=Post::findOrFail($post->id);
//ddd($post_content);

//);


/*Route::get('/categories/{category:slug}', function ( Category $category)
{
   return view('posts.index',[
      'posts'=>$category->posts
      //->load(['category','author'])
   ]);
  // $post_content=Post::findOrFail($post->id);
});*/

Route::get('users', [UserContraller::class, 'index']);

Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'index'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('users', [UserContraller::class, 'index']);

Route::post('posts/{post:slug}/comments',[PostCommentContraller::class,'store']);
Route::resource('categories',CategoryController::class);

Route::get('admin/posts/create',[PostController::class,'create']);
    //->middleware('permissions');

Route::post('admin/posts',[PostController::class,'store']);
    //->middleware('permissions');


/*Route::get('/ping',function () {
    $mailchimp = new ApiClient();
    $mailchimp->setConfig([
        'apiKey' => '996111257288db0a8311612fed59c3fd-us14',
        'server' => 'us14'
    ]);
   // $response = $mailchimp->ping->get();
    $response=$mailchimp->lists->getAllLists();
    dd($response);
});*/
Route::post('newsletter',function (){
   // dd('hello');
    //dd(request()->all());
    request()->validate([
        'email'=>'required|email'
    ]);
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
    ]);
  //  $response = $mailchimp->ping->get();
    //$response=$mailchimp->lists->getAllLists();
   // $response=$mailchimp->lists->getList('a4f031b94f');
    try {
        $response = $mailchimp->lists->addListMember('a4f031b94f', [
            "email_address" => request('email'),
            "status" => "subscribed",]);
      //  dd($response);
    }
    catch (Exception $exception){
   throw ValidationException:: withMessages([
    'email'=>'this email could not add to our lest ....'
]);
    }
  //  dd( $response=$mailchimp->lists->getList('a4f031b94f'));

    return redirect('/')->with('success','your successfully subscribe for new letter');
   // dd($response);

});

Route::get('/author/{author:user_name}', function (User $author)
{
   return view('posts.index',[
      'posts'=>$author->posts
      //->load(['category','author'])
   ]);
  // $post_content=Post::findOrFail($post->id);
});

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
