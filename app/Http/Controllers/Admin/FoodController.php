<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::latest()->paginate(8);

        return view('admin.foods.index', compact('foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:foods,name',
            'description' => 'required|max:1000',
            'price' => 'required|integer|max:1000000',
            'stock' => 'required|integer|min:0',
            'image' => 'required',
        ]);

        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->stock = $request->stock;
        $food->image_url = uploadFile($request->file('image'), 'foods');

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
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:1000',
            'price' => 'required|integer|max:1000000',
            'stock' => 'required|integer|min:0',
        ]);

        $food = Food::find($id);

        $imageUrl = $food->image_url;
        if($request->hasFile('image')) {
            Storage::delete($food->image_url);

            $imageUrl = uploadFile($request->file('image'), 'foods');
        }

        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->stock = $request->stock;
        $food->image_url = $imageUrl;
        $food->save();

        return redirect()->route('admin.foods.index')->with('success', 'Success update food!');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        Storage::delete($food->image_url);
        $food->delete();

        return redirect()->route('admin.foods.index')->with('success', "Success delete food with id $id!");
    }
}
