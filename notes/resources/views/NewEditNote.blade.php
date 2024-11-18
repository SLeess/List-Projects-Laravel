@extends('Layouts.Main_layout')
@section('body')
<div class="col">

    <x-navBar/>

    {{-- <!-- label and cancel --> --}}
    <div class="row">
        <div class="col">
            <p class="display-6 mb-0">{{ $situattion ?? "NEW NOTE" }}</p>
        </div>
        <div class="col text-end">
            <a href="{{ Route('main') }}" class="btn btn-outline-danger">
                <i class="fa-solid fa-xmark"></i>
            </a>
        </div>
    </div>

    {{-- <!-- form --> --}}
    <form novalidate
        method="post"
        {{-- A variável situattion apenas existe no retorno do método edit do controller de notas, ou seja, se ela existir, vai mudar o texto de exibição do conteúdo pra edição, além de alterar a rota pra editar o registro, isso pra evitar de criar um novo arquivo Blade --}}
        @if(isset($situattion))
            action='{{ Route("note.update") }}'
        @else
            action='{{ Route("note.store") }}'
        @endif>

        @csrf
        {{-- O método é patch apenas se for pra update, conforme o controller no método NoteController.edit  --}}
        @if(isset($situattion))
            @method('PATCH')
            <input type="hidden" name="note_id" value="{{ $note['id'] }}">
        @endif

        <div class="row mt-3">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Note Title</label>
                    <input type="text" class="form-control bg-primary text-white" required minlength="3" name="title" maxlength="300" value="{{ $note['title'] ?? old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Note Text</label>
                    <textarea class="form-control bg-primary text-white" required minlength="3" name="text" rows="5">{{ $note['text'] ?? old('text') }}</textarea>
                    @error('text')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-end">
                <a href="{{ Route('main') }}" class="btn btn-primary px-5"><i class="fa-solid fa-ban me-2"></i>Cancel</a>
                <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-circle-check me-2"></i>@if(isset($situattion))
                    Update
                @else
                    Save
                @endif</button>
            </div>
        </div>
    </form>

</div>
@endsection
