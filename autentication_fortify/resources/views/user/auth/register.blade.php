@extends('layouts.guest')
@section('title', 'Tela de Login')
@section('color', 'bg-[#333A56]')
@section('content')
<div class="flex min-h-full flex-col px-6 py-5 lg:px-8 justify-center">

    <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-14 sm:mt-0">
        <img class="mx-auto h-30 w-auto" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img\logo_cead_bg_white.png'))) }}" alt="Unimontes logo">
        {{-- <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">PROCEAD</h2> --}}
      </div>
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-gray-50 rounded-sm  px-6 py-6">
        <h1 class="text-center text-md h1 text-[#212529]">Crie uma conta para acessar o sistema</h1>
            <div class="p-2 bg-[#333A56] items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex mt-3 mb-5" role="alert">
              <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"><strong>Atenção</strong></span>
              <span class="font-semibold text-sm mr-2 text-left flex-auto">Só é possível criar uma conta por CPF e e-mail.</span>
              <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
            </div>
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900"><strong>Nome completo</strong></label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" autocomplete="name" placeholder="Nome Completo" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900"><strong>CPF</strong></label>
                <div class="mt-2">
                    <input type="text" name="cpf" id="cpf" autocomplete="cpf" placeholder="000.000.000-00" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900"><strong>Email</strong></label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" placeholder="seu-email@dominio.com" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>

            <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900"><strong>Senha</strong></label>
            </div>
            <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" placeholder="*********" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            </div>

            <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-[#333A56] px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar-se</button>
            </div>
            {{-- <div class="w-10-12 text-center">
                <a href="{{ route('register') }}" class="text-center font-semibold text-indigo-600 hover:text-indigo-500">Não possui conta? Cadastre-se aqui!</a>
            </div> --}}
      </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Se quiser rodar jQuery aqui direto
jQuery(document).ready(function () {
    console.log('jQuery funcionando!');
    alert('teste');
});

</script>
@endsection
