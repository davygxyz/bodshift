//===== DROPZONE CONFIGURATION =====

Dropzone.options.myAwesomeDropzone = {
  // Prevents Dropzone from uploading dropped files immediately
    init: function () {
        // Set up any event handlers
        this.on('complete', function () {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                location.reload();
            }
        });
    }
    };
//===== DROPZONE CONFIGURATION END=====


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
  /*Body Journey slider end*/

  /*Age on profile page Start*/
  var age = document.getElementById('age-js').innerHTML;
  function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
  }
    document.getElementById('age-js').innerHTML = " "+getAge(age);
    /*Age on profile page End*/