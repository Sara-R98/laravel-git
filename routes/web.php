<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use app\http\Controllers;
use App\Models\country;
use App\Models\user;
use App\Models\Post;
use App\Models\photo;
use App\Models\video;
use App\Models\Tag;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('/contact',function(){
//     return "به صفحه ما خوش امدید";
// });

// route::get('/about',function(){
//     return "درباره ما";
// });

// route::get('/post/{id}/{name?}' , function($id,$name=null){
//     return 'ایدی برابراست با:'. "".$id . "$name";
// });
// route::get('/admin/post/example',function(){
//     $url=route('admin');
//     return "این صفحه برای مدیریت میباشد".$url;
// })->name('admin');

// route::get('admin/login', function(){
//     return "صفحه ورود مدیریت";
// });
 
// route::redirect('/admin/login', '/admin/post/example',301);

// route::prefix('user')->group(function(){
//     route::get('post/example',function(){
//         return"گروه بندی ادمین";
//     });
//     route::get('login',function(){
//         return "صفحه لاگین ";
//     });
// });

// Route::get('user/{id}', 'Show@show');
// Route::get('/posts', 'App\Http\Controllers\PostsController@index');
// Route::get('/posts', [PostsrController::class, 'index']);
// Route::resource('/posts','App\Http\Controllers\PostsController')->only(['store', 'delete']);
// Route::resource('posts/{id?}', PostsController::class);
// route::get('/show-view/{id}/{name}/{password}', [PostsController::class, 'showMyView']);
// route::get('/contact','App\Http\Controllers\PostsController@contact');
route::get('/insert' , [PostsController::class , 'insert']);
// route::get('/select' , [PostsController::class , 'select']);
// Route::get('/update' , [PostsController::class , 'updatepost']);
// Route::get('/delete' , [PostsController::class , 'deletepost']);
Route::get('posts', [PostsController::class , 'getAllPosts']);
route::get('/save-post' , [PostsController::class , 'savePost']);
route::get('update-post', [PostsController::class , 'newUpdatPost']);
route::get('delete-post',[PostsController::class ,'newDeletePost']);
route::get('data-trash' , [PostsController::class , 'workWithTrash']);
route::get('restore-post' , [PostsController::class , 'restorePost']);
route::get('force-delete-post' , [PostsController::class , 'forceDelete']);

//relationalship eloquent

//one to one relationalship

// Route::get('user/{id}/post' , function ($id){
//    $user_post=User::find($id)->post->content;
//    return $user_post;
// });

// route::get('post/{id}/user' , function($id){
//    $post_user=post::find($id)->user->email;
//    return $post_user;
// });

//one to many

// route::get('user/{id}/posts' , function($id){
//  $user_posts= user::find($id)->posts;
//   foreach ($user_posts as $post){
//      echo $post->title;
//      echo "</br>";
//   }
// });

//relationalship many to many


// route::get('user/{id}/roles' , function($id){
//    $user=user::find($id);
//    foreach ($user->roles as $role){
//       echo $role->name;
//       echo "</br>";
//    }
// });

// route::get('user/pivot' , function(){
//     $user=user::find(1);
//     foreach($user->roles as $role){
//        echo $role->pivot->created_at;
//        echo "</br>";
//     }

// });

// has many through relationship

// route::get('user/country' , function(){
//  $country=country::find(1);
//  foreach($country->posts as $post){
//     echo $post->title;
//     echo "</br>";
//  }

// });

//polymorphic relationship

// route::get('user/photos' , function(){
//    $user=User::find(1);
//    foreach($user->photos as $photo){
//       echo $photo->path;
//       echo "</br>";
//    }
// });

// route::get('post/photos' , function(){
//    $post=Post::find(10);
//    foreach($post->photos as $photo){
//       echo $photo->path;
//       echo "</br>";
//    }
// });

// route::get('photo/{id}/post' , function($id){
//   $photo=photo::find($id);
//   return $photo->imageable;

// });
// route::get('post/tags' , function(){
//  $post=Post::find(10);
//  foreach($post->tags as $tag){
//    echo $tag->name;
//    echo "</br>";
//  }

// });

// route::get('video/tags' , function(){
//    $video=video::find(1);
//    foreach($video->tags as $tag){
//      echo $tag->name;
//      echo "</br>";
//    }
  
//   });
 
//   route::get('tag/{id}/post' , function($id){
//    $tag=Tag::find($id);
//    foreach($tag->posts as $post){
//       echo $post->title;
//       echo "</br>";
//    } 
//   });

//CRUD One To Many Relationship
// route::get('create' , function(){
//  $user=User::find(1);
//  $post=new Post();
//  $post->title='یک پست جدید با رابطه one to many ';
//  $post->content='در این قسمت توضیحات مربوط به کانتنت قرار داده میشود';
//  $user->posts()->save($post);
// });

// route::get('/read', function(){
//  $user=User::find(1);
// //  dd($user);
// foreach($user->posts as $post){
//     echo $post->title;
//     echo "</br>" ; 
// }
// });

// route::get('/update' , function(){
//     $user=User::find(2);
//     $user->posts()->whereId(10)->update(['title'=>'اپدیت با CRUD' , 'content'=>'به روزرسانی توضیحات مطلب']);
// });

// route::get('/delete' , function(){
//     $user=User::find(1);
//     $user->posts()->whereId(12)->delete();
// });

//CRUD Many To Many Relationship
// route::get('/create' , function(){
//     $user=User::find(1);
//     $role=new Role();
//     $role->name='نویسنده';
//     $user->roles()->save($role);
// });

// route::get('/read' , function(){
//     $user=User::find(1);
//     foreach($user->roles as $role ){
//     echo $role->name;
//     echo "</br>" ;
// }
// });

// route::get('update' , function(){
//     $user=User::find(1);
//     if($user->has('roles')){
//         foreach($user->roles as $role){
//            if ($role->name=='Athur'){
//             $role->name='Author';
//             $role->save();
//            }

//         }
//     }
// });

// route::get('delete' , function(){
//     $user=User::find(1);
//     foreach($user->roles as $role){
//         if($role->name=='Author'){
//          $role->delete();
//         }
//     }
// });
// route::get('detach' , function(){
//     $user=User::find(1);
//     $user->roles()->detach();
// });

// route::get('attach' , function(){
//     $user=User::find(1);
//     $user->roles()->attach(1);
// });

// route::get('sync', function(){
//     $user=User::find(1);
//     $user->roles()->sync([1,2]);

// });

//CRUD Polymorphic Relationship 
// route::get('/create', function(){
//     $video=Video::find(1);
//     $video->tags()->create(['name'=>'morph video']);
// });

// route::get('/read' , function(){
//     $video=Video::find(1);
//     foreach($video->tags as $tag){
//         echo $tag->name;
//         echo "</br>";
//     }
// });

// route::get('update' , function(){
//     $video=Video::find(1);
//     $tag=$video->tags;
//     $newtags=$tag->where('id' , 3)->first();
//     $newtags->name='تگ جدید';
//     $newtags->save();
// });

// route::get('delete' , function(){
//     $video=Video::find(1);
//     $tag=$video->tags;
//     $deletedTags=$tag->where('id' , 3)->first();
//     $deletedTags->delete();
   
// });

// route::get('detach' , function(){
//     $video=Video::find(1);
//     $video->tags()->detach();
// });

// route::get('attach' , function(){
//     $video=Video::find(1);
//     $video->tags()->attach(1);
// });

// route::get('sync' , function(){
//     $video=Video::find(1);
//     $video->tags()->sync([1,2]);
// });

//Form Routes


// route::get('file' , function(){
    //dastresi be content file
    // $file=Storage::disk('public')->get('images/Tj7Dm1jpqzma9gHpKRzR8qZ3yOjAAGYIS1CmbevG.png');

    //dasresi be url file
    // echo Storage::url('images/Tj7Dm1jpqzma9gHpKRzR8qZ3yOjAAGYIS1CmbevG.png');

    //masir kamel zakhire sazi
    // echo storage_path('images/Tj7Dm1jpqzma9gHpKRzR8qZ3yOjAAGYIS1CmbevG.png');
    //braye download file
    // return Storage::disk('file')->download('Firewall.png');

// });


// Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Auth::routes(['verify'=>true]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::get('/home',['middleware'=>['auth','verified']], [HomeController::class , 'index'])->name('home');
// route::get('/home' ,[HomeController::class , 'index'])->middleware(['auth' , 'verified' ])->name('home');



///////////middleware group
route::middleware(['auth','verified'])->group(function(){
    Route::get('/home', [HomeController::class,'index']) ;
    route::resource('/posts' , PostsController::class);
	route::get('/');
    });

// route::get('/' , function(){
    //check kardan
    // $user=Auth::user();
    // $id=Auth::id();
    // if (Auth::check()){
    //     echo "Hello" . $user->name;
    //     echo "<br />";
    //     echo "User id:" . $id;
    // }else{
    //     return redirect()->to('home');
    // }
    //
    // $email='ali@gmail.com';
    // $password='123456789';
    // $auth=Auth::attempt(['email'=>$email , 'password'=>$password]);
    // dd($auth);
    //
    //faqt yekbar check mikone 
    // $email='ali@gmail.com';
    // $password='123456789';
    // $user=Auth::once(['email'=>$email , 'password'=>$password]);
    // dd($user);

//login va logout be soorate dasti
    // Auth::loginUsingId(5);
    // Auth::logout();
    
// });

// Route::get('/admin', function () {
//     echo "heeeeeeeeeeeeeello my admin";
// })->name('admin');

//////session
// route::get('session' , function(Request $request){
//     $request->session()->put(['username'=>"ali"]);
//     // return $request->session()->all();
//     return $request->session()->get('username');

// });


