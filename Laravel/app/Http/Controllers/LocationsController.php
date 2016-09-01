<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Cidade;
use App\Http\Requests;
use DB;
use App\Foodtrucker;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{

	

    public function maps(Request $request){

    	$user = $request->user();
 		return view('events.location', compact('user'));
 	}

 	public function mostrar(Request $request){

 		$location = Location::find($request->id);
	    $zoom=15;
	
		return view('events.showLocationEvent',  compact('location','zoom'));
		
 	}

	static function getLocal(Request $request) {
	 		if($request->uf!= null){
				
				if($request->cidade!= null){
					$cidade = Cidade::find($request->cidade);
					$addressBusca = @$cidade->nome.",".$request->uf.", Brasil";
					$zoom=12;
				}else{
					$addressBusca     = $request->uf.", Brasil";
					$zoom=6;
				}
			}else{
				$addressBusca     = $request->addressBusca;
			}


	 		
	 		$address	 = $addressBusca;
	 		$name	 = $request->name;

	 		$addressBusca = str_replace(" ", "+", $addressBusca);

	 	    $lat = null;
		    $lng = null;
		   	$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$addressBusca&amp;sensor=false&amp;");
			$json = json_decode($json);
			 
			$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
			$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

			if($request->uf!= null){
				$user = $request->user();
				$locations = DB::table('locations')
				    ->join('events', function ($join) {
				        $join->on('locations.id', '=', 'events.location_id');
				    })
				    ->whereRaw('events.endDate >= CURDATE()')
				    ->get();
				$user = $request->user();
 		  		return view('events.showlocation',  compact('lat','long','locations','zoom','uf','cidade','user'));
			}else{
				$user = $request->user();
				return view('events.location',  compact('lat','long','address','name','user'));
			}

			
		    
	    
	 }
	 public function cadastrar(Request $request){
 				
		//recebendo post
		$location = new \App\Location;
		$location->address     = $request->address;
		$location->name      = $request->name;
	    $location->lat      = $request->lat;
	    $location->long      = $request->long;
	    $location->user_id =$request->user_id;

	    $user = $request->user();
		$location->save();
		$locations = Location::where('user_id',$user->id)
 			->orderBy('name','desc')
 			->get();
		
		$foodtruckers = Foodtrucker::where('user_id',$user->id)
 			->orderBy('name', 'desc')
            ->get();
        $status = "Localização cadastrada com sucesso";
 		return view('Foodtruckers.index',  compact('user','locations','foodtruckers','status'));
	}

	public function show(Request $request){
		$locations = DB::table('locations')
		    ->join('events', function ($join) {
		        $join->on('locations.id', '=', 'events.location_id');
		    })
		    ->get();
		$user = $request->user();
 		return view('events.showlocation', compact('locations','user'));
	}
}

