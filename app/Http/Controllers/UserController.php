<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller{
    //

    public function pruebas( Request $request  ){
    	return "Acción desde Pruebas User";
    }

    public function register( Request $request ){

    	$data = array(
    		'status' => 'error',
    		'code' => 400,
    		'message' => 'El usuario no se ha podido crear.'
    	);

    	return response()->json( $data, $data['code'] );
    }

    public function login( Request $request ){
    	return "Controlador de login";
    }
}
