<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
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
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            'title'=> 'required',
            'article'=> 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();

        $slug =  Str::slug($data['title'], ' || ');
        //Cerca se esiste già un post con questo slug


        $new_post = new Post();
        $new_post->slug = $slug;
        
        if(array_key_exists('image',$data)){
            $cover_path = Storage::put('covers',$data['image']);
            $data['cover']= $cover_path;
        }

        $new_post->fill($data);
        $new_post->save();

        if(array_key_exists('tags',$data)){

            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $tags = Tag::all();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $request->validate([
            'title'=> 'required',
            'article'=> 'required',
            'image'=> 'nullable|image'
        ]);

        $data=$request->all();
        if(array_key_exists('image',$data)){
            $cover_path = Storage::put('covers',$data['image']);
            Storage::delete($post->cover);
            $data['cover']= $cover_path;
        }
        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->cover);
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('admin.posts.index');
    }
}
