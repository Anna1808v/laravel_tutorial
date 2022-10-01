<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comment = Comment::find(1);
        dump($comment);
    }

}
