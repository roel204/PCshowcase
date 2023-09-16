<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index ($name = null): View {

        if ($name == '') {
            $content = "Welcome to the homepage!";
        } else {
            $content = "Hello, $name! Welcome to the homepage!";
        }

        return view('home', ['content' => $content]);
    }
}
