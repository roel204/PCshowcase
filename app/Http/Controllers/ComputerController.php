<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComputerController extends Controller
{
    function index () {
        $computer = new Computer();
        $computer->title = 'MainPC';
        $computer->price = 700;
    }
}
