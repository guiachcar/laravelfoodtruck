<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Foodtrucker;
use App\User;
use DB;
use App\Menu;
use App\Product;

class MenusController extends Controller
{
	public function index(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$menus = Menu::where('user_id',$user->id)->get();
			return view('menus.index', compact('menus','user'));

 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
 	public function add(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$foodtruckers = Foodtrucker::where('user_id',$user->id)->get();
 			if($foodtruckers!=NULL){
 				return view('menus.add', compact('user','foodtruckers'));
 			}else{
 				$status = "Você precisa criar um Food Trucker para criar Cardápios";
 				return view('menus.index', compact('user','status'));
 			}
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function cadastrar(Request $request){
 				
		//recebendo post
		$menu = new \App\Menu;
		$menu->name       = $request->name;
	    $menu->description      = $request->description;
	    $user = $request->user();
	    $menu->user_id = $request->user_id;
	    $menu->foodtrucker_id = $request->foodtrucker_id;

		$menu->save();
		$menus = Menu::where('user_id',$user->id);
		$status="Cadastrado com sucesso.";					    
 		return view('menus.index', compact('user','status','menus'));
	}
	
 	public function edit(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$menus = Menu::find($request->id);
 			return view('menus.edit', compact('user','menus'));
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function editar(Request $request){
 				
		//recebendo post
		$menu = Menu::find($request->id);
		$menu->name       = $request->name;
	    $menu->description      = $request->description;
	    $menu->user_id = $request->user_id;
	    $menu->foodtrucker_id = $request->foodtrucker_id;
	    $user = $request->user();
		$menu->save();
		$menus = Menu::where('user_id',$user->id)->get();
		$status="Editado com sucesso.";
		return view('menus.index', compact('user','status','menus'));

	}
	public function view(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$products = Product::where('menu_id',$request->id)->get();
			return view('products.index', compact('products','user'));
			
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
}
