<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showEventDetail($id)
    {
        $eventDetailUrl = 'https://myevent-android-api.herokuapp.com/web/events/' . $id;
        $responseData = Http::get($eventDetailUrl);
        $responseLocation = $responseData["venue"];
        if ($responseData["eventVenueCategory"]["id"] == 1) {
            $location = explode("|", $responseData["venue"]);
            $eventDetailLocationUrl = "https://api.geoapify.com/v1/geocode/reverse?lat=" . $location[0] . "&lon=" . $location[1] . "&apiKey=26018a31a0aa41699818b7b50ea82935";
            $response = Http::get($eventDetailLocationUrl);
            $responseLocation = $response["features"][0]["properties"]["formatted"];
        }

        return View::make('event_detail_view')->with('data', $responseData)->with('location', $responseLocation);
    }

    public function showRegister($id)
    {
        $eventDetailUrl = 'https://myevent-android-api.herokuapp.com/web/events/' . $id;
        $responseData = Http::get($eventDetailUrl);
        $responseLocation = $responseData["venue"];
        if ($responseData["eventVenueCategory"]["id"] == 1) {
            $location = explode("|", $responseData["venue"]);
            $eventDetailLocationUrl = "https://api.geoapify.com/v1/geocode/reverse?lat=" . $location[0] . "&lon=" . $location[1] . "&apiKey=26018a31a0aa41699818b7b50ea82935";
            $response = Http::get($eventDetailLocationUrl);
            $responseLocation = $response["features"][0]["properties"]["formatted"];
        }
        $eventDateUrl = 'https://myevent-android-api.herokuapp.com/web/events/' . $id . '/dates';
        $responseDate = Http::get($eventDateUrl);
        return View::make('register_view')->with('data', $responseData)->with('location', $responseLocation)->with('eventDate', $responseDate);
    }

    public function showConfirmation(Request $request)
    {
        $paymentPhoto = $request->paymentPhoto;
        $originalFile = $paymentPhoto->getClientOriginalName();
        $paymentPhoto->move(public_path(), $originalFile);
        $fileImage = substr(Storage::url(public_path() . '/' . $originalFile), 9);
        return View::make('register_confirmation_view')->with('data', $request)->with('paymentPhoto', $fileImage);
    }

    public function register(Request $request)
    {
        if ($request->eventPaymentCategory == 1) {
            $client = new Client([
                'base_uri' => 'https://myevent-android-api.herokuapp.com/web/',
            ]);
            $response = $client->request('POST', 'events/' . $request->eventId .  '/participant/regist', [
                'multipart' => [
                    [
                        'name' => 'name',
                        'contents' => $request->name,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ],
                    [
                        'name' => 'phoneNumber',
                        'contents' => $request->phoneNumber,
                    ],
                    [
                        'name' => 'eventDate',
                        'contents' => strtotime($request->eventDate) * 1000,
                    ],
                    [
                        'name' => 'ticketId',
                        'contents' => $request->ticketId,
                    ],
                    [
                        'name' => 'paymentId',
                        'contents' => $request->paymentId,
                    ],
                ]
            ]);
            if ($response->getStatusCode() == 201) {
                return View::make('register_success_view')->with('eventId', $request->eventId)->with('eventPaymentCategory', $request->eventPaymentCategory);
            }
        } else {
            $client = new Client([
                'base_uri' => 'https://myevent-android-api.herokuapp.com/web/',
            ]);
            $response = $client->request('POST', 'events/' . $request->eventId .  '/participant/regist', [
                'multipart' => [
                    [
                        'name' => 'name',
                        'contents' => $request->name,
                    ],
                    [
                        'name' => 'email',
                        'contents' => $request->email,
                    ],
                    [
                        'name' => 'phoneNumber',
                        'contents' => $request->phoneNumber,
                    ],
                    [
                        'name' => 'eventDate',
                        'contents' => strtotime($request->eventDate) * 1000,
                    ],
                    [
                        'name' => 'ticketId',
                        'contents' => $request->ticketId,
                    ],
                    [
                        'name' => 'paymentId',
                        'contents' => $request->paymentId,
                    ],
                    [
                        'name' => 'paymentPhoto',
                        'contents' =>  Psr7\Utils::tryFopen($request->paymentPhoto, 'r'),
                    ]
                ]
            ]);
            if ($response->getStatusCode() == 201) {
                return View::make('register_success_view')->with('eventId', $request->eventId)->with('eventPaymentCategory', $request->eventPaymentCategory);
            }
        }
    }
}
