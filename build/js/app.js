(function($){

    var mobileNavigation = function(){

        var $mobileBtn = $('.mobile-hamburger__button');
        var $mobileNav = $('.mobile-nav');

        $mobileBtn.on('click', function(e){
            e.stopPropagation();
            $('body').toggleClass('mobile-menu-opened');
            // $mobileNav.slideToggle();
        });
    }

    var closeMobileNavigation = function() {
        $('body').removeClass('mobile-menu-opened');
    }

    var scrollToNav = function(){

            var howItWorkLinks = $('.how-it-work-link').attr('href');

            if(!$('body').hasClass('homepage')) {

                var replaceLinks = howItWorkLinks.replace('#', '/#');

                $('.how-it-work-link').attr('href', replaceLinks);
            }

        $('.learn-more, .how-it-work-link').on('click', function(){

            var howItWorkPosition = $('.how-it-work').offset().top - 15;

            $('html, body').animate({ scrollTop: howItWorkPosition }, 800, 'swing');
        });
    }

    mobileNavigation();
    scrollToNav();

    $(document).on('click', function(){
        closeMobileNavigation();
    });
})(jQuery);
