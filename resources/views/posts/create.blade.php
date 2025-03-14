@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action={{route('imagenes.store')}} class="dropzone border-dashed border-1 w-full h-96 text-center flex items-center justify-center rounded cursor-pointer" id="my-dropzone">
                @csrf
            </form>
        </div> 
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form method="POST" action="{{route('posts.store')}}" novalidate id="formDescripcion">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicacion" value="{{old("titulo")}}"
                    class="border border-gray-200 p-3 w-full rounded-lg @error("titulo") border-red-500 @enderror">
                    @error("titulo")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" type="text" placeholder="Descripcion de la publicacion"
                    class="border border-gray-200 p-3 w-full rounded-lg @error("descripcion") border-red-500 @enderror"> 
                        {{old("descripcion")}}
                    </textarea>
                    @error("descripcion")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen" id="imagen" value="{{old("imagen")}}" class="border border-gray-200 p-3 w-full rounded-lg @error("imagen") border-red-500 @enderror">
                    @error('imagen')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                
                <input type="submit" value="Iniciar sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection