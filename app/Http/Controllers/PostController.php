<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File; 

class PostController extends Controller
{
    public function getMenu () {
        $tables = Schema::getAllTables();
        $menu = [];
        for ($i = 0; $i < count($tables); $i++){
            if($tables[$i]->Tables_in_bella == "failed_jobs"){} 
            else if ($tables[$i]->Tables_in_bella == "migrations"){} 
            else if ($tables[$i]->Tables_in_bella == "password_reset_tokens"){} 
            else if ($tables[$i]->Tables_in_bella == "users"){} 
            else if ($tables[$i]->Tables_in_bella == "personal_access_tokens"){} 
            else {
                array_push($menu, $tables[$i]->Tables_in_bella);
            }
        }
        return $menu;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::get();
        $menu = $this->getMenu();
        return view('post',compact('post','menu'));
    }

    public function getPostsApi()
    {
        $post = Post::get();
        return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $post = new Post;

        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->slug = $request->slug;
        $post->publish_status = $request->publish_status;

        $file = $request->file('image_headline');
        $filename = $file->getClientOriginalName();
        $file->storeAs('image_headline', $filename);
        $post->image_headline = $filename;

        $post->save();
        return redirect('/posts')->with('status', 'Data succesfully added !');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        $menu = $this->getMenu();
        return view('post_edit', compact('post', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, $id)
    {
        $post = Post::find($id);

        if($request->category_id){$post->category_id = $request->category_id;}
        if($request->content){$post->content = $request->content;}
        if($request->title){$post->title = $request->title;}
        if($request->excerpt){$post->excerpt = $request->excerpt;}
        if($request->slug){$post->slug = $request->slug;}
        if($request->publish_status){$post->publish_status = $request->publish_status;}

        if($request->file('image_headline')){
            File::delete(public_path('/storage/image_headline/'. $post->image_headline));
            $file = $request->file('image_headline');
            $filename = $file->getClientOriginalName();
            $file->storeAs('image_headline', $filename);
            $post->image_headline = $filename;
        }

        $post->save();
        return redirect('/posts')->with('status', 'Data succesfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);
        File::delete(public_path('/storage/image_headline/'. $post->image_headline));
        $post->delete();
        return redirect('/posts')->with('status', 'Data succesfully deleted !');
    }
}
