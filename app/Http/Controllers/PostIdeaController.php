<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostIdeaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);    
    }

    public function index()
    {
        return view('post-idea');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required'
        ]);
        
        $path = $request->file('image')->store('public/images');

        $request->user()->ideas()->create([
            'title' => $request->title,
            'image' => $path,
            'description' => $request->description
        ]);

        return redirect()->route('home');
    }
}
