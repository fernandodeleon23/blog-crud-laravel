<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller{

	public function __construct(){
        $this->middleware('auth', ['except' => ['get_image']]);
    }

    public function index(){

    	$posts = Post::orderBy('created_at', 'desc')->get();

    	return view('admin.posts', [ 'posts' => $posts]);
    }

    public function post_edit( Request $request ){

    	$post = Post::find( $request->id );
    	$categories = Category::all();

        return view('admin.post', ['post'=>$post, 'categories'=>$categories]);
    }

    public function post_update( Request $request, $id ){

    	$post = Post::find( $id );

    	$post->title = $request->input('title');
    	$post->content = $request->input('content');
    	$post->excerpt = $request->input('excerpt');
    	$post->category_id = $request->input('category');

    	// Imagen
        if( !empty( $request->file('file0') ) ){
            $image = $this->upload( $request );

            $post->image = $image;
        }

    	$post->update();

    	return redirect()->route('post-edit', ['id' => $id])->with('message', 'Artículo actualizado!');

    }

    public function create(){

    	$categories = Category::all();
    	return view('admin.post-create', ['categories'=>$categories]);
    }

    public function save( Request $request ){

    	$post = new Post;
    	$categories = Category::all();

    	$post->title = $request->input('title');
    	$post->content = $request->input('content');
    	$post->excerpt = $request->input('excerpt');
    	$post->category_id = $request->input('category');
    	$post->user_id = Auth::id();

    	// Imagen
    	$image = $this->upload( $request );

    	$post->save();

    	return redirect()
    		->route('post-edit', ['id' => $post->id, 'categories'=>$categories])
    			->with('message', 'Artículo guardado!');
    }

    public function delete_post( $id ){
        $post = Post::find( $id );

        $post->delete();

        return redirect()
            ->route('admin-posts')->with('message', 'Artículo eliminado!');
    }

    public function upload( Request $request ){

    	$image = $request->file('file0');

    	$validate = \Validator::make($request->all(), [
    		'file0' => 'required|image|mimes:jpg,jpeg,png,gif'
    	]);

    	if( $validate->fails() ){
    		return $validate->errors();
    	}else{

    		$image_name = time().$image->getClientOriginalName();

    		\Storage::disk('images')->put($image_name, \File::get($image));

    		return $image_name;
    	}
    }

    public function get_image($filename){

        $isset = \Storage::disk('images')->exists($filename);

        if( $isset ){
            $file = \Storage::disk('images')->get($filename);

            return response($file)->header('Content-type','image/png');
        }else{
            $result = false;
            return $result;
        }

    }

}
