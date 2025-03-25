@extends('layout')
@section('title', 'Many to Many Page')
@section('content')

<div class="bg-gray-100 border-x-4 border-black border-solid shadow-lg p-4 rounded-md">
    <h1 class="text-4xl font-bold text-start mb-4">Larafel Tests</h1>

    @foreach ($clients as $client)
    <hr>
    <h2 class="text-2xl"><strong>Cliente: {{ $client->client_name }}</strong></h2>
    <div class="p-6 rounded-lg shadow-gray-700 shadow-md m-3">
        <div class="relative overflow-x-auto">
            @if (count($client->products) == 0)
                <h4 class="text-sm">Nenhum item comprado por esse usuário</h4>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Produto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantidade
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Preço
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client->products as $product)
                        {{-- @dd($product) --}}
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$product->product_name}}
                            </th>
                            <td class="px-6 py-4">
                                Lorem ipsum dolor sit amet,  qui consectetur, tempore perferendis earum aperiam vitae, distinctio dicta
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$product->quantity}}
                            </td>
                            <td class="px-6 py-4">
                                ${{$product->price}}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Editar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mx-auto mt-4">
                    @if (method_exists($client->products, "hasPages") && $client->products->hasPages())
                            {{ $client->products->appends(request()->query())->links() }}
                        @endif
                </div>
            @endif
        </div>
    </div>
    @endforeach
    @if (method_exists($clients, "hasPages") && $clients->hasPages())
        {{ $clients->appends(request()->query())->links() }}
    @endif
</div>

@endsection
