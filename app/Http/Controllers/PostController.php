<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

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
}
