<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function set(Request $request)
    {
        if (isset($_COOKIE['carts'])) {
            $data = getCarts();

            if (in_array((int)$request->food_id, $data)) {
                return back()->with('failed', 'That game is already in your carts :)');
            } else {
                array_push($data, (int)$request->food_id);

                unsetCookie('carts');

                setNewCookie('carts', json_encode($data));
            }
        } else {
            $data = json_encode([(int)$request->food_id]);

            setNewCookie('carts', $data);
        }

        return back()->with('success', 'Success add game to your carts!');
    }

    public function delete(Request $request)
    {
        $data = json_decode($_COOKIE['carts']);

        $data[array_search($request->food_id, $data)] = null;

        unsetCookie('carts');

        setNewCookie('carts', json_encode($data));

        return back()->with('success', 'Success remove food from your carts!');
    }
}
