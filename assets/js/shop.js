$(function() {
    for(i=0; i < 8; i++) {
            asd = $('<div class="slide"><div class="slide-inner"><div class="product"><div class="price"><h2>1230Ft<h2></div></div></div></div>');
            $('.slider').append(asd);
            asd = '';
        }
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                breakpoint: 990,
                settings: {
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2
                }
                },
                {
                breakpoint: 530,
                settings: {
                    slidesToShow: 1
                }
                }
            ]
        });
})