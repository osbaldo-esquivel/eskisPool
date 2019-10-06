@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Week {{ config('pool.week') }}</h1>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th>Away Team</th>
                                <th>Home Team</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST" action="saveWins">
                                @foreach ($games->getGames() as $game)
                                    <tr>
                                        <td>
                                            <img src="{{ URL::asset('/images/' . $game->away_team . '.ico') }}" 
                                            alt="{{ $game->away_team }}" 
                                            height="40" width="40">
                                            <input name="{{ $loop->index }}" type="checkbox" value="{{ $game->away_team }}">
                                        </td>
                                        <td>
                                            <img src="{{ URL::asset('/images/' . $game->home_team . '.ico') }}" 
                                            alt="{{ $game->home_team }}" 
                                            height="40" width="40">
                                            <input name="{{ $loop->index }}" type="checkbox" value="{{ $game->home_team }}">
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <input type="number" min="0" max="150" name="score">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-primary submit">Submit</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

