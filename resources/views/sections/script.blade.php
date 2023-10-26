<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/js/amcharts-core.min.js') }}"></script>
<script src="{{ asset('home/js/amcharts.min.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
<script src="{{ asset('home/js/yscountdown.min.js') }}"></script>
<script>
    let header1Width = $('#scroll-container').find('div')[0].clientWidth;
    let width = screen.width;
    if (header1Width > width) {
        $('#scroll-container').addClass('scroll-container');
    }
    let header1Width2 = $('#scroll-container2').find('div')[0].clientWidth;
    let width2 = screen.width;
    if (header1Width2 > width2) {
        $('#scroll-container2').addClass('scroll-container');
    }
    var endDate = "{{ \Carbon\Carbon::parse(now())->format('Y/m/d') }} {{  $end_market }}";
    var counterElement = document.querySelector("#counter");
    var Hours = $('#Hours');
    var Minutes = $('#Minutes');
    var Seconds = $('#Seconds');
    var myCountDown = new ysCountDown(endDate, function (remaining, finished) {
        var message = "";
        if (finished) {
            message = "Expired";
            $('#timer').text(message);
        } else {
            if (remaining.seconds < 10) {
                remaining.seconds = '0' + remaining.seconds;
            }
            if (remaining.minutes < 10) {
                remaining.minutes = '0' + remaining.minutes;
            }
            if (remaining.hours < 10) {
                remaining.hours = '0' + remaining.hours;
            }
            Hours.text(remaining.hours);
            Minutes.text(remaining.minutes);
            Seconds.text(remaining.seconds);
        }

    });
</script>
@yield('script')

