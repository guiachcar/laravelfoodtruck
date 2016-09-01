<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\Location;

class IndexController extends Controller
{
   //public function index(Request $request){
   		//$user = $request->user();
   		//$events = Event::all();
 		//return view('index1', compact('events','user'));
   	
   	public function index(Request $request){
   		if ($request->user()) {
            $user = $request->user();
            $events = Event::all();
            return view('index2', compact('events','user'));
         }else{
            return view('index1');
         }
   	}

   	public function cliente(Request $request){
   		if ($request->user()) {
 			  $user = $request->user();
 			  $events = Event::all();
 			  return view('index2', compact('events','user'));
 		   }else{
 			  return redirect('login')->with('status', "Realize seu cadastro");
 		   }
   	}

   	public function food(Request $request){
   		if ($request->user()) {
            $user = $request->user();
            $events = Event::all();
            return view('index2', compact('events','user'));
         }else{
            return redirect('login')->with('status', "Realize seu cadastro");
         }
   	}

}
