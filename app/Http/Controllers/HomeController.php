<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $ideas = Idea::orderBy('created_at','desc')->paginate(5);
        return view('home',[
            'ideas' => $ideas
        ]);
    }

    public function show(Idea $idea)
    {
        return view('singlepost', [
            'idea' =>$idea
        ]);
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('home');
    }
}
