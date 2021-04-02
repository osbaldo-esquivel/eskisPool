@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>What would you like to do?</h1>
    </div>
    <div class="row">
        <div class="card">
            <ul>
                <li>
                    <a href="{{ route('pool') }}">Pool</a>
                </li>
                <li>
                    <a href="{{ route('posoy-dos') }}">Posoy Dos</a>
                </li>
                <li>
                    <a href="{{ route('kings-cup') }}">King's Cup</a>
                </li>
                <li>
                    <a href="{{ route('hiit') }}">HIIT</a>
                </li>
                <li>
                    <a href="{{ route('power-hour') }}">Power Hour</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection