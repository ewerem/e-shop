//initializing my matrial design plugins

$(document).ready(function(){
    
    $('.button-collapse').sideNav();


//for the slider
    $("#slider-image").backstretch([
        "image/sh1.jpg",
        "image/sh2.jpg",
      ], {
        fade: 1000,
        duration: 1000
    });

//modal
$('#modal1').modal({
  opacity:.1
});

//collapse
 $('.collapsible').collapsible();

});

//parallax
    $('.parallax').parallax();
