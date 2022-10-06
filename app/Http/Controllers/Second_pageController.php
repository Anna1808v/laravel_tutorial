<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class Second_pageController extends Controller
{
    public function index() {

        return view('second_page');
        
    }
}
