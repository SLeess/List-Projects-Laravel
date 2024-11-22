<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\View\View;

use App\Http\Requests\StoreUpdateExercisesRequest;

class MainController extends Controller
{
    // apresentar a página inicial
    public function index(): \Illuminate\Contracts\View\View
    {
        return view("Home");
    }

    // gerar os exercícios
    public function generateExercises(StoreUpdateExercisesRequest $request){
        $validated = $request->validated();

        //To create the exercises
        $exercises = $this->createExercises($validated);

        $request->session()->put("exercises", $exercises);

        return view('Operations', compact("exercises"));
    }

    // exportar os exercícios para uma página que poderá ser imprimida
    public function exportExercises(){
        if(!session()->has('exercises')){
            return redirect()->route('home')->withErrors("Erro! Os exercícios ainda não foram criados.");
        }

        //create file to download with exercises
        $exercises = session()->get("exercises");
        $filename = "exercises_". env('APP_NAME'). '_'. date('ymdHis'). ".txt";

        $content = '';
        foreach($exercises as $index => $exercise){
            $content .= str_pad( $index, 2, 0, STR_PAD_LEFT) . " >> ". $exercise['exercise'] ." = \n";
        }

        $content .= "\nSoluções\n" . str_repeat('-', 20). "\n";
        foreach($exercises as $index => $exercise){
            $content .= str_pad( $index, 2, 0, STR_PAD_LEFT) . " >> ". $exercise['solution'] ."\n";
        }

        return response($content)
                ->header("Content-Type", "text/plain")
                ->header("Content-Disposition", 'attachment; filename="'. $filename . '"');
                // ->download($filename, $content);

    }

    // exportar os exercícios para um arquivo texto
    public function printExercises(){

        if(!session()->has('exercises')){
            return redirect()->route('home')->withErrors("Erro! Os exercícios ainda não foram criados.");
        }

        $exercises = session()->get("exercises");
        echo "<pre>
        <h1 style='margin-bottom: 1px;'>Exercícios de Matemática (". env('APP_NAME') ." )</h1>
        <hr>";

        foreach($exercises as $index => $exercise){
            echo "<h2><small>". str_pad( $index, 2, 0, STR_PAD_LEFT) . " >> </small>" . $exercise['exercise'] ." = </h2>";
        }

        echo"
        </pre>";

        //solutions
        echo "<hr><small>Soluções</small><br>";
        foreach($exercises as $index => $exercise){
            echo "<small>". str_pad( $index, 2, 0, STR_PAD_LEFT) . " >> " . $exercise['exercise']. " = ". $exercise['solution'] ."<br></small>";
        }
    }

    private static function createExercises(array $validated){
        //preparação dos dados
        $data['operations']= [
            isset($validated['sum']) ? 'sum' : null,
            isset($validated['subtraction']) ? 'subtraction' : null,
            isset($validated['division']) ? 'division' : null,
            isset($validated['multiplication']) ? 'multiplication' : null,
        ];
        $data['minimum'] = $validated['minimum'];
        $data['maximum'] = $validated['maximum'];
        $data['exercises'] = $validated['exercises'];

        //remoção dos valores nulos para as operações
        while(is_numeric(array_search(null, $data['operations']))){
            unset($data['operations'][array_search(null, $data['operations'])]);
        }

        $content = [];
        for($index = 1; $index <= $data['exercises']; $index++){
            $operation = $data['operations'][array_rand($data['operations'])];
            $number1 = str_pad(rand($data['minimum'], $data['maximum']), 3, 0, STR_PAD_LEFT);
            $number2 = str_pad(rand($data['minimum'], $data['maximum']), 3, 0, STR_PAD_LEFT);

            $exercise = $solution = '';

            switch($operation){
                case 'sum':
                    $exercise = "$number1 + $number2";
                    $solution = $number1 + $number2;
                    break;
                case 'subtraction':
                    $exercise = "$number1 - $number2";
                    $solution = $number1 - $number2;
                    break;
                case 'multiplication':
                    $exercise = "$number1 × $number2";
                    $solution = $number1 * $number2;
                    break;
                case 'division':
                    $exercise = "$number1 ÷ $number2";
                    $solution = ($number2 != 0) ? number_format($number1 / $number2, 2) : "Indeterminado" ;
                    break;
            }

            $content[$index] = [
                "operation" => $operation,
                "exercise" => $exercise,
                "solution" => $solution,
            ];
        }
        return $content;
    }
}
