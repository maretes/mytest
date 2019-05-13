/*------------------------------------------------accordion FQA------------------------------*/
$(document).ready(function () {

    $(".accordion .answer").hide().prev().click(function () {
        $(this).parents(".accordion").find(".answer").not(this).slideUp(300).prev().removeClass("active");
        $(this).next().not(":visible").slideDown(300).prev().addClass("active");
    });
});


/*----------------------------- FANCYBOX --------------------------*/

// $(document).ready(function () {
//     $(".lightbox a").fancybox({
//         ajax: {
//             type: "POST"
//         }
//     });
// });

/*----------------------------- HEADER -----------------------------*/
// $(document).ready(function () {
//     $("#sticker").sticky({topSpacing: 0});
// });

/*----------------------------- MENU -----------------------------*/
// $(document).ready(function () {
//     $('a[href^="#"]').bind('click.smoothscroll', function (e) {
//         e.preventDefault();
//
//         var target = this.hash,
//             $target = $(target);
//         $('html, body').stop().animate({
//             'scrollTop': $target.offset().top
//         }, 900, 'swing', function () {
//             window.location.hash = target;
//         });
//     });
// });
/*----------------------------- NAVIGATION -----------------------*/
$(document).ready(function () {
    $('#toggle').click(function () {
        $(this).toggleClass('active');
        $('.menu-menu1-container, .menu-menu2-container').toggleClass('open');
        $('.menu-menu_1_en-container, .menu-menu_2_en-container').toggleClass('open');
    });
    $('.menu-item').click(function () {
        $('#toggle').removeClass('active');
        $('.menu-menu1-container, .menu-menu2-container').removeClass('open');
        $('.menu-menu_1_en-container, .menu-menu_2_en-container').removeClass('open');
    });
});
//
// /* --------------------------- PROJECTS (LOAD MORE) ------------------------------------*/
//
// $(document).ready(function () {
//     $('.load-more').click( function(){
//         $('.project').show('fast');
//         $(this).css('display', 'none');
//         $('.turn').css('display', 'block');
//     });
//     $('.turn').click(function() {
//         $('.project:nth-child(n+5)').hide('fast');
//         $(this).css('display', 'none');
//         $(".load-more").css('display', 'block');
//     })
// });


/* --------------------------- EVENTS (LOAD MORE) ------------------------------------*/

$(document).ready(function () {
    $('.event-load-more').click( function(){
        $('.home-event').show('fast');
        $(this).css('display', 'none');
        $('.event-turn').css('display', 'flex');
    });
    $('.event-turn').click(function() {
        $('.home-event:nth-child(n+9)').hide('fast');
        $(this).css('display', 'none');
        $(".event-load-more").css('display', 'flex');
    })
});
/* to top button*/
$(document).ready(function() {
    $(window).scroll(function() {
        //--------------------------- Lines added ------------------------//
        var footertotop = ($('.site-footer').position().top);
        var scrolltop = $(document).scrollTop() + window.innerHeight;
        var difference = scrolltop-footertotop;
        if (scrolltop > footertotop) {
            $('.go-top').css({'bottom' : difference});
        }else{
            $('.go-top').css({'bottom' : 10});
        };
        //--------------------------- end ---------------------------------//
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
            $('.go-top').css({'display' : 'flex'});
        } else {
            $('.go-top').fadeOut(200);
        }
    });
    $('.go-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 300);
    })
});
/* --------------------------- HOMEPAGE VALUABLES FUNCTION ------------------------------------*/
$(document).ready(function () {
    $('.front-page__valuables-section__item__wrapper').click(function () {
        $('.front-page__valuables-section__item__wrapper').removeClass('front-page__valuables-section__item__content__show');
        $(this).toggleClass('front-page__valuables-section__item__content__show');
    });
});
/* --------------------------- HOMEPAGE PARTNERS SLIDER ------------------------------------*/
$(document).ready(function(){
    $('.front-page__partners-section__slider').slick({
        slidesToShow: 6,
        slidesToScroll: 2,
        autoplay: true,
        arrows: true,
        autoplaySpeed: 2000,
        nextArrow: ".front-page__partners-section__slider__next",
        prevArrow: ".front-page__partners-section__slider__prev",
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 1100,
                settings: {
                    arrows: false,
                    slidesToShow: 4
                }
            },
        ]
});
});
/*-----------------------------SUPPORT BUTTON MODAL----------------------------*/
// $(document).ready(function () {
//     $('.support-button').click(function () {
//         $('.support-button__modal').toggleClass('support-button__modal__show');
//     });
//     $('.support-button__modal__close').click(function () {
//         $('.support-button__modal').toggleClass('support-button__modal__show');
//     })
// });
var elements = $('.modal-overlay, .modal');

$('#close_modal').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});