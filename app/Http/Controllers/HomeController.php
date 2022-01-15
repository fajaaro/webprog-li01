<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->simplePaginate(4);

        return view('home', compact('foods'));
    }
}
