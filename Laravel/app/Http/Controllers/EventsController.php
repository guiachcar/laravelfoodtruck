<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\File;
use App\Location;
use App\Foodtrucker;
use App\Participante;
use DB;
use App\Menu;

class EventsController extends Controller
{


	public function index(Request $request){
		if ($request->user()) {
			$user = $request->user();
			$events = Event::all()->sortByDesc('startDate');
			return view('events.index', compact('events','user','locations')); 			
		}else{
			return redirect('login')->with('status', "Acesso apenas com cadastro");
		}
	}

	public function view(Request $request){
		if ($request->user()) {
			$user = $request->user();
			$events = Event::find($request->id);
			$foodtruckers = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=2") 
			->get();
			$foodtruckersSolPart = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->select('participantes.id','foodtruckers.name')
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=1") 
			->get();
			$foodtruckersPart = Foodtrucker::where('user_id',$user->id)
			->orderBy('name', 'desc')
			->get();
			$menus = Menu::where('user_id',$user->id)->get();
			return view('events.view', compact('events','user','locations','foodtruckers','foodtruckersSolPart','foodtruckersPart','menus'));
		}else{
			return redirect('login')->with('status', "Acesso apenas com cadastro");
		}
	}

	public function add(Request $request){
		if ($request->user()) {
			$user = $request->user();
			$foodtruckers = Foodtrucker::where('user_id',$user->id)
			->orderBy('name', 'desc')
			->get();
			$locations = Location::where('user_id',$user->id)
			->orderBy('name','desc')
			->get();
			$menus = Menu::where('user_id',$user->id)->get();
			return view('events.add', compact('user','locations','foodtruckers','menus'));
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
			$foodtruckers = Foodtrucker::where('user_id',$user->id)
			->orderBy('name', 'desc')
			->get();
			$event = Event::find($request->id);
			return view('events.edit', compact('user','locations','event','foodtruckers'));
		}else{
			return redirect('login')->with('status', "Acesso apenas com cadastro");
		}

	}

	public function cadastrar(Request $request){

		//recebendo post
		$event = new \App\Event;
		$event->name       = $request->name;
		$event->startDate      = $request->startDate;
		$event->endDate = $request->endDate;
		$event->startHour = $request->startHour;
		$event->endHour = $request->endHour;
		$event->description = $request->description;
		$event->user_id = $request->user_id;
		$event->location_id = $request->location_id;
		$event->foodtrucker_id = $request->foodtrucker_id;
		$user = $request->user();


	    //salvando imagem
		$destino = 'documentos/'.$event->name . $_FILES['image']['name'];
		$arquivo_tmp = $_FILES['image']['tmp_name'];
		move_uploaded_file( $arquivo_tmp, $destino  );
		$event->image = $destino;

		$event->save();
		$participante = new \App\Participante;
		$participante->foodtrucker_id = $event->foodtrucker_id;
		$participante->event_id = $event->id;
		$participante->menu_id = $request->menu_id;
		$participante->permission = 2;
		$participante->save();

		$status="Cadastrado com sucesso";
		
		$events = Event::all()->sortByDesc('startDate');
		return view('events.index', compact('events','user','status'));
	}

	public function editar(Request $request){

		//recebendo post
		$event = Event::find($request->id);
		$event->name       = $request->name;
		$event->startDate      = $request->startDate;
		$event->endDate = $request->endDate;
		$event->startHour = $request->startHour;
		$event->endHour = $request->endHour;
		$event->description = $request->description;
		$event->user_id = $request->user_id;
		$event->location_id = $request->location_id;

		$user = $request->user();

	    //salvando imagem
		if($request->image != null){
			$destino = 'documentos/'.$event->name . $_FILES['image']['name'];
			$arquivo_tmp = $_FILES['image']['tmp_name'];
			move_uploaded_file( $arquivo_tmp, $destino  );
			$event->image = $destino;
		}

		$event->save();
		$events = Event::find($request->id);
		$user = $request->user();
		$locations = Location::all();
		$foodtruckers = DB::table('participantes')
		->join('foodtruckers', function ($join) {
			$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
		})
		->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=2") 
		->get();
		$status="Editado com sucesso";
		$foodtruckersPart = Foodtrucker::where('user_id',$user->id)
		->orderBy('name', 'desc')
		->get();
		$menus = Menu::where('user_id',$user->id)->get();
		return view('events.view', compact('events','user','locations','foodtruckers','foodtruckersSolPart','foodtruckersPart','menus','status'))
		;$foodtruckersPart = Foodtrucker::where('user_id',$user->id)
		->orderBy('name', 'desc')
		->get();
		$foodtruckersSolPart = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->select('participantes.id','foodtruckers.name')
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=1") 
			->get();
		$menus = Menu::where('user_id',$user->id)->get();
		return view('events.view', compact('events','user','locations','foodtruckers','foodtruckersSolPart','foodtruckersPart','menus','status'));

	}
	public function participar(Request $request){
		if ($request->user()) {
			$user = $request->user();
			$events = Event::find($request->id);
			$foodtrucker = Foodtrucker::find($request->foodtrucker_id);
			if($foodtrucker!=NULL){
				$verifica = Participante::whereRaw('event_id='.@$events->id.' AND foodtrucker_id='.@$foodtrucker->id)->get();
				if($verifica==NULL){
					$participante = new \App\Participante;
					$participante->foodtrucker_id = $foodtrucker->id;
					$participante->event_id = $events->id;
					$participante->menu_id = $request->menu_id;
					$participante->permission = 1;
					$participante->save();
					$status= "Solicitação enviada, aguardando liberação";
				}else{
					$status= "Você já solicitou participação nesse evento";
				}
			}else{
				$status = "Você não tem um Food Truck para participar. Cadastre na aba FOODTRUCKERS";
			}


			$foodtruckers = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=2") 
			->get();
			$foodtruckersPart = Foodtrucker::where('user_id',$user->id)
			->orderBy('name', 'desc')
			->get();
			$menus = Menu::where('user_id',$user->id)->get();
			return view('events.view', compact('events','user','locations','foodtruckers','foodtruckersSolPart','foodtruckersPart','menus','status'));
		}else{
			return redirect('login')->with('status', "Acesso apenas com cadastro");
		}
	}
	public function participarLibera(Request $request){
		if ($request->user()) {
			$user = $request->user();
			$participante = Participante::find($request->id);
			if($participante->permission==1){
				$participante->permission = 2;
				$participante->save();
				$status= "Food Trucker confirmado no evento";
			}else{
				$status= "Esse Food Trucker já estava confirmado";
			}
			$events = Event::find($participante->event_id);
			
			$foodtruckers = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=2") 
			->get();
			$foodtruckersSolPart = DB::table('participantes')
			->join('foodtruckers', function ($join) {
				$join->on('participantes.foodtrucker_id', '=', 'foodtruckers.id');
			})
			->whereRaw('participantes.event_id='.$events->id." AND participantes.permission=1") 
			->get();
			$foodtruckersPart = Foodtrucker::where('user_id',$user->id)
			->orderBy('name', 'desc')
			->get();
			$menus = Menu::where('user_id',$user->id)->get();
			return view('events.view', compact('events','user','locations','foodtruckers','foodtruckersSolPart','foodtruckersPart','menus','status'));
		}else{
			return redirect('login')->with('status', "Acesso apenas com cadastro");
		}
	}

}
