function mobileMenu(){
    $(".cube-mobile figure.front").on("click", function(){
        $("aside").fadeIn();
        $("html").addClass("stop-scroll");
        $("ul.nav li a")
        .blast({ 
            delimiter: "character"
        })
        .velocity("fadeIn", { 
            duration: 1250,
            stagger: 40,
            delay: 100
        })
        $("ul.nav li a").addClass("block");
        $(this).find("p").hide();
        $("figure.back p").show();
        $(".cube-mobile").css({
            "transform": "translateZ(-100px)",
            "transform": "rotateX(-180deg)"
        });
    });

    $(".cube-mobile figure.back").on("click", function(){
        $("aside").fadeOut();
        $("ul.nav li a").removeClass("block");
        $("html").removeClass("stop-scroll");
        $(this).find("p").hide();
        $("figure.front p").show();
        $(".cube-mobile").css({
            "transform": "translateZ(-100px)",
            "transform": "rotateY(0deg)"
        });
    });

    $("ul.nav li a").on("click", function(){
        if ($(window).width() < 600) {
            $("aside").fadeOut();
            $("html").removeClass("stop-scroll");
            $(".cube-mobile figure.back").find("p").hide();
            $("figure.front p").show();
            $(".cube-mobile").css({
                "transform": "translateZ(-100px)",
               "transform": "rotateY(0deg)"
            });
        };
    });
};

function homeText() {
	$(".home-content h1, .home-content h2")
	.css("opacity", "1")
	.blast({ 
		delimiter: "character"
	})
	.velocity("fadeIn", { 
		duration: 1250,
		stagger: 60,
		delay: 400
	});
};

function navScrollCubeRotate() {
    $(window).scroll(function() {

        var position = $(this).scrollTop();

        $('section').each(function() {
            var target = $(this).offset().top;
            var id = $(this).attr('id');
            target -= 100; 

            $cube = $("div.cube")
            
            if (position >= target) {
                $('ul.nav li a').removeClass('active');
                $('ul.nav li a[href=#' + id + ']').addClass('active');

                if ( $("a.home-link").hasClass("active") ) {
                  $cube.removeClass("show-back show-right show-left show-top").addClass("show-front");
                } else if ( $("a.about-link").hasClass("active") ) {
                  $cube.removeClass("show-front show-right show-left show-top").addClass("show-back");
                } else if ( $("a.skills-link").hasClass("active") ) {
                  $cube.removeClass("show-front show-back show-left show-top").addClass("show-right");
                } else if ( $("a.portfolio-link").hasClass("active") ) {
                  $cube.removeClass("show-front show-back show-right show-top").addClass("show-left");
                } else if ( $("a.contact-link").hasClass("active")) {
                  $cube.removeClass("show-front show-back show-right show-left").addClass("show-top");
                }
            };
        });
    });
};

// function rotateCube() {
//     $.fn.hasClassName = function(a){
//         return new RegExp("(?:^|\\s+)" + a + "(?:\\s+|$)").test(this.className) 
//     };

//     $.fn.addClassName = function(a){
//          if (!this.hasClassName(a)) {
//                 this.className = [this.className, a].join(" ");
//          }
//     };

//     $.fn.removeClassName = function(b){
//         if (this.hasClassName(b)) {
//             var a = this.className;
//             this.className = a.replace(new RegExp("(?:^|\\s+)" + b + "(?:\\s+|$)", "g"), " ");
//         }
//     };

//     $.fn.toggleClassName = function(a){
//         this[this.hasClassName(a) ? "removeClassName" : "addClassName"](a);
//     };

//     $cube = $(".cube");
//     $navLink = $(".nav li a");
//     $panelClass = "show-front";

//     $navLink.on("click", function(){
//         console.log("cliclk");
//         $cube.removeClassName($panelClass);
//         $panelClass = $(this).attr("class");
//         $cube.addClassName($panelClass);
//     })
// };


$(function() { // begin document ready
    mobileMenu();
    homeText();
    navScrollCubeRotate();
}); // end document ready


