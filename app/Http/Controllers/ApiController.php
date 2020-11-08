<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller{
    //

    public function get_posts(){

    	$posts = Post::orderBy('created_at', 'desc')->get();

    	return json_encode( $posts, true );
    }

    public function get_post( $id ){

    	$post = Post::find( $id );

    	return json_encode( $post, true );
    }
}
