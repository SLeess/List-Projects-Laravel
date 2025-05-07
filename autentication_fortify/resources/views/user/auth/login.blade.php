@extends('layouts.guest')
@section('title', 'Tela de Login')
@section('color', 'bg-[#333A56]')
@section('content')
<div class="flex max-w-11/12 min-h-full w-lg flex-col px-6 py-12 lg:px-8 justify-center mx-auto">

    <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-30 sm:mt-10">
        <img class="mx-auto h-30 w-auto" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img\logo_cead_bg_white.png'))) }}" alt="Unimontes logo">
      </div>
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-gray-50 rounded-sm  px-6 py-6">
        <h1 class="text-center font-extrabold text-3xl h1 text-[#333A56]">Sistema de Gestão CEAD</h1>
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
            <div class="mt-2">
                <input type="email" name="email" id="email" placeholder="seu-email@dominio.com" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            </div>

            <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
                <div class="text-sm">
                <a href="#" class="font-semibold text-[#333A56] hover:text-indigo-500">Esqueceu a Senha?</a>
                </div>
            </div>
            <div class="mt-2">
                <input type="password" name="password" id="password" placeholder="**********" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            </div>

            <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Entrar</button>
            </div>
            <div class="w-10-12 text-center">
                <a href="{{ route('register') }}" class="text-sm text-center font-semibold text-[#333A56] hover:text-indigo-500"text-sm text-center font-semibold text-[#333A56] hover:text-indigo-500">Não possui conta? Cadastre-se aqui!</a>
            </div>
      </form>
    </div>
</div>
@endsection
