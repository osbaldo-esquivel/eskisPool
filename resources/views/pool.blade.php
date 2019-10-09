@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @mobile<div class="col-md-12">@endmobile
            @notmobile<div class="col-md-16">@endnotmobile
                <div class="card">
                    <div class="card-header">
                        <h4>Pool</h4>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                        <table id="poolTable" class="table table-striped table-dark table-hover table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    @foreach ($pool['games'] as $game)
                                        <th>{{ ucfirst($game->away_team) }} @ {{ ucfirst($game->home_team) }}</th>
                                    @endforeach
                                    <th>MNF Score</th>
                                    <th>Wins</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($pool['info'] as $info)
                                        <tr>
                                            <td>{{ $info->username }}</td>
                                            @foreach (json_decode($info->picks) as $pick)
                                                <td @if (in_array($pick, json_decode($pool['admin']->wins))) style="background-color:yellow;" @endif>
                                                    <img src="/images/{{ $pick }}.ico" height="30" width="30">
                                                </td>
                                            @endforeach
                                            <td>{{ $info->score }}</td>
                                            <td>{{ $info->wins }}</td>
                                        </tr>
                                    @endforeach                                    
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center stats">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Stats</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="jumbotron">
                            <h5>Players: {{ $pool['total'] }}</h5>
                            <h5>Pool amount: ${{ $pool['total'] * 5 }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
