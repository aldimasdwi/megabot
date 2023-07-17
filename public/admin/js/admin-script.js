(function($) {

    "use strict";

    $(".mobile-toggle").click(function(){
        $(".nav-menus").toggleClass("open");
    });

    $(".mobile-search").click(function(){
        $(".form-control-plaintext").toggleClass("open");
    });

    $(".form-control-plaintext").keyup(function(e){
        if(e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    
    $('.tap-top').click( function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    var $ripple = $(".js-ripple");
    $ripple.on("click.ui.ripple", function(e) {
        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find(".c-ripple__circle");
        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;
        $circle.css({
            top: y + "px",
            left: x + "px"
        });
        $this.addClass("is-active");
    });

    $ripple.on("animationend webkitAnimationEnd oanimationend MSAnimationEnd", function(e) {
        $(this).removeClass("is-active");
    });

    $(".chat-menu-icons .toogle-bar").click(function(){
        $(".chat-menu").toggleClass("show");
    });

    NProgress.start(); // start    
    NProgress.set(0.4); // To set a progress percentage, call .set(n), where n is a number between 0..1
    NProgress.inc(); // To increment the progress bar, just use .inc(). This increments it with a random amount. This will never get to 100%: use it for every image load (or similar).If you want to increment by a specific value, you can pass that as a parameter
    NProgress.configure({ ease: 'ease', speed: 700 }); // Adjust animation settings using easing (a CSS easing string) and speed (in ms). (default: ease and 200)
    NProgress.configure({ trickleSpeed: 800 }); //Adjust how often to trickle/increment, in ms.
    NProgress.configure({ showSpinner: false });//Turn off loading spinner by setting it to false. (default: true)
    NProgress.configure({ parent: '.page-wrapper' });//specify this to change the parent container. (default: body)
    NProgress.done(); // end

    
})(jQuery);

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}


