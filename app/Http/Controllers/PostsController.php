<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo asset('storage/Firewall.png');
        // return 'id is'."".$id;
        $posts=Post::with('user')->get();
        return view('posts.index' , compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post=new Post();
        if( $file= $request->file('file')){
            // $name=$file->getClientOriginalName();
            $file->store('public/images');

            // $file->move('images' , $name);
            // $post->path=$name;

        }


        // echo $file->getMaxFilesize();
        // return $request->all();
        //ya in code ke faqat title ro show mikone
        // return $request->Input('title');
        //zakhire data dar db
        // $this->validate($request , [
        //   'title'=>'bail|required|min:2',
        //   'body'=>'required',   
        // ],[
        //   'title.required'=>'لطفا عنوان مطلب موردنظر خود را وارد کنید' ,
        //   'title.min'=>'تعداد کاراکترهای عنوان شما باید بیشتر از 2 کاراکتر باشد',
        //   'body.required'=>'لطفا توضیحات مطلب موردنظر خودرا واردکنید'
        // ]);

        //nemikham dade to system zakhire she mikham faqat put beshe 
        $post->title=$request->title;
        $post->content=$request->body;
        $post->user_id=1;
        $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        event(new PostViewEvent($post));
        return view('posts.show' , compact(['post']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $user=Auth::User();
        if($user->can('update' , $post)){
            return view('posts.edit' , compact(['post']));
        }else{
            return "شما اجازه ویرایش این مطلب را ندارید";
        }

        
    //     $post=Post::findOrFail($id);
    //     if(Gate::allows('edit-post' ,$post)){
    //     return view('posts.edit' , compact(['post']));
    // }else{
    //     return "شما اجازه ویرایش این مطلب را ندارید";
    // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        $post->update($request->all());
        // return redirect('posts');
        //ya
        $post->title=$request->title;
        $post->content=$request->body;
        $post->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
         return redirect('posts');
    }

//     public function showMyView($id,$name,$password){
//         // return view('pages.myView');
//         return view('pages.myView',compact(['id','name','password']));
//     }
//     public function contact(){
//         $people=['سارا','طنین','ریحان'];
//         return view('pages.contact',compact('people'));
//     }
    
//    public function insert(){
//        DB::insert('insert into posts(title , content) values(?,?)',['insertپست' , 'darj ba insert']);
//    }
//     public function select(){
//        $allposts=DB::select('select * from posts');
//        return $allposts;
//     }
//     public function updatepost(){
//         $updatedpost=DB::update('update posts set title="title updated" where id=?' ,[2] );
//         return $updatedpost;
//     }

//     public function deletepost(){
//         $deletedpost=DB::delete('delete from posts where id=?',[2]);
//         return $deletedpost;
//     }

//     public function getAllPosts(){
//         $post=Post::all();
//         return $post;
//     }
//     public function savePost(){
//         // $post= new Post();
//         // $post->title = 'پست شماره 1';
//         // $post->content = 'توضیح تست برای کانتنت' ;
//         // $post->save(); 
//         $post= post::create(['title'=>'پست شمار2' , 'content'=>'توضیح جدید']);
//     }
//     public function newUpdatPost(){
//         // $post=post::where('id' ,10 )->update(['title'=>'updated post' , 'content'=>'update content to you']);
//         $post=post::findOrFail(10);
//         $post->title='پست جدید';
//         $post->content='متن جدید';
//         $post->save();
//         return $post;
//     }
    
//     public function newDeletePost(){
//         $post=post::where('id' , 4)->delete();
        
//     }

//     public function workWithTrash(){
//         $post=post::withTrashed()->get();
//         return $post;
//     }

//     public function restorePost(){
//         $post=post::onlyTrashed()->where('id' , 4)->restore();

//     }

//     public function forceDelete(){
//         $post=post::onlyTrashed()->where('id' , 4)->forceDelete();
//     }



 }  