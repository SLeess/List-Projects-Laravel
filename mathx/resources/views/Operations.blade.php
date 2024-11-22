@extends('Layouts.Main_layout')
@section('content')
{{-- <!-- operations --> --}}
<div class="container">
    <hr>
    <div class="row">
        {{-- <!-- each operation --> --}}
        @foreach ($exercises as $exercise)
            <div class="operations col-5 col-sm-6 col-md-6 col-lg-3 display-6 mb-3">
                <span class="badge bg-dark">{{str_pad(1+ $loop->index, 2, 0, STR_PAD_LEFT);}}</span>
                <span>{{ $exercise['exercise'] }}</span>
                {{-- <span>+</span> --}}
                {{-- <span>000</span> --}}
            </div>
        @endforeach
    </div>

    <hr>

</div>

{{-- <!-- print version --> --}}
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <a href="{{ Route('home') }}" class="btn btn-primary px-5">Voltar</a>
        </div>
        <div class="col text-end">
            <a href="{{ Route('export') }}" class="btn btn-secondary px-5">Baixar exercícios</a>
            <a href="{{ Route('print') }}" class="btn btn-secondary px-5">Imprimir exercícios</a>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    .operations{
        font-family: 'Courier New', Courier, monospace;
        font-size: 22pt;
    }
</style>
@endsection
