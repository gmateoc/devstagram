@extends('layouts.app')

@section('titulo')
    Tu Cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/user.png')}}" alt="{{auth()->user()->username}}" class="w-64 h-64">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl">{{auth()->user()->username}}</p>
            </div>
        </div>
    </div>
@endsection
