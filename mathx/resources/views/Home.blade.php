@extends('Layouts.Main_layout')
@section('content')
{{-- <!-- form --> --}}
<form action="{{ Route('generate') }}" method="post">
    @csrf
    <div class="container border border-primary rounded-3 p-5">
        <div class="row gap-5">
            {{-- <!-- 4 checkboxes --> --}}
            <div class="col">
                <p class="text-info">Operações:</p>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="check_sum" name="sum" checked>
                    <label class="form-check-label" for="check_sum">Soma</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="check_subtraction" name="subtraction"
                        checked>
                    <label class="form-check-label" for="check_subtraction">Subtração</label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="check_multiplication"
                        name="multiplication" checked>
                    <label class="form-check-label" for="check_multiplication">Multiplicação</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="check_division" name="division"
                        checked>
                    <label class="form-check-label" for="check_division">Divisão</label>
                </div>
            </div>

            {{-- <!-- parcelas --> --}}
            <div class="col">
                <p class="text-info">Parcelas:</p>
                <div class="mb-3">
                    <label for="number_one">Mínimo:</label>
                    <input type="number" class="form-control" id="number_one" name="minimum" min="0" max="999"
                        value="0" required>
                    {{-- @error('minimum')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div>
                    <label for="number_two">Máximo:</label>
                    <input type="number" class="form-control" id="number_two" name="maximum" min="0" max="999"
                        value="100" required>
                    {{-- @error('maximum')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror --}}
                </div>

            </div>

            {{-- <!-- number of exercises and submit --> --}}
            <div class="col">

                <p class="text-info">Número de exercícios:</p>

                <div class="mb-3">
                    <label for="number_exercises">Número:</label>
                    <input type="number" class="form-control" id="number_exercises" name="exercises" min="5"
                        max="50" value="10" required>
                    {{-- @error('exercises')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Gerar exercícios</button>
                </div>

            </div>

        </div>

    </div>
    
    @if ($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-auto mx-auto">
                <p class="alert alert-danger mt-3 text-center">
                    @if ($errors->hasAny(['sum', 'subtraction', 'multiplication', 'division']))
                        Erro! Nenhuma das operações foram selecionadas.
                    @else
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                            @if (!$loop->first)
                                <br>
                            @endif
                        @endforeach
                    @endif
                </p>
            </div>
        </div>
    </div>
    @endif

</form>
@endsection
