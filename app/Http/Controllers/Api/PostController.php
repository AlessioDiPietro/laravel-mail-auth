<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::paginate(4);
        return response()->json([
            'results' => $posts,
            'success'=> true
        ]);
    }

   

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $post = Post::where('slug', $slug)->witch('category','tags')->first();
        if($post){
            
            return response()->json([
                'results' => $post,
                'success' => true
            ]);
        }

        return response()->json([
            'results' => 'not found',
            'success' => false
        ]);
    }

}   
