
function resize() {
	$('#slider').height($('#slider').children('.aslide').height());
}
$(window).resize(resize);
$(window).load(resize);


// Nav Scroll

$(document).ready(function() {
  $('.nav').onePageNav({
    filter: ':not(.external)',
    begin: function() {
      console.log('start')
    },
    end: function() {
      console.log('stop')
    }
  });

});


jQuery.validator.addMethod("mobile", function(value, element) {
  return this.optional(element) || value.match(/^[1-9][0-9]*$/);
}, "Please enter the number without beginning with '0'");

jQuery.validator.addMethod("alphabets", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
}, "Please enter Alphabets only");

jQuery.validator.addMethod("email", function(value, element) {
  return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
}, "Please enter a valid email address.");
// Form Validation

var priceValidate;
var instantValidate;

if ($('#ContactForm').length > 0) {
  $('#ContactForm').validate({        
    rules: {
      name: {
        required: true,
        alphabets: true,
        maxlength: 100
      },
      CountryCode: {
        required: true
      },
      mobile: {
        required: true,
        number: true,
        mobile: true,
        minlength: 10,
        maxlength: 10
      },
      email: {
        required: true,
        email: true
      },
      comment: {
        required: true,
      }
    },
    submitHandler: function(form) {
      $(form).find(':submit').prop('disabled', true);
      form.submit();
    }
  });
}



if ($('#PopupForm').length > 0) {
  $('#PopupForm').validate({
    rules: {
      name: {
        required: true,
        alphabets: true,
        maxlength: 100
      },
      CountryCode: {
        required: true
      },
      mobile: {
        required: true,
        number: true,
        mobile: true,
        minlength: 10,
        maxlength: 10
      },
     email: {
        required: true,
        email: true
      }, 
            /*comment: {
                required: true,
              }*/
            },
            submitHandler: function(form) {
              $(form).find(':submit').prop('disabled', true);
              form.submit();
            }
          });
}


if ($('#pricepopup').length > 0) {
  priceValidate = $('#pricepopup').validate({
    rules: {
      name: {
        required: true,
        alphabets: true,
        maxlength: 100
      },
      CountryCode: {
        required: true
      },
      mobile: {
        required: true,
        number: true,
        mobile: true,
        minlength: 10,
        maxlength: 10
      },
      email: {
        required: true,
        email: true
      },
            /*comment: {
                required: true,
              }*/
            },
            submitHandler: function(form) {
              $(form).find(':submit').prop('disabled', true);
              form.submit();
            }
          });
}

if ($('#InstantCallback').length > 0) {
 instantValidate= $('#InstantCallback').validate({
  rules: {
    name: {
      required: true,
      alphabets: true,
      maxlength: 100
    },
    CountryCode: {
      required: true
    },
    mobile: {
      required: true,
      number: true,
      mobile: true,
      minlength: 10,
      maxlength: 10
    },
  /*  email: {
      required: true,
      email: true
    },*/
            /*comment: {
                required: true,
              }*/
            },
            submitHandler: function(form) {
              $(form).find(':submit').prop('disabled', true);
              form.submit();
            }
          });
}


if ($('#sitevisitform').length > 0) {
  $('#sitevisitform').validate({
    rules: {
      name: {
        required: true,
        alphabets: true,
        maxlength: 100
      },
      mobile: {
        required: true,
        number: true,
        mobile: true,
        minlength: 10,
        maxlength: 10
      } ,
      email: {
        required: true,
        email: true
      },

    },
    submitHandler: function(form) {
      $(form).find(':submit').prop('disabled', true);
      form.submit();
    }
  });
}



if ($('#speake_to_expert').length > 0) {
  $('#speake_to_expert').validate({
    rules: {
      mobile: {
        required: true,
        number: true,
        mobile: true,
        minlength: 10,
        maxlength: 10
      },
      CountryCode: {
        required: true
      }
    },
    submitHandler: function(form) {
      $(form).find(':submit').prop('disabled', true);
      form.submit();
    }
  });
}

/*popup js starts here*/
$(window).load(function() {
  if (!Get_Cookie('popout')) {

    if ($(window).width() > 550) {
      window.setTimeout(function() {
        $('#popupModal').modal({
                    /*backdrop: 'static',
                    keyboard: false*/
                  });
      }, 3000);
    }
  }
});

$('#popupModal .close').click(function() {
  Set_Cookie('popout', 'it works');
});
$('#popupModal').on('hide.bs.modal',function(){
  Set_Cookie('popout', 'it works');
});

$('.pricepop').click(function() {
  var pricePopup = $('#price');
  pricePopup.find('input[name=source]').val('Price Popup');
  pricePopup.find('strong').html('Please enter the details below to get the detailed pricing information.');
  pricePopup.modal();
  $('#price').on('hidden.bs.modal',function(){        
    $(this).find('.has-error').removeClass('has-error');
    priceValidate.resetForm();
  });
});

$('#bookvisit').click(function() {
  var pricePopup = $('#sitevisit');
  pricePopup.modal();
  $('#sitevisit').on('hidden.bs.modal',function(){        
    $(this).find('.has-error').removeClass('has-error');
    priceValidate.resetForm();
  });
});

$('.inquireButton').click(function(){
  var inquirePopup = $('#price');
  inquirePopup.find('input[name=source]').val('Inquiry Form - Mobile');
  inquirePopup.find('strong').html('Enter your details for project information.');
  inquirePopup.modal();
});

/*popup js ends here*/

jQuery(function($) {
  $(document).ready(function() {
    "use strict";
    var instantFlag = false;
    var hotlineFlag = false;
    $("#instant-callback-div .instant-switch").click(function() {
      $('#instant-callback-div').addClass('opened');
      $("#instant-callback-div").animate({
        "right": $("#instant-callback-div").css('right') == "-1px" ? "-247px" : "-1px"
      }, 500);
      instantFlag = true;
      if (hotlineFlag) {
        $("#hotline-div").animate({
          "right": "-277px"
        }, 500);
        hotlineFlag = false;
      }
     
    });
    $("#hide").click(function() {
      $('#instant-callback-div').removeClass('opened');
      $("#instant-callback-div").animate({
        "right": "-247px"
      }, 500);
      instantFlag = false;
      $('#InstantCallback').find('.has-error').removeClass('has-error');
      instantValidate.resetForm();
    });

    $("#hotline-div .hotline-switch").click(function() {
      $("#hotline-div").animate({
        "right": "-1px"
      }, 500);
      hotlineFlag = true;
      if (instantFlag) {
        $("#instant-callback-div").animate({
          "right": "-246px"
        }, 500);
        instantFlag = false;
      }
    });
    $("#hide-hotline").click(function() {
      $("#hotline-div").animate({
        "right": "-245px"
      }, 500);
      hotlineFlag = false;
    });
  });
});

