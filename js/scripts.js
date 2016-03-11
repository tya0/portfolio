$(function() { // begin document ready

	$(".home-content h1, .home-content h2")
	.blast({ 
		delimiter: "character",
		customClass: 'name'
	})
	.velocity("fadeIn", { 
		display: "null",
		duration: 950,
		stagger: 40,
		delay: 400
	});

	//function start() {
	//  $(".arrow").velocity(
	//    { 
	//      translateY: [ 125, 0 ]
	//    },
	//    { 
	//      duration: 2100,
	//      delay: 0,
	//      easing: "linear",
	//      complete: start
	//    });
	//}
	//start();

	//$('.cube').velocity({
	//  rotateX: '270deg',
	//  rotateY: '50deg'
	//},{
	//  duration:2000,
	//  loop:true,
	//  easing:'linear'
	//});

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

    Element.prototype.hasClassName = function (a) {
        return new RegExp("(?:^|\\s+)" + a + "(?:\\s+|$)").test(this.className);
    };

    Element.prototype.addClassName = function (a) {
        if (!this.hasClassName(a)) {
            this.className = [this.className, a].join(" ");
        }
    };

    Element.prototype.removeClassName = function (b) {
        if (this.hasClassName(b)) {
            var a = this.className;
            this.className = a.replace(new RegExp("(?:^|\\s+)" + b + "(?:\\s+|$)", "g"), " ");
        }
    };

    Element.prototype.toggleClassName = function (a) {
      this[this.hasClassName(a) ? "removeClassName" : "addClassName"](a);
    };

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


