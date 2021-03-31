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
