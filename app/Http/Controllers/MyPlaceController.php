<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaceController extends Controller
{
    public function index() {
        return "this is my page";
    }

    public function article() {
        return "this page for one article";
    }

    public function main() {
        return "this page is first";
    }

    public function second_page() {
        return "this page is second";
    }

    public function third() {
        return "this page is third";
    }

    public function page_about_autor() {
        return "page about autor";
    }
}
