<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {

        return view('main');
        
    }

    
}
