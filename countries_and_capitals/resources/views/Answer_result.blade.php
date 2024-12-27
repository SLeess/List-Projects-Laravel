<x-layout.main_layout pageTitle="Countries & Capitals Quiz">

    <div class="container">
        <x-question :country="$country" :currentQuestion="$currentQuestion" :totalquestions="$totalQuestions"/>
        <div class="text-center fs-3 mb-3">
             Resposta correta: <span class="text-info">{{ $correctAnswer }}</span>
         </div>

         <div class="text-center fs-3 mb-3">
             A sua resposta: <span class="[conditional]">{{ $choiceAnswer }}</span>
         </div>

     </div>

     <!-- cancel game -->
     <div class="text-center mt-5">
         <a href="{{ route("game") }}" class="btn btn-primary mt-3 px-5">AVANÇAR</a>
     </div>

</x-layout.main_layout>
