<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->paginate(8);

        return view('admin.foods.index', compact('foods'));
    }

    public function store(Request $request)
    {
        $food = new Food();
        $food->save();

        return redirect()->route('admin.foods.index')->with('success', 'Success add new food!');
    }

    public function edit($id)
    {
        $food = Food::find($id);

        return view('admin.foods.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $food->save();

        return redirect()->route('admin.foods.index')->with('success', 'Success update food!');
    }

    public function destroy($id)
    {
        Food::destroy($id);

        return redirect()->route('admin.foods.index')->with('success', "Success delete food with id $id!");
    }
}
