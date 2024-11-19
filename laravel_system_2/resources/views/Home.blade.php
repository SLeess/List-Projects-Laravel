@extends('layouts.main_layout')

@section('content')
<p class="display-1 text-center">Hello</p>

@production
    <p>Estar em ambiente de production</p>
@else
    <p>Não estou em produção</p>
@endproduction

@env(['local', 'development'])
    <p>Estou no ambiente {{ env('APP_ENV') }}</p>
@endenv
@env('production')


@endenv

@endswitch
@endsection
