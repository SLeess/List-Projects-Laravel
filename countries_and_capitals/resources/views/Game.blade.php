<x-layout.main_layout pageTitle="Countries & Capitals Quiz">
    <div class="container">
        <x-question :country="$country" :currentQuestion="$currentQuestion" :totalquestions="$totalQuestions"/>
        <div class="row">
            @foreach ($awnsers as $item)
                <x-awnser :capital="$item"/>
            @endforeach
        </div>
    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="#" class="btn btn-outline-danger mt-3 px-5">CANCELAR JOGO</a>
    </div>

</x-layout.main_layout>
