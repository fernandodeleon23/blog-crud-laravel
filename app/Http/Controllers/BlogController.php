<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller{
    //

    public function index(){

    	$posts = Post::orderBy('created_at', 'desc')->get();

    	return view('blog.home', [ 'posts' => $posts]);
    }

    public function single_post( $id ){

    	$post = Post::find( $id );

    	return view('blog.post', ['post'=>$post]);
    }
}
