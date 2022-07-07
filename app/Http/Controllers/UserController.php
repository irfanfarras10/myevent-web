<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function showEventDetail(){
        return View::make('event_detail_view');
    }
    public function showRegister(){
        return View::make('register_view');
    }
}
