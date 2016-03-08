$(function() { // begin document ready

$(window).scroll(function() {

    var position = $(this).scrollTop();

    $('section').each(function() {
        var target = $(this).offset().top;
        var id = $(this).attr('id');
        // highlighting bug - workaround below- fix later
        target -= 100; 
        
        if (position >= target) {
            $('ul.nav li a').removeClass('active');
            $('ul.nav li a[href=#' + id + ']').addClass('active');

            if ( $("a.home-link").hasClass("active") ) {
              $("div.cube").removeClass("show-back").removeClass("show-right").removeClass("show-left").removeClass("show-top").addClass("show-front");
            } else if ( $("a.about-link").hasClass("active") ) {
              $("div.cube").removeClass("show-front").removeClass("show-right").removeClass("show-left").removeClass("show-top").addClass("show-back");
            } else if ( $("a.skills-link").hasClass("active") ) {
              $("div.cube").removeClass("show-front").removeClass("show-back").removeClass("show-left").removeClass("show-top").addClass("show-right");
            } else if ( $("a.portfolio-link").hasClass("active") ) {
              $("div.cube").removeClass("show-front").removeClass("show-back").removeClass("show-right").removeClass("show-top").addClass("show-left");
            } else if ( $("a.contact-link").hasClass("active")) {
              $("div.cube").removeClass("show-front").removeClass("show-back").removeClass("show-right").removeClass("show-left").addClass("show-top")
            }
        }
    });
});

window.addEventListener( 'DOMContentLoaded', init, false);
var init = function() {
    var box = document.querySelector('.container').children[0],
        showPanelButtons = document.querySelectorAll('.nav li a'),
        panelClassName = 'show-front',

        onButtonClick = function( event ){
          box.removeClassName( panelClassName );
          panelClassName = event.target.className;
          box.addClassName( panelClassName );
        };

    for (var i=0, len = showPanelButtons.length; i < len; i++) {
      showPanelButtons[i].addEventListener( 'click', onButtonClick, false);
    }
};

}); // end document ready


