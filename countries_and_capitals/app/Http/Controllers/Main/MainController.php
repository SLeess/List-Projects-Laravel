<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionsRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $app_data;

    public function __construct()
    {
        //load app_data.php file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }

    public function showData()
    {
        return response()->json($this->app_data);
    }

    public function prepareGame(CreateQuestionsRequest $request){
        $data = $request->validated();

        $total_questions = intval($data['questions']);

        // prepare all the quiz structure
        $quiz = $this->prepareQuiz($total_questions);
        // dd($quiz);
        // dd($this->showData());
    }

    private function prepareQuiz($total_questions){
        $questions = [];
        $countrysAndCities = json_decode($this->showData()->getContent(), true);
        # dd($countrysAndCities);

        // create a array of indexes of the data
        $indexes = range(0, count($countrysAndCities) -1);

        // mix the order of the indexes, without repeat any index
        shuffle($indexes);

        //this make the cut the first part of the array, starting from the 0 index to the one number of questions sent, the other part is just lost
        $indexes = array_slice($indexes, 0, $total_questions);
        // dd($indexes);

        // dd($countrysAndCities);
        foreach ($indexes as $index){
            $question['country']  = $countrysAndCities[$index]['country'];
            $question['anwser'] = $countrysAndCities[$index]['capital'];
            $others = $this->randomDifferentNumber(0, $total_questions-1, $index);
            // dd($index, $others);

            // $question['others'][''];
        }
        return 0;
    }

    private function randomDifferentNumber(int $min, int $max, int $excluded): array
    {
        $numbers = [];
        for($i = 0; $i < 4; $i++){
            do {
                $randomNumber = random_int($min, $max);
            } while ($randomNumber === $excluded);
            $numbers[] = $randomNumber;
        }

        return $numbers;
    }
}
