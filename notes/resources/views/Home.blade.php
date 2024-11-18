@extends('Layouts.Main_layout')

@section("css")
@endsection

@section('body')
<div class="col">
    <x-navBar/>

    @error('Error')
        <div class="row">
            <div class="">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 alert alert-danger d-flex flex-column justify-content-center align-items-center text-center mx-auto">
                    <h3>Erro!</h3>
                    {{ session('Error') }}
                </div>
            </div>
        </div>
    @enderror
        {{-- {{Session::flash('message', 'This is a message!') }} --}}

    @if (count($notes) > 0)
        {{-- notes are available --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ Route('note.create') }}" class="btn btn-secondary px-3">
                <i class="fa-regular fa-pen-to-square me-2"></i>New Note
            </a>
        </div>

        <div class="row mb-5">
            <div class="col">
                @foreach ($notes as $item)
                    @include('Note')
                @endforeach
            </div>
        </div>
    @else
        {{--no notes available--}}
        <div class="row mt-5">
            <div class="col text-center">
                <p class="display-6 mb-5 text-secondary opacity-50">You have no notes available!</p>
                <a href="{{ Route('note.create') }}" class="btn btn-secondary btn-lg p-3 px-5">
                    <i class="fa-regular fa-pen-to-square me-3"></i>Create Your First Note
                </a>
            </div>
        </div>
    @endif
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
@endsection
