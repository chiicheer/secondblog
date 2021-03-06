<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;//←Storageフォルダの中にあるpublicフォルダにpublicフォルダの中にあるimgフォルダ内の写真をimportする。
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Str;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);//←homeページとshow意外はログインしないとできないよって事。
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.create')->with('categories', $categories)
                                    ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form-validation
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'featured_img' => 'required|image',
            'category_id' => 'required',
        ]);

        //store into db
        $featured = $request->featured_img;
        $featured_new_name = time().$featured->getClientOriginalName(); //←オリジナルの名前を使うという事
        //$featured->move('uploads/posts',$featured_new_name);
        Storage::disk('public')->put($featured_new_name, file_get_contents($featured));

        //Mass Assignment→valueをダイレクトにpostデータベースのカラムにアサインする。
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'featured_image' => asset('storage/'.$featured_new_name),
            'category_id' => $request->category_id,
            'user_id' => $user_id
        ]);

        $post->tags()->attach($request->tags);

        $post->save();

        Session::flash('success','Post Created Successfully');

        //return redirect
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post',$post)
                                 ->with('categories', Category::all())
                                 ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //form-validation
        //$this->validate($request,[
        //    'title' => 'required',
        //    'description' => 'required',
        //]);

        //update into db
        if($request->hasFile('featured_img')){
            $featured = $request->featured_img;
            $featured_new_name = time().$featured->getClientOriginalName(); //←オリジナルの名前を使うという事
            Storage::disk('public')->put($featured_new_name, file_get_contents($featured));
            $post->featured_image = asset('storage/'.$featured_new_name);
        }

        //$post->title = $request->title;
        //$post->description = $request->description;
        //$post->save();

        $post->fill($request->input())->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post Updated Successfully');

        //return redirect
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        //Storage::disk('public')->delete($post->featured);

        Session::flash('success','Post Trashed Successfully');
        return redirect()->route('post.index');
    }

    public function trashed(){

        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$posts);
    }

    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored Successfully');
        return redirect()->route('post.index');
    }

    public function kill($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Deleted Successfully');
        return redirect()->route('post.index');
    }

}
