@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @mobile<div class="col-md-12">@endmobile
            @notmobile<div class="col-md-16">@endnotmobile
                <div class="card">
                    <div class="card-header">
                        <h1>Pool amount: ${{ $pool['total'] * 5 }}</h1>
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
                                <tr>
                                    @foreach ($pool['info'] as $info)
                                        <td>{{ $info->username }}</td>
                                        @foreach (json_decode($info->picks) as $pick)
                                            <td>
                                                <img src="/images/{{ $pick }}.ico" height="30" width="30">
                                            </td>
                                        @endforeach
                                        <td>{{ $info->score }}</td>
                                        <td>{{ $info->wins }}</td>
                                    @endforeach                                    
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
