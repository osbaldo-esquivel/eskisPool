@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>What would you like to do?</h1>
        <ul>
            <li>
                <a href="{{ route('pool') }}">Pool</a>
            </li>
            <li>
                <a href="{{ route('posoy_dos') }}">Posoy Dos</a>
            </li>
            <li>
                <a href="{{ route('kings_cup') }}">King's Cup</a>
            </li>
        </ul>
    </div>
</div>
@endsection