@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @mobile<div class="col-md-12">@endmobile
            @notmobile<div class="col-md-16">@endnotmobile
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Rules
                          </button>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <p class="card-text">Winner takes the pool <img src="/images/money1.png" width="40" height="40"></p>
                            <p class="card-text">Picks can be submitted at any time up until 5 PM PST on Thursdays when there is TNF, otherwise, they are due Sunday by 6:00 AM PST.</p>
                            <p class="card-text">In case there is a tie in picks, the tiebreaker will be whoever is closest to the total score of the MNF game. If there is a tie with scores, the pool will be split between the winners.</p>
                            <p class="card-text">There is no fee, but if you want to buy David a beer, that's fine.</p>
                        </div>
                      </div>
                    </div>
                </div>
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
                                    <th>Teams</th>
                                    <th>MNF Score</th>
                                    <th>Wins</th>
                                </tr>
                            </thead>
                            <tbody>                              
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
{{--                             <h5>Players: {{ $pool ? $pool['total'] : 0 }}</h5>
                            <h5>Pool amount: ${{ $pool ? $pool['total'] * 5 : 0 }}</h5> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
