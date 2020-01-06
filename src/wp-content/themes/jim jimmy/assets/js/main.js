$ = jQuery;
let aurl = window.location.pathname;
aurl = aurl.replace("/", "");
if (aurl !== '' && aurl !== 'index.html')
    $('header ul li a[href$="' + aurl + '"]').parent('li').addClass('current-active');
else
    $('header ul li:first-child').addClass('current-active');
// Mobile
if (aurl !== '' && aurl !== 'index.html')
    $('header.menu-nav-show ul li a[href$="' + aurl + '"]').parent('li').addClass('current-active');
else
    $('header.menu-nav-show ul li:first-child').addClass('current-active');
//=================== Funtion ================================//
$(document).ready(function(){
    //get-intouch
    if ($('body').hasClass('page-template-get-in-touch')){
        $('header').addClass('change-logo');
        // console.log('dsad');
    }
    else
        $('header').removeClass('change-logo');
    $(window).scroll(function() { 
        let top = $(window).scrollTop();
        if (top > 100) {
            $('.header-desktop').addClass('change-color');
            $('.header-mobile').addClass('change-color');
        }
        else {
            $('.header-desktop').removeClass('change-color');
            $('.header-mobile').removeClass('change-color');
        }
    });
    let top = $(window).scrollTop();
    if (top > 100) {
        $('.header-desktop').addClass('change-color');
        $('.header-mobile').addClass('change-color');
    }
    else {
        $('.header-desktop').removeClass('change-color');
        $('.header-mobile').removeClass('change-color');
    }
});
// chagne logo => change-background scrooll
$(document).ready(function(){
    $(window).scroll(function() { 
        let top = $(window).scrollTop();
        if (top > 100) {
            $('.change-logo').addClass('change-color-wlogo');
            $('.change-logo').removeClass('change-color');
        }
        else 
            $('.change-logo').removeClass('change-color-wlogo');
    });
    let top = $(window).scrollTop();
    if (top > 100) {
        $('.change-logo').addClass('change-color-wlogo');
        $('.change-logo').removeClass('change-color');
    }
    else
        $('.change-logo').removeClass('change-color-wlogo');
    phoneTo();
    mailTo();
    
});
//header-mobile
$('.header-mobile .btn-bar').click(function() {
    $(this).toggleClass('active-menu-show'),$('.header-desktop').toggleClass('menu-nav-show'),
    $('body').toggleClass('no-Scroll'), $('.header-mobile').toggleClass('change-color-click');
});
$('.change-logo .btn-bar').click(function() {
    $('header').toggleClass('change-color-click-wlogo'),
    $('header').removeClass('change-color-click');
});
//call-slick-home-page-banner-top 
$('.slide-text--content-group').slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 1300,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true
});
if ($(window).width() < 768) {
    $('.home-page--our-marquees .home-page--our-marquess--slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 1300,
        infinite: true
    });
}
else 
    $('.home-page--our-marquees .home-page--our-marquess--slick.slick-slider').slick('unslick');
$(window).resize(function() { 
    if ($(window).width() < 768) {
        $('.home-page--our-marquees .home-page--our-marquess--slick').not('.slick-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: true,
            autoplay: true,
            speed: 1300,
            infinite: true
        });
    }
    else 
        $('.home-page--our-marquees .home-page--our-marquess--slick.slick-slider').slick('unslick');
});
$('.instagram #sbi_images').slick({
    dots: true,
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
        breakpoint: 1024,
        settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
        }
    },
    {
        breakpoint: 600,
        settings: {
        slidesToShow: 2,
        slidesToScroll: 2
        }
    },
    ]
});
// gallery
if ($(window).width() < 576) {
    $('.gallery--content-group .row').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        dots: true,
        autoplay: true,
        speed: 1300,
        infinite: true
    });
}
else 
    $('.gallery--content-group .row .slick-slider').slick('unslick');
$(window).resize(function() { 
    if ($(window).width() < 576) {
        $('.gallery--content-group .row').not('.slick-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: true,
            speed: 1300,
            infinite: true
        });
    }
    else 
        $('.gallery--content-group .row .slick-slider').slick('unslick');
});
//about-page--blog--content-post-type
if ($(window).width() < 768) {
    $('.about-page--blog--content-post-type .row').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        dots: true,
        autoplay: false,
        speed: 1300,
        infinite: true
    });
}
else 
    $('.about-page--blog--content-post-type .row .slick-slider').slick('unslick');
$(window).resize(function() { 
    if ($(window).width() < 768) {
        $('.about-page--blog--content-post-type .row').not('.slick-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: true,
            speed: 1300,
            infinite: true
        });
    }
    else 
        $('.about-page--blog--content-post-type .row .slick-slider').slick('unslick');
});
//call slick single our marquees
$('.single--cont-group-slide').slick({
    dots: false,
    arrows: true,
    prevArrow: $('.cont-btn-slick-pr-next .prev'),
    nextArrow: $('.cont-btn-slick-pr-next .next'),
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1200,
    infinite: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                dots: true,
                arrows: false,
            }
        }
    ]
});
//Function Contact
$('.btn-send').click(function(){
    //input
    let $name = $('.name-input').val();
    let $email = $('.email-input').val();
    let $message = $('.message-input').val();
    let $out = $('.effect-after-send');
    if ( $name === '' || $email === '' || $message === ''){
        $out.attr('style','color:red');
        $out.html(" Error: You have not entered all the required values !");
    }
    else {
        $out.attr('style','color:green');
        $out.html("Sent successfully !!!");  
    }
});
///====TAB=GET-IN-TOUCH =====
let posTab = 1;
let lenghtTab =  $('.tab-panes .tab-content').length;
$('.cont-btn-tab .prev').attr('disabled', '');
$('.cont-btn-tab .prev').addClass('opa-0');
$('.cont-btn-tab .get-quote').addClass('d-none');
$('.cont-btn-tab .next').click(function(){
    $('.tab-content:nth-child(' + posTab + ')').removeClass('active');
    posTab ++;
    $('.tab-content:nth-child(' + posTab + ')').addClass('active');
    $('.nav-tabs li:nth-child(' + posTab + ')').addClass('active');
    if (lenghtTab === posTab) {
        $(this).attr('disabled', '');
        $(this).addClass('d-none');
        $('.cont-btn-tab .get-quote').removeClass('d-none');
    }
    if (posTab > 1) {
        $('.cont-btn-tab .prev').removeAttr('disabled', '');
        $('.cont-btn-tab .prev').removeClass('opa-0');
    }
});
//==PREV
$('.cont-btn-tab .prev').click(function(){
    $('.tab-content:nth-child(' + posTab + ')').removeClass('active');
    $('.nav-tabs li:nth-child(' + posTab + ')').removeClass('active');
    $('.cont-btn-tab .get-quote').addClass('d-none');
    posTab --;
    $('.tab-content:nth-child(' + posTab + ')').addClass('active');
    
    if (posTab === 1) {
        $(this).attr('disabled', '');
        $(this).addClass('opa-0');
    }
    if (posTab < lenghtTab) {
        $('.cont-btn-tab .next').removeAttr('disabled', '');
        $('.cont-btn-tab .next').removeClass('opa-0');
    };
});
$('.get-quote').click(function(){
    $(this).parents().find('.nav-tabs').addClass('d-none');
    $(this).parents().find('.tab-panes').addClass('d-none');
    $(this).parents().find('.tab-video').addClass('d-block');
    $(this).parents().find('.cont-btn-tab').addClass('d-none');
    $(this).parents().find('.get-intouch--banner--content-tab').addClass('bg-trans');
});
if ($('.get-intouch--banner--content-tab').height() > 500){
    $(document).ready(function(){
        let heightEle = $('.get-intouch--banner--content-tab').height() - 544;
        $('.get-intouch--banner').css('margin-bottom',150 + heightEle + 'px');
        // $(window).resize(function(){
        //     let heightEle = $('.get-intouch--banner--content-tab').height() - 544;
        //     $('.get-intouch--banner').css('margin-bottom',150 + heightEle + 'px');
        // });
    });
}
if ($('.get-intouch--banner--content-tab').height() < 500) {
    $(document).ready(function(){
        let heightEle = $('.get-intouch--banner--content-tab').height() - 300;
        $('.get-intouch--banner').css('margin-bottom',350 + heightEle + 'px');
        // $(window).resize(function(){
        //     let heightEle = $('.get-intouch--banner--content-tab').height() - 300;
        //     $('.get-intouch--banner').css('margin-bottom',350 + heightEle + 'px');
        // });
    });
}
$('.button-play-video').click(function(){
    $(this).addClass('d-none');
    $(this).removeClass('d-block');
    $(this).parent().find('video')[0].play();
});
$('video').click(function(){
    $(this).parent().find('.button-play-video').addClass('d-block');
    $(this).parent().find('.button-play-video').removeClass('d-none');
    $(this)[0].pause();
});
// Hinden mail and phone
function phoneTo(){
    $('.phone-to').click(function(){
        self = $(this);
        phone = "tel:+" +self.data('phone');
        window.open(phone);
    });
}
function mailTo(){
    $('.mail-to').click(function(){
        self = $(this);
        mail = "mailto:" +self.data('phone');
        window.open(mail);
    });
}
// slick category fill gallery
$('.home-page .gallery--main-nav-menu li').click(function(){
    $(this).parents().find('.active').removeClass('active');
    $(this).addClass('active');
});
