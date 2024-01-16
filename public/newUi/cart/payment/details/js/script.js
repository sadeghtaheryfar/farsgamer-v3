var countDownData = new Date(2023, 8, 20)
    var x = setInterval(function () {
        var datetimeNow = new Date().getTime();
        var distance = countDownData - datetimeNow;

        if (distance > 0) {
            var dayTime = 1000 * 60 * 60 * 24;
            var hourTime = 1000 * 60 * 60;
            var minuteTime = 1000 * 60;

            var days = Math.floor(distance / dayTime);
            var hours = Math.floor((distance % dayTime) / hourTime);
            var minutes = Math.floor((distance % hourTime) / minuteTime);
            var secend = Math.floor((distance % minuteTime) / 1000);
        
            document.getElementById("days").innerHTML = (days<10)?'0'+days:days;
            document.getElementById("hours").innerHTML = (hours<10)?'0'+hours:hours;
            document.getElementById("minutes").innerHTML = (minutes<10)?'0'+minutes:minutes;
            document.getElementById("secend").innerHTML = (secend<10)?'0'+secend:secend;
        }else {
            clearInterval(x);
            document.getElementById("main-box").innerHTML = "...به زودی برمیگردیم";
        }
    }, 1000);