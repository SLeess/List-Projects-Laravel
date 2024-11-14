@extends('Layouts.Main_layout')
@section('body')
<div class="col">
    <x-navBar/>

    @if (count($notes) > 0)
        <!-- notes are available -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ Route('newNote') }}" class="btn btn-secondary px-3">
                <i class="fa-regular fa-pen-to-square me-2"></i>New Note
            </a>
        </div>

        <div class="row">
            <div class="col">
                <div class="card p-4">
                    @foreach ($notes as $item)
                        @include('note')
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <!-- no notes available -->
        <div class="row mt-5">
            <div class="col text-center">
                <p class="display-6 mb-5 text-secondary opacity-50">You have no notes available!</p>
                <a href="{{ Route('newNote') }}" class="btn btn-secondary btn-lg p-3 px-5">
                    <i class="fa-regular fa-pen-to-square me-3"></i>Create Your First Note
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
