@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Rules</h4>
                </div>
                <div class="card-body text-center">
                    <p class="card-text">Winner takes the pool <img src="/images/money1.png" width="40" height="40"></p>
                    <p class="card-text">Picks can be submitted at any time up until 5 PM PST on Thursdays when there is TNF, otherwise, they are due Sunday by 6:00 AM PST.</p>
                    <p class="card-text">In case there is a tie in picks, the tiebreaker will be whoever is closest to the total score of the MNF game. If there is a tie with scores, the pool will be split between the winners.</p>
                    <p class="card-text">There is no fee, but if you want to buy David a beer, that's fine.</p>
                    <button class="btn btn-secondary">
                        <a href={{ url('/dashboard') }}>Let's go</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
