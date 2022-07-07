<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function showEventDetail($id){
        $url = 'https://myevent-android-api.herokuapp.com/web/events/' . $id;
        $response = Http::get($url);
        return View::make('event_detail_view')->with('data', $response);
    }
    public function showRegister($id){
        // var_dump($id);
        // // $response = Http::get('https://myevent-android-api.herokuapp.com/api/events/3');
        // // return View::make('register_view');
    }
}
