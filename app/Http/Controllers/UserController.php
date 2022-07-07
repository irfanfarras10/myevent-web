<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function showEventDetail($id){
        $eventDetailUrl = 'https://myevent-android-api.herokuapp.com/web/events/' . $id;
        $responseData = Http::get($eventDetailUrl);
        $responseLocation = $responseData["venue"];
        if($responseData["eventVenueCategory"]["id"] == 1){
            $location = explode("|", $responseData["venue"]);
            $eventDetailLocationUrl = "https://api.geoapify.com/v1/geocode/reverse?lat=" . $location[0] . "&lon=" . $location[1] . "&apiKey=26018a31a0aa41699818b7b50ea82935";
            $response = Http::get($eventDetailLocationUrl);
            $responseLocation = $response["features"][0]["properties"]["formatted"];
        }
      
        return View::make('event_detail_view')->with('data', $responseData)->with('location', $responseLocation);
    }
    public function showRegister($id){
        // var_dump($id);
        // // $response = Http::get('https://myevent-android-api.herokuapp.com/api/events/3');
        // // return View::make('register_view');
    }
}
