<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Product;
use Carbon\Carbon;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function eloquentRelations()
    {
        echo "laravel relations";
        // $this->OneToOne();
        // $this->OneToMany();
        $this->BelongsTo();
    }

    public function OneToMany()
    {
        echo "<h1>relacao 1 para N</h1><hr>";
        Client::with('phone')->get()->map(function($client1){
            $data = $client1->phones->map(function($phone){ return "$phone->phone_number";})->toArray();

            echo "<p>Nome do cliente: $client1->client_name - Telefones: ". implode(" - ", $data) . "</p>";
        });

    }
    public function OneToOne()
    {
        echo "<h1>relacao 1 para 1</h1><hr>";
        Client::with('phone')->get()->map(function($client1){
            echo "<p>Nome do cliente: $client1->client_name - Telefone: ". $client1->phone->phone_number . "</p>";
        });

    }

    public function BelongsTo()
    {
        echo "<h1>Relação belongs to</h1>";
        Phone::with('client')->get()->map(function($phone){
            echo "<p>Telefone: $phone->phone_number</p>";
            echo "<p>Client: ". $phone->client->client_name ."</p><br>";
        });
    }

    public function ManyToMany(Request $request)
    {

        if($request->session()->has('page') && $request->has('page') && session('page') != $request->get('page')){
            $request->session()->pull('search_query');
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $query = //$request->query();
            Arr::except(array_merge($request->query(), $request->session()->get('search_query', [])), "page");

        $request->session()->put('search_query', $query);
        $request->session()->put('page', $currentPage);
        // dd($query, $request->session()->get('search_query'), $request->url());
        $clients = Client::all()->map(function($item){
            $item->products = $item->products()
                                   ->orderBy('product_name')
                                   ->groupBy(['product_id', 'client_id'])
                                   ->paginate(5, ["*"], "products_".$item->id);

            foreach($item->products as $product){
                $product->quantity = $item->orders->where('product_id', $product->id)->sum('quantity');
            }

            return $item;
        });

        $perPage = 5;
        $paginatedItems = new LengthAwarePaginator(
            $clients->forPage($currentPage, $perPage),
            $clients->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $query,
            ]
        );

        return view('client.compras', ["clients" => $paginatedItems]);
    }

    /**
     * Display a listing of the resource.
     */

    public function eloquent()
    {
        $product = Product::
                        orderBy('product_name')
                        ->limit(3)
                        ->get()
                        // all()
                        // ->map(fn($e) => $e->product_name);
                        ->map(fn($e) => (object) $e->toArray());

        // dd($product[0]->product_name);

        // return $this->showData($product);

        $results = Product::where('price', ">=", 90)
                            ->firstOr(function(){
                                echo "Não Existe";
                            })
                            ->get();

        $this->echoData($product);
    }

    private function showData($data)
    {
        return $data->toJson();
    }

    private function echoData($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function index()
    {
        DB::connection()->getPdo();

        //Retornar todos os dados de uma tabela a partir de um query builder
        // $clientes = DB::table('clients')// ->where('')
        //                 ->get();


        //Apresentar num array associativo
        $clientes = DB::table('clients')
                        ->get()
                        ->toArray();


        //apresentar num array de arrays associativos
        $results = DB::table('products')
                    ->get()
                    ->map(function($item){
                        return (array) $item;
                    });


        // apresentar os dados a partir dos resultados
        // $products = DB::table('products')
        //                 ->get();
        // foreach ($products as $key => $product) {
        //     echo $product->product_name. "<br>";
        // }

        //obter algumas colunas
        // $products = DB::table('products')
                        // ->get(['product_name', 'price']);


        // pluck - obter de forma simples os dados de uma coluna especifica
        // $result = DB::table('products')->pluck('product_name');

        $result = DB::table('products')->where('id', 10)->get(['product_name', 'price'])->first();
        // dd(collect([$result]));

        // $this->showDataTable(collect([$result]));
        $this->showDataTable($clientes);
        $this->showDataTable($results);
    }

    private function showRawData($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function showDataTable($data){
        echo "
            <table border='1'>
                <thead>
                    <tr>

                ";

        foreach ($data[0] as $key => $value) {
            echo "<th style='margin: 0 10px;'> $key </th>";
        }

        echo "
                    </tr>
                </thead>
                <tbody>
                ";

        foreach ($data as $row) {
            echo "<tr>";

                foreach ($row as $key => $val)
                echo "<td>$val</td>";

            echo "</tr>";
        }

        echo "
                </tbody>
            </table>
        ";
    }

}
