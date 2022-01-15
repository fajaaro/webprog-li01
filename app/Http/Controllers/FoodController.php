<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->paginate(8);

        return view('foods.index', compact('foods'));
    }

    public function show($id)
    {
        $food = Food::find($id);

        return view('foods.show', compact('food'));
    }
}
