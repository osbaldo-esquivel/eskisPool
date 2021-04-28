@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>HIIT</h1>
    </div>
    <div class="row">
        <div class="card">
            <form method="GET" action="/hiit/start">
                @csrf
                <div class="form-group">
                    <label for="intervals">Number of intervals</label>
                    <input class="form-control mb-3" id="intervals" type="number" name="intervals" min="1" max="100" step="1">
                    <label for="hiit-length">HIIT length (seconds)</label>
                    <input class="form-control mb-3" id="hiit-length" type="number" name="hiit-length" min="1" max="100" step="1">
                    <label for="rest-length">Rest length (seconds)</label>
                    <input class="form-control mb-3" id="rest-length" type="number" name="rest-length" min="1" max="100" step="1">
                    <label for="warmup-length">Warmup length (seconds)</label>
                    <input class="form-control mb-3" id="warmup-length" type="number" name="warmup-length" min="1" max="1000" step="1">
                    <label for="cooldown-length">Cooldown length (seconds)</label>
                    <input class="form-control mb-3" id="cooldown-length" type="number" name="cooldown-length" min="1" max="1000" step="1">
                    <button type="submit" class="btn btn-primary">Start</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection