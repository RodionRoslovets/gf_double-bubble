document.addEventListener("DOMContentLoaded", function() {



});

$(document).ready(function() {

    $('.country-call').click(function (e) {
        e.preventDefault();
        $('.country-modal').toggleClass('country-modal__active');
    })
    $(document).mouseup(function (e) {
        let el = $('.country-modal');
        if(el.is(e.target)
            && el.has(e.target).length === 0) {
            el.toggleClass('country-modal__active');
        }
    });
    $('.country-modal__close').click(function (e) {
        e.preventDefault();
        $('.country-modal').toggleClass('country-modal__active');
    })

    $(".btn-down").click(function () {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        $('html').animate({ scrollTop: destination }, 1100);
        return false;
    });

    $('.search-header-btn').click(function (e) {
        e.preventDefault();
        // console.log('click');
        $('.search-form').toggleClass('active-form');
    });

    $('.villas-slider-main').owlCarousel({
        nav: false,
        dots: false,
        dotsData: false,
        dotsContainer: false,
        margin: 15,
        responsiveClass:true,
        responsiveBaseElement:"body",
        responsive:{
            0:{
                items:1.3,
                loop: true,
            },
            700:{
                items:2,
                loop: true,
            },
            1140:{
                items:3
            }
        }
    });

    var owlVi=$(".villas-slider-main");
    owlVi.owlCarousel();
    //$(".next") - находим нашу кнопку
    $(".villas-arrow-right-btn").on("click", function(e){
        e.preventDefault();
        owlVi.trigger("prev.owl.carousel");
    });
    $(".villas-arrow-left-btn").on("click", function(e){
        e.preventDefault();
        owlVi.trigger("next.owl.carousel");
    });


    $('.bottom-row-list').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        responsiveBaseElement:"body",
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
            }
        }
    });


    $('.tours-slider-main').owlCarousel({
        nav: false,
        dots: false,
        dotsData: false,
        margin:15,
        dotsContainer: false,
        responsiveBaseElement:"body",
        responsive:{
            0:{
                items:1.3,
                loop: true,
            },
            700:{
                items:2,
                loop: true,
            },
            1140:{
                items:3
            }
        }
    });

    var owlTo=$(".tours-slider-main");
    owlTo.owlCarousel();
    //$(".next") - находим нашу кнопку
    $(".arrow-right-btn-tours").on("click", function(e){
        e.preventDefault();
        owlTo.trigger("prev.owl.carousel");
    });
    $(".arrow-left-btn-tours").on("click", function(e){
        e.preventDefault();
        owlTo.trigger("next.owl.carousel");
    });

    $('.clubs-slider-main').owlCarousel({
        nav: false,
        dots: false,
        dotsData: false,
        margin:15,
        dotsContainer: false,
        responsiveBaseElement:"body",
        responsive:{
            0:{
                items:1.3,
                loop: true,
            },
            700:{
                items:2,
                loop: true,
            },
            1140:{
                items:3
            }
        }
    });

    var owlCl=$(".clubs-slider-main");
    owlCl.owlCarousel();
    //$(".next") - находим нашу кнопку
    $(".arrow-right-btn-clubs").on("click", function(e){
        e.preventDefault();
        owlCl.trigger("prev.owl.carousel");
    });
    $(".arrow-left-btn-clubs").on("click", function(e){
        e.preventDefault();
        owlCl.trigger("next.owl.carousel");
    });


    $('.filtering').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: $(".car-arrow-right"),
        prevArrow: $(".car-arrow-left"),

        responsive: [
            {
                breakpoint: 2400,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 2000,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 850,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });

    $('.events-slider').owlCarousel({
        nav: false,
        dots: false,
        dotsData: false,
        dotsContainer: false,
        margin: 15,
        responsiveBaseElement:"body",
        responsive:{
            0:{
                items:1.3,
                loop: true,
            },
            700:{
                items:3,
                loop: true,
            },
            1140:{
                items:3
            }
        }
    });

    var owl=$(".events-slider");
    owl.owlCarousel();
    //$(".next") - находим нашу кнопку
    $(".arrow-right-btn").on("click", function(e){
        e.preventDefault();
        owl.trigger("next.owl.carousel");
    });
    $(".arrow-left-btn").on("click", function(e){
        e.preventDefault();
        owl.trigger("prev.owl.carousel");
    });

    $('.slider-events-club').owlCarousel({
        nav:true,
        dots: false,
        loop: true,
        margin: 17,
        navText : ["",""],
        responsive:{
            0:{
                items:1,
                nav: false,
                margin: 0,
            },
            600:{
                items:1,
                nav: false,
                margin: 0,
            },
            1200:{
                items: 4
            },
            1700:{
                items: 5
            }
        }
    });

    $('.slider-video').owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        navText : ["",""],
        margin: 18,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1,
                nav: false,
            },
            1200:{
                items: 3
            },
            1700:{
                items: 4
            }
        }
    });

    $('.slider-event-foto').owlCarousel({
        nav: true,
        dots: false,
        // loop: true,
        navText : ["",""],
        margin: 18,
        responsive:{
            0:{
                items:1,
                nav: false,
            },
            600:{
                items:2,
                nav: false,
            },
            1200:{
                items: 3
            },
            1700:{
                items: 4
            }
        }
    });

    $('.restaurants-nearby-slider').owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        navText : ["",""],
        margin: 18,
        responsive:{
            0:{
                items:1,
                nav: false,
            },
            600:{
                items:2,
                nav: false,
            },
            992:{
                items: 3
            },
            1140:{
                items: 4
            },
        }
    });



    $('.drop-item > a, .drop-item-rotate').click(function() {
        $(this).parent().siblings().find('ul').slideUp(300);
        $(this).next('ul').stop(true, false, true).slideToggle(300);
        return false;
    });

    $('.btn-main-menu').click(function (e) {
        $('.right-full-menu').css({"right": "0"}).fadeIn(300);
        $('.shadow-screen').css({"right": "0"}).fadeIn(300);
        $("html, body").css("overflow","hidden");
        }
    );
    $('.cross-close').click(function (e) {
        e.preventDefault();
        $('.right-full-menu').fadeOut(300);
        $('.shadow-screen').fadeOut(300);
        $("html,body").css("overflow","auto");
    });
    $('.shadow-screen').click(function (e) {
        e.preventDefault();
        $(this).fadeOut(300);
        $("html,body").css("overflow","auto");
    });

    $('.villas-slider').fotorama({
        width: 774,
        maxwidth: 774,
        ratio: 16/9,
        allowfullscreen: true,
        nav: 'thumbs',
        fit: 'contain',
        // glimpse: 190,
        // navposition: 'top',
        // navwidth: 190,
        thumbwidth: 190,
        thumbheight: 106,
    });


    $('.villa-panorama').fotorama({
        width: 774,
        maxwidth: 774,
        ratio: 16/9,
        allowfullscreen: true,
        nav: 'thumbs',
        fit: 'contain',
        // glimpse: 190,
        // navposition: 'top',
        // navwidth: 190,
        thumbheight: 106,
        click: false,
        trackpad: false,
        swipe: false,
        arrows: false,
        startindex: 0,
        responsive : [
            {
                breakpoint:768,
                settings: {
                    swipe: false,
                }
            },
        ]


    });


//slider panorama
    $("#lightSlider").lightSlider({
        gallery:true,
        item:1,
        thumbItem:4,
        enableDrag: false,
        responsive : [
            {
                breakpoint:768,
                settings: {
                    swipe: false,
                }
            },
        ]

    });

    //Panorama slider
    $("a.club-panorama").on("click", function (e) {
        e.preventDefault();
        $(".panorama-slider").toggleClass('item__active');
    });

    $("a.close-panorama-slider").on("click", function (e) {
        e.preventDefault();
        $(".panorama-slider").toggleClass('item__active');
    });

    $("a.club-panorama2").on("click", function (e) {
        e.preventDefault();
        $(".panorama-slider2").toggleClass('item__active');
    });

    $("a.close-panorama-slider2").on("click", function (e) {
        e.preventDefault();
        $(".panorama-slider2").toggleClass('item__active');
    });

    // Menu slider
    $('.menu-foto-slider').fotorama({
        width: 1140,
        maxwidth: 1140,
        ratio: 16/9,
        allowfullscreen: true,
        nav: 'thumbs',
        fit: 'contain',
        // glimpse: 190,
        // navposition: 'top',
        // navwidth: 190,
        thumbwidth: 190,
        thumbheight: 106,
    });

    $("a.open-menu").on("click", function (e) {
        e.preventDefault();
        
        $(".menu-slider").toggleClass('item__active');
    });

    $("a.close-menu-slider").on("click", function (e) {
        e.preventDefault();
        $(".menu-slider").toggleClass('item__active');
    });


    $(".slideup-parent").on("click", function(){
        $(this).toggleClass("active");
        $(this).next(".slideup-child").slideToggle().toggleClass("active");
    });

    $(".mobile-filter").on("click", function(){
        $("#search-villas").slideToggle();
    });

    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 10,
            max: 50,
            values: [ 10, 50 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( ui.values[ 0 ]);
                $( "#amount2" ).val(  ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) );
        $( "#amount2" ).val( $( "#slider-range" ).slider( "values", 1 ) );
    } );


//Filter
    $('#filter').submit(function(){
        var filter = $(this);
        $.ajax({
            url:'http://' + location.host + '/wp-admin/admin-ajax.php', // обработчик
            data:filter.serialize(), // данные
            type:filter.attr('method'), // тип запроса
            beforeSend:function(xhr){
                filter.find('button').text('Загружаю...'); // изменяем текст кнопки
            },
            success:function(data){
                filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
                $('#response').html(data);
            }
        });
        return false;
    });

    $('.misha_loadmore').click(function(){

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : misha_loadmore_params.current_page
            };

        $.ajax({ // you can also use $.post here
            url : misha_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success : function( data ){
                if( data ) {
                    button.text( 'More posts' ).prev().before(data); // insert new posts
                    misha_loadmore_params.current_page++;

                    if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page )
                        button.remove(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });


});

$(document).mouseup(function (e){ // событие клика по веб-документу
    var div = $(".right-full-menu"); // тут указываем ID элемента
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        div.hide(300); // скрываем его
    }
});

$(window).on('load',windowSize);
function windowSize(){
    if ($(window).width() <= '1200'){
        $('.spoiler-item a').click(function(e){
            e.preventDefault();
            $(this).next().slideToggle();
            $(this).toggleClass('arrow-spoiler-item arrow-spoiler-item-180deg');
        });

        $('.drop-item > a, .drop-item-rotate').click(function() {
            $(this).toggleClass('drop-item-rotate');
        });
    }
}

// $(window).on('resize',windowReSize);
// function windowReSize(){
//     if ($(window).width() <= '1200'){
//         $('.spoiler-item').click(function(e){
//             e.preventDefault();
//             $(this).next().slideToggle();
//             $(this).toggleClass('arrow-spoiler-item arrow-spoiler-item-180deg');
//         });
//     }
// }

// $( window ).resize(function() {
//     if ($(window).width() <= '1140'){
//         $('.spoiler-item').click(function(e){
//             e.preventDefault();
//             $(this).next().slideToggle();
//             $(this).toggleClass('arrow-spoiler-item arrow-spoiler-item-180deg');
//         });
//     }
// });


document.addEventListener("DOMContentLoaded", function() {

    // Params
    let mainSliderSelector = '.main-slider',
        navSliderSelector = '.nav-slider',
        interleaveOffset = 0.5;

// Main Slider
    let mainSliderOptions = {
        loop: true,
        speed:1000,
        autoplay:{
            delay:3000
        },
        loopAdditionalSlides: 10,
        grabCursor: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            init: function(){
                this.autoplay.stop();
            },
            imagesReady: function(){
                this.el.classList.remove('loading');
                this.autoplay.start();
            },
            slideChangeTransitionEnd: function(){
                let swiper = this,
                    captions = swiper.el.querySelectorAll('.caption');
                for (let i = 0; i < captions.length; ++i) {
                    captions[i].classList.remove('show');
                }
                swiper.slides[swiper.activeIndex].querySelector('.caption').classList.add('show');
            },
            progress: function(){
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    let slideProgress = swiper.slides[i].progress,
                        innerOffset = swiper.width * interleaveOffset,
                        innerTranslate = slideProgress * innerOffset;

                    swiper.slides[i].querySelector(".slide-bgimg").style.transform =
                        "translateX(" + innerTranslate + "px)";
                }
            },
            touchStart: function() {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = "";
                }
            },
            setTransition: function(speed) {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = speed + "ms";
                    swiper.slides[i].querySelector(".slide-bgimg").style.transition =
                        speed + "ms";
                }
            }
        }
    };
    let mainSlider = new Swiper(mainSliderSelector, mainSliderOptions);

// Navigation Slider
    let navSliderOptions = {
        loop: true,
        loopAdditionalSlides: 10,
        speed:1000,
        spaceBetween: 5,
        slidesPerView: 5,
        centeredSlides : true,
        touchRatio: 0.2,
        slideToClickedSlide: true,
        direction: 'vertical',
        on: {
            imagesReady: function(){
                this.el.classList.remove('loading');
            },
            click: function(){
                mainSlider.autoplay.stop();
            }
        }
    };
    let navSlider = new Swiper(navSliderSelector, navSliderOptions);

// Matching sliders
    mainSlider.controller.control = navSlider;
    navSlider.controller.control = mainSlider;





});