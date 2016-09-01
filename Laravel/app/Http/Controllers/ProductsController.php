<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Location;
use App\Foodtrucker;
use App\Product;
use App\Menu;
use App\MenuHasProduct;
use DB;

class ProductsController extends Controller
{
	
	public function index(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$products = DB::table('products')
 								->join('menus', function ($join) {
							        $join->on('products.menu_id', '=', 'menus.id');
							  	})
							    ->whereRaw('menus.user_id='.$user->id) 
							    ->select('products.id','products.name','products.image','products.valor','products.description')
							    ->get();
			return view('products.index', compact('products','user'));

 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
 	public function add(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$menus = DB::table('menus')->where('user_id', '=', $user->id)->get();
 			return view('products.add', compact('user','menus'));
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function cadastrar(Request $request){
 				
		//recebendo post
		$product = new \App\Product;
		$product->name       = $request->name;
	    $product->valor      = $request->valor;
	    $product->description      = $request->description;
	    $product->menu_id = $request->menu_id;
	    

	    $user = $request->user();

	    //salvando imagem
	    $destino = 'documentos/'.$product->name . $_FILES['image']['name'];
 		$arquivo_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file( $arquivo_tmp, $destino  );
		$product->image = $destino;

		$product->save();

		$menuhasproduct = new \App\MenuHasProduct;
		$menuhasproduct->menu_id = $product->menu_id;
		$menuhasproduct->product_id = $product->id;
		$menuhasproduct->active = 1;
		$menuhasproduct->save();
		
		$products = DB::table('products')
 								->join('menus', function ($join) {
							        $join->on('products.menu_id', '=', 'menus.id');
							  	})
							    ->whereRaw('menus.user_id='.$user->id) 
							    ->select('products.id','products.name','products.image','products.valor','products.description')
							    ->get();
		$status="Cadastrado com sucesso.";					    
 		return view('products.index', compact('products','user','status'));
	}
	public function view(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$product = Product::find($request->id);
			$menus = DB::table('menus')
 								->join('products', function ($join) {
							        $join->on('products.menu_id', '=', 'menus.id');
							  	})
							    ->whereRaw('products.id='.$request->id)
							    ->select('user_id') 
							    ->get();
			return view('products.view', compact('product','user','menus'));
			
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
 	public function edit(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$menus = Menu::all();
 			$product = Product::find($request->id);
 			return view('products.edit', compact('user','menus','product'));
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function editar(Request $request){
 				
		//recebendo post
		$product = Product::find($request->id);
		$product->name   = $request->name;
	    $product->description   = $request->description;
	    $product->valor = $request->valor;
	    $product->menu_id = $request->menu_id;

	    $user = $request->user();

	    //salvando imagem
	    if($request->image != null){
	    	$destino = 'documentos/'.$product->name . $_FILES['image']['name'];
	 		$arquivo_tmp = $_FILES['image']['tmp_name'];
			move_uploaded_file( $arquivo_tmp, $destino  );
			$product->image = $destino;
	    }
	   

		$product->save();
		$product = Product::find($request->id);
		$user = $request->user();
		$status="Editado com sucesso.";
		$menus = DB::table('menus')
 								->join('products', function ($join) {
							        $join->on('products.menu_id', '=', 'menus.id');
							  	})
							    ->whereRaw('products.id='.$request->id)
							    ->select('user_id') 
							    ->get();
 		return view('products.view', compact('product','user','status','menus'));

	}
}
