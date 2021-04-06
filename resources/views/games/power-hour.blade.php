@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Power Hour</h1>
    </div>
    <div class="row">
        <div class="card">
            <div class="eski-timer">
                <p id="timer">0h 0m 0s</p>
            </div>
            <div class="btn-group">
                <button class="btn btn-success" onClick="setTimer(60)">
                    Power Hour (60 mintues)
                </button>
                <button class="btn btn-success" onClick="setTimer(100)">
                    Century Club (100 minutes)
                </button>
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" id="start" disabled>
                    Start
                </button>
                <button class="btn btn-primary" id="reset">
                    Reset
                </button>
                <audio id="audio" src="/sounds/bell.wav"></audio>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
var time = 0;
var start_button = document.getElementById('start');
var reset_button = document.getElementById('reset');
var timer = document.getElementById('timer');
var clicked = false;

function setTimer(minutes) {
    time = minutes;

    time == 60
        ? timer.innerText = '0h 60m 0s'
        : timer.innerText = '1h 40m 0s';

    start_button.disabled = false;
}

start_button.addEventListener('click', function() {
    start_button.disabled = true;
    
    var nowDate = new Date();

    var countDownDate = new Date(nowDate.getTime() + (time * 60000)).getTime();
    
    var x = setInterval(function() {    
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        timer.innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
        
        if (distance < 0) {
            clearInterval(x);

            timer.innerHTML = "Nice.";
        }

        var y = setInterval(function() {
            var nowDate1 = new Date();

            var countDownDate1 = new Date(nowDate1.getTime() + 60000).getTime();

            var distance1 = countDownDate1 - nowDate1;
        
            if (distance1 < 0) {
                clearInterval(y);

                document.getElementById('audio').play();
            }
        }, 1000);
    }, 1000);

    reset_button.addEventListener('click', function() {
        clearInterval(x);

        timer.innerText = '0h 0m 0s';

        start_button.disabled = true;
    });
});

function play() {
    var audio = document.getElementById('audio');

    audio.play();
}
</script>
@endsection