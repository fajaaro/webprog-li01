<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'stock' => 'required|integer',
            'image_url' => 'required',
        ]);
        // dd($data);

        $imgName = date("Ymd_His") . "."  . $request->image_url->getClientOriginalExtension();
        $request->image_url->move(public_path('images'), $imgName);

        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->stock = $request->stock;
        $food->image_url = $imgName;

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
            'name' => 'required|unique:foods,name',
            'description' => 'required|max:1000',
            'price' => 'required|integer|max:1000000',
            'stock' => 'required|integer',
            'image_url' => 'required',
        ]);

        $food = Food::find($id);

        if(request('image_url')){
            $imgName = date("Ymd_His") . "."  . $request->image_url->getClientOriginalExtension();

            $request->image_url->move(public_path('images'), $imgName);

            Food::where('id', $food->id)
            ->update([
                'image_url' => $imgName
            ]);
        }

        Food::where('id', $food->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

        // $food->save();

        return redirect()->route('admin.foods.index')->with('success', 'Success update food!');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        File::delete("images/" . $food->image_url);

        Food::destroy($id);

        return redirect()->route('admin.foods.index')->with('success', "Success delete food with id $id!");
    }
}
