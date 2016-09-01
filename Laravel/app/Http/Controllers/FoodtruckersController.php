<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Location;
use App\Foodtrucker;
use App\Menu;

class FoodtruckersController extends Controller
{
    public function index(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$foodtruckers = Foodtrucker::all();
			return view('foodtruckers.index', compact('foodtruckers','user'));

 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
 	public function add(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$locations = Location::where('user_id',$user->id)
 			->orderBy('name','desc')
 			->get();
 			return view('foodtruckers.add', compact('user','locations'));
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function cadastrar(Request $request){
 				
		//recebendo post
		$foodtrucker = new \App\Foodtrucker;
		$foodtrucker->name       = $request->name;
	    $foodtrucker->tell      = $request->tell;
	    $foodtrucker->user_id = $request->user_id;
	    $foodtrucker->location_id = $request->location_id;


	    $user = $request->user();

	    //salvando imagem
	    $destino = 'documentos/'.$foodtrucker->name . $_FILES['image']['name'];
 		$arquivo_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file( $arquivo_tmp, $destino  );
		$foodtrucker->image = $destino;

		$foodtrucker->save();

		$menu = new \App\Menu;
	    $menu->name = "Principal";
	    $menu->description = "";
	    $menu->user_id = $request->user_id;
	    $menu->foodtrucker_id = $foodtrucker->id;
	    $menu->save();

	    $status= "Cadastrado com sucesso.";
		$foodtruckers = Foodtrucker::all();
 		return view('foodtruckers.index', compact('foodtruckers','user','status'));
	}
	public function view(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
			$foodtruckers = Foodtrucker::find($request->id);
			return view('foodtruckers.view', compact('foodtruckers','user','locations'));
			
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 	}
 	public function edit(Request $request){
 		if ($request->user()) {
 			$user = $request->user();
 			$locations = Location::where('user_id',$user->id)
 			->orderBy('name','desc')
 			->get();
 			$foodtrucker = Foodtrucker::find($request->id);
 			return view('foodtruckers.edit', compact('user','locations','foodtrucker'));
 		}else{
 			return redirect('login')->with('status', "Acesso apenas com cadastro");
 		}
 		
 	}
 	public function editar(Request $request){
 				
		//recebendo post
		$foodtrucker = Foodtrucker::find($request->id);
		$foodtrucker->name   = $request->name;
	    $foodtrucker->tell   = $request->tell;
	    $foodtrucker->user_id = $request->user_id;
	    $foodtrucker->location_id = $request->location_id;

	    $user = $request->user();

	    //salvando imagem
	    if($request->image != null){
	    	$destino = 'documentos/'.$foodtrucker->name . $_FILES['image']['name'];
	 		$arquivo_tmp = $_FILES['image']['tmp_name'];
			move_uploaded_file( $arquivo_tmp, $destino  );
			$foodtrucker->image = $destino;
	    }
	   

		$foodtrucker->save();
		$foodtruckers = Foodtrucker::find($request->id);
		$user = $request->user();
 		$locations = Location::where('user_id',$user->id)
 			->orderBy('name','desc')
 			->get();
 		$status="Editado com sucesso.";
		return view('foodtruckers.view', compact('foodtruckers','user','locations','status'));

	}
}
