@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Power Hour</h1>
    </div>
    <div class="row">
        <div class="card">
            <div class="eski-timer">
                <p id="timer"></p>
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
                <button class="btn btn-primary timerstart" id="start" onClick="startTimer()">
                    Start
                </button>
                <button class="btn btn-primary timereset" id="reset" onClick="resetTimer()">
                    Reset
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    time = 0;

    function setTimer(minutes) {
        time = minutes;
    }

    function startTimer() {
        var start_button = document.getElementById('start');
        var reset_button = document.getElementById('reset');
        var timer = document.getElementById('timer');
        
        start_button.innerText = 'Pause';

        start_button.addEventListener('click', function() {
            // TODO
        });

        reset_button.addEventListener('click', function() {
            clearInterval(x);
        });

        var nowDate = new Date();

        var countDownDate = new Date(nowDate.getTime() + (time * 60000)).getTime();
        
        var x = setInterval(function() {    
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            timer.innerHTML = minutes + "m " + seconds + "s ";
            
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "YOU MADE IT";
            }
        }, 1000);
    }
</script>
@endsection