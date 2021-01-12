$(document).ready(function () {

    $('.slick-slider').slick({
        arrows: true,
        nextArrow: $('#slick-next'),
        prevArrow: $('#slick-prev'),
        dots: true,
    });

    $('#cart').click(function () {
        if ($('.modal').hasClass('open')) {
            $('.modal').removeClass('open')
        } else {
            $('.modal').addClass('open')
        }
    })

    $('.nav-slider').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        vertical: true,
        focusOnSelect: true,
        verticalSwiping: true,
        asNavFor: $(this).find('.pr-slider'),
        dots: false,
    })

    $('#nav-next-arrow').click(function (){
        let slider = $('.nav-slider');
        let index = slider[0].slick.slickCurrentSlide();
        slider[0].slick.slickGoTo(index+1);
        console.log('a')
    })

    $('#nav-prev-arrow').click(function (){
        let slider = $('.nav-slider');
        let index = slider[0].slick.slickCurrentSlide();
        slider[0].slick.slickGoTo(index-1);
        console.log('a')
    })

    $('.pr-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: false,
        autoplaySpeed: 3000,
        asNavFor: $(this).find('.nav-slider'),
        dots: false
    })

    $('.mobile-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        arrows: false,
        asNavFor: $(this).find('.pr-mobile'),
    })
    $('#next-arrow-mob').click(function (){
        let slider = $('.mobile-slider');
        let index = slider[0].slick.slickCurrentSlide();
        slider[0].slick.slickGoTo(index+1);
        console.log('a')
    })

    $('#prev-arrow-mob').click(function (){
        let slider = $('.mobile-slider');
        let index = slider[0].slick.slickCurrentSlide();
        slider[0].slick.slickGoTo(index-1);
        console.log('a')
    })

    $('.pr-mobile').slick({
        infinite: true,
        slidesToShow: 1,
        arrows: false,
        dots: false,
        asNavFor: $(this).find('.mobile-slider'),
    })

})
