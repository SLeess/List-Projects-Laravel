@extends('Layouts.Main_layout')
@section('body')

<div class="col-md-6 col-sm-8" style="max-width: 580px">
    <div class="card p-5">

        {{-- <!-- logo --> --}}
        <div class="text-center p-3">
            <img src="{{asset('images/logo.png')}}" alt="Notes logo">
        </div>

        {{-- <!-- form --> --}}
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <form action="{{ Route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="text_username" class="form-label">Username</label>
                        <input type="text" class="form-control bg-dark text-info" name="username" required value="{{ old('username') ?? '' }}">
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="text_password" class="form-label">Password</label>
                        <input type="password" class="form-control bg-dark text-info" name="password" required value="{{ old('password') ?? ''}}">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- <!-- copy --> --}}
        <div class="text-center text-secondary mt-3">
            <small>&copy; {{ date('Y') }} Notes</small>
        </div>

    </div>
</div>
@endsection
