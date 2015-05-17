$(function() {
  $(function(){
    $( ".progress-pic:last-child" ).prepend("<div class='small-12 columns text-centered'>Current Picture</div>");
    $( ".progress-pic:last-child" ).css('margin-top','0px');
  });

  function get_width(){
    var widths = [];
    $('.progress-pic').each(function(){
      widths.push(parseInt($('.progress-pic').css('width'))) ;
    });
    var total_width = 0;
    $.each(widths,function(){
      total_width += this;
    })
    return total_width;
  };


  setInterval(function() {
    var total_width = get_width()+300;
    var left_limit = total_width *.075;
    var right_limit = total_width/-1.1;
    var left1 = parseInt($('#track1').css('left'));
    $('#track1').css('width', total_width);


    if ($('#left1').is(":hover")) {
        $('#track1').css('left', left1+2);
    }else if ($('#right1').is(":hover")) {
        $('#track1').css('left', left1-2);
    }


     if (parseInt($('#track1').css('left')) == Math.round(right_limit) || parseInt($('#track1').css('left')) == Math.round(right_limit)+5){
      $('#right1').toggle();
    }else if (parseInt($('#track1').css('left')) == Math.round(left_limit) || parseInt($('#track1').css('left')) == Math.round(left_limit)+5){
      $('#left1').toggle();
    };

    }, 6);
  });
