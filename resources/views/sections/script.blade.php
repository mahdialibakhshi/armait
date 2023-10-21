<script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/js/amcharts-core.min.js') }}"></script>
<script src="{{ asset('home/js/amcharts.min.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
<script>
    let header1Width=$('#scroll-container').find('div')[0].clientWidth;
    let width = screen.width;
    if (header1Width>width){
        $('#scroll-container').addClass('scroll-container');
    }
    let header1Width2=$('#scroll-container2').find('div')[0].clientWidth;
    let width2 = screen.width;
    console.log(header1Width2);
    console.log(width2);
    if (header1Width2>width2){
        $('#scroll-container2').addClass('scroll-container');
    }
</script>

