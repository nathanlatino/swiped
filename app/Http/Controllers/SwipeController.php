<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Swipe;

class SwipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        return Swipe::all();
    }

    public function show(Swipe $swipe)
    {
        return $swipe;
    }

    public function store(Request $request)
    {
        $swipe = Swipe::create($request->all());
        return response()->json($swipe, 201);
    }

    public function update(Request $request, Swipe $swipe)
    {
        $swipe->update($request->all());

        return $swipe;
    }

    public function delete(Swipe $swipe)
    {
        $swipe->delete();

        return response()->json(null, 204);
    }
}
