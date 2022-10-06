<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class First_PageController extends Controller
{
    public function index() {

        return view('first_page');
        
    }

    
}
