<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class MainController extends Controller
{
    private $app_data;

    public function __construct()
    {
        //load app_data.php file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }

    public function startGame(){
        session()->remove('quiz');
        return view('Home');
    }

    public function showData()
    {
        return response()->json($this->app_data);
    }

    public function prepareGame(CreateQuestionsRequest $request){
        $data = $request->validated();

        $total_questions = intval($data['questions']);

        // prepare all the quiz structure
        if(!session('quiz')){
            $quiz = $this->prepareQuiz($total_questions);
            session()->put([
                'quiz' => $quiz,
                'total_questions' => $total_questions,
                'current_question' => 1,
                'correct_answers' => 0,
                'wrong_answers' => 0,
            ]);
        }
        else{
            $quiz = session(['quiz',]);
        }


        return redirect()->route('game');
        // return view('Question', compact('quiz'));
    }

    private function prepareQuiz($total_questions){
        $questions = [];
        $countrysAndCities = json_decode($this->showData()->getContent(), true);

        // create a array of indexes of the data
        $indexes = range(0, count($countrysAndCities) -1);

        // mix the order of the indexes, without repeat any index
        shuffle($indexes);

        //this make the cut the first part of the array, starting from the 0 index to the one number of questions sent, the other part is just lost
        $indexes = array_slice($indexes, 0, $total_questions);

        $countQuestions = 1;
        foreach ($indexes as $index){
            $question[$countQuestions]['number']  = $countQuestions;
            $question[$countQuestions]['country']  = $countrysAndCities[$index]['country'];
            $question[$countQuestions]['correct_anwser'] = $countrysAndCities[$index]['capital'];
            $others = $this->randomDifferentNumber(0, count($countrysAndCities) -1, $index);

            $count = 0;
            foreach($others as $other){
                $question[$countQuestions]['others'][$count++] =  $countrysAndCities[$other]['capital'];
            }
            $question[$countQuestions]['correct'] = null;
            $countQuestions++;
        }
        // dd($question);
        return $question;
    }

    private function randomDifferentNumber(int $min, int $max, int $excluded): array
    {
        $numbers = [];
        for($i = 0; $i < 3; $i++){
            do {
                $randomNumber = random_int($min, $max);
            } while ($randomNumber === $excluded || in_array($randomNumber, $numbers));
            //ele continua sorteando numeros enquanto eles forem não forem unicos, ou seja, não estiverem presentes no array, e que sejam diferentes do valor
            //definido em $excluded
            $numbers[] = $randomNumber;
        }

        return $numbers;
    }


    public function game(): View|RedirectResponse
    {
        $quiz = session('quiz');
        $total_questions = session('total_questions');
        $current_question = session('current_question');

        if($total_questions < $current_question){
            return redirect()->route("final_results");
        }

        // dd($current_question, session(), $quiz[$current_question]);

        // prepare questions to show in view
        $awnsers = $quiz[$current_question]['others'];
        $awnsers[] = $quiz[$current_question]["correct_anwser"];

        shuffle($awnsers);

        return view('Game')->with([
            'country' => $quiz[$current_question]['country'],
            'totalQuestions' => $total_questions,
            'currentQuestion' => $current_question,
            'awnsers' => $awnsers,
        ]);
    }

    public function final_results(){
        return view('FinalResults')->with([
            'totalQuestions' => session('total_questions'),
            "wrong_answers" => session("wrong_answers"),
            "correct_answers" => session("correct_answers"),
            "score" => number_format( session("correct_answers")/session('total_questions')*100, 2, ",", "." ),
        ]);
    }

    public function answer($enc_answer){
        try{
            $answer = Crypt::decryptString($enc_answer);
        } catch (\Exception $e){
            return redirect()->route('game');
        }

        //game logic
        $quiz = session('quiz');
        $current_question = session('current_question');
        $correct_answer = $quiz[$current_question]['correct_anwser'];

        $correct_answers = session('correct_answers');
        $wrong_answers = session('wrong_answers');

        if($answer == $correct_answer){
            $correct_answers++;
            $quiz[$current_question]['correct'] = true;
        } else{
            $wrong_answers++;
            $quiz[$current_question]['correct'] = false;
        }

        //update session
        session()->put([
            'quiz' => $quiz,
            'correct_answers' => $correct_answers,
            'wrong_answers' => $wrong_answers,
            'current_question' => $current_question + 1,
        ]);

        // prepare the data to show the correct answer
        $data = [
            'country' => $quiz[$current_question]['country'],
            'correctAnswer' => $correct_answer,
            'choiceAnswer' => $answer,
            'currentQuestion' => $current_question,
            'totalQuestions' => session('total_questions'),
        ];

        // dd("teste");
        return view("Answer_result", $data);
    }
}
