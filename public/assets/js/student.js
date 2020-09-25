$("#login").on("submit",function(e){
    e.preventDefault();
    url = $(this).attr("action");
    data = $(this).serialize();
    $.post(url,data,function(resp){
        redata = JSON.parse(resp);
        if (redata.status == 'true') {
            window.location.href = redata.load;
        } else {
            swal({
                title: "Ohh snap!",
                text: `${redata.message}`,
                icon: "warning",
            });
        }
   })
})

var interval;
	function countdown() {
	  clearInterval(interval);
	  interval = setInterval( function() {
	      var timer = $('.js-timeout').html();
	      timer = timer.split(':');
	      var minutes = timer[0];
	      var seconds = timer[1];
	      seconds -= 1;
	      if (minutes < 0) return;
	      else if (seconds < 0 && minutes != 0) {
	          minutes -= 1;
	          seconds = 59;
	      }
	      else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

	      $('.js-timeout').html(minutes + ':' + seconds);

	      if (minutes == 0 && seconds == 0) { clearInterval(interval); alert('time UP'); }
	  }, 1000);
	}

	$('.js-timeout').text("59:00");
	countdown();
