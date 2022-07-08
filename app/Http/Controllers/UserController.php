<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

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

    public function register(Request $request)
    {
        $validateEvent = null;
        if ($request->eventPaymentCategory == 1) {
            $validateEvent = $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phoneNumber' => 'required',
                    'eventDate' => 'required',
                    'ticketId' => 'required',
                ],
                [
                    'name.required' => 'Nama lengkap harus diisi',
                    'email.required' => 'Email harus diisi',
                    'phoneNumber.required' => 'Nomor HP harus diisi',
                    'eventDate.required' => 'Tanggal event harus dipilih',
                    'ticketId.required' => 'Tiket harus dipilih',
                ],
            );
        } else {
            $validateEvent = $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required',
                    'phoneNumber' => 'required',
                    'eventDate' => 'required',
                    'ticketId' => 'required',
                    'paymentId' => 'required',
                    'paymentPhoto' => 'required',
                ],
                [
                    'name.required' => 'Nama lengkap harus diisi',
                    'email.required' => 'Email harus diisi',
                    'phoneNumber.required' => 'Nomor HP harus diisi',
                    'eventDate.required' => 'Tanggal event harus dipilih',
                    'ticketId.required' => 'Tiket harus dipilih',
                    'paymentId.required' => 'Metode pembayaran harus dipilih',
                    'paymentPhoto.required' => 'Foto pembayaran harus diunggah'
                ],
            );
        }



        if ($validateEvent) {
            return redirect()->back()->withErrors($validateEvent);
        }
    }
}
