<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['index']),
        ];
    }
   
    public function index(User $user){
       return view('dashboard',compact('user'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
       $request->validate([
            'descripcion' => 'required',
            'imagen' => 'required'
       ]);

       Post::create([
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,
        'user_id' => Auth::user()->id
       ]);

       return redirect()->route('posts.index', Auth::user()->username);
    }
}
