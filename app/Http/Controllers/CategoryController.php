<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller{

	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$categories = Category::all();

    	return view('admin.categories', ['categories'=>$categories]);
    }

    public function category_edit( Request $request ){

    	$category = Category::find( $request->id );

    	return view('admin.category', ['category'=>$category]);
    }

    public function category_update( Request $request, $id ){

    	$category = Category::find( $id );

    	$category->name = $request->input('name');

    	$category->update();

    	return redirect()
    		->route('category-edit', ['id' => $id])
    			->with('message', 'Categoría actualizada!');
    }

    public function category_create(){

        return view('admin.category-create');
    }

    public function category_save( Request $request ){

        $category = new Category;

        $category->name = $request->input('name');

        $category->save();

        return redirect()
            ->route('category-edit', ['id' => $category->id])
                ->with('message', 'Categoría creada!');
    }
}
