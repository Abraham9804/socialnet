<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    
    {   
        $imagen = $request->file('imagen');
        $extension = $request->file('imagen')->extension();
        $nombreImagen = Str::uuid().".".$extension;
        $imagenServidor = Image::read($imagen);
        $imagenServidor->resize(300, 200);
        $imagenPath = public_path('uploads').'/'.$nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(array('message'=>$nombreImagen));
    }
}
