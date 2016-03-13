function mobileMenu(){
    $(".hamburger").on("click", function(){
        $(this).toggleClass("active");
        $("aside").toggle();
        $("ul.nav li a")
        .blast({ 
            delimiter: "character"
        })
        .velocity("fadeIn", { 
            //display: "null",
            duration: 1250,
            stagger: 40,
            delay: 100
        });
    })
};

function homeText() {
	$(".home-content h1, .home-content h2")
	.blast({ 
		delimiter: "character"
	})
	.velocity("fadeIn", { 
		//display: "null",
		duration: 1250,
		stagger: 60,
		delay: 400
	});
}

function navScroll() {
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
                  $("div.cube").removeClass("show-back show-right show-left show-top").addClass("show-front");
                } else if ( $("a.about-link").hasClass("active") ) {
                  $("div.cube").removeClass("show-front show-right show-left show-top").addClass("show-back");
                } else if ( $("a.skills-link").hasClass("active") ) {
                  $("div.cube").removeClass("show-front show-back show-left show-top").addClass("show-right");
                } else if ( $("a.portfolio-link").hasClass("active") ) {
                  $("div.cube").removeClass("show-front show-back show-right show-top").addClass("show-left");
                } else if ( $("a.contact-link").hasClass("active")) {
                  $("div.cube").removeClass("show-front show-back show-right show-left").addClass("show-top")
                }
            }
        });
    });
}

$(function() { // begin document ready
    mobileMenu();
    homeText();
    navScroll();






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


