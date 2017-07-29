curr = 100;
breakpoint = '';
function readyCarousel() {
}
function colCount() {
    if (breakpoint == 'xs') {
        return 1;
    }
    else if (breakpoint == 'sm') {
        return 2;
    }
    else if (breakpoint == 'md') {
        return 3;
    }
    else  {
        return 4;
    }
}
function removeBox() {
    old = $('.boxAbout');
    old.css('margin-bottom',0)
    old.animate({height: 0}, 500, 'swing', function() {
        old.remove();
    });
}
var waitForFinalEvent = function(){var b={};return function(c,d,a){a||(a="I'm a banana!");b[a]&&clearTimeout(b[a]);b[a]=setTimeout(c,d)}}();
function isBreakpoint( alias ) {
    return $('.device-' + alias).is(':visible');
}
function getBreakPoint() {
    if(isBreakpoint('lg')) {
        return 'lg';
    } else if (isBreakpoint('md')){
        return 'md';
    } else if (isBreakpoint('sm')){
        return 'sm';
    } else{
        return 'xs';
    }
}
function setBreakpoint() {
    newbreakpoint = getBreakPoint();
    if(breakpoint != newbreakpoint) {
        $(window).trigger('breakpointChanged', [breakpoint, newbreakpoint]);
    }
    breakpoint = newbreakpoint;
}
function initShop(self,shop) {
    removeBox();
    elem = $(`<div class="col-xs-12 boxAbout" style="height: 0px">
    <div class="box">
                <div class="boxTitle">
                            <div class="boxTitleTitle">` + shop['name'] +`</div>
                                <div class="boxTitleArrow">
                                    <i class="fa fa-arrow-left"></i>
                                </div>
                        </div>
                        <div class="boxAboutRow row">
                        <div class="col-xs-6 boxAboutImgHolder">
                            <img class="boxAboutIcon img-responsive" src="http://via.placeholder.com/200x200">
                        </div>
                        <div class="col-xs-6 boxAboutDataHolder">
                            <div class="">
                            <h3 style="margin-bottom: 30px;">` + shop['name'] +`</h3>
                            <a href="http://` + shop['adress'] +`"><h4><i class="fa fa-wifi icon"></i>` + shop['adress'] +`</h4></a>
                            <h4><i class="fa fa-phone icon"></i>` + shop['phone'] +`</h4>
                            </div>
                            </div>
                        <button class="boxAboutButton btn">Több info</button>
                        </div>
                        <div class="boxAboutRow row">
                            <div class="col-xs-12 slider-container">
                                <div class="slider">
                                    
                                </div>
                            </div>
                        </div>
                        </div>
          </div>`);
          elem.data('id',self.data('id'));
        cc = colCount();
        parent = self.closest('.boxHolder')
        ind = $('.boxHolder').index(parent) + 1;
        pos = (ind) % cc;
        if(pos == 0) { pos = cc; }
        if($('.slider').length > 0) {
            $('.slider').slick('unslick');
        }
        elem.insertBefore($('.boxHolder').eq(ind-pos));
        elem.animate({height: 550}, 500, 'swing' );
        tt = elem.offset().top
        if(curr > ind-pos) {
            $("html, body").animate({ scrollTop: tt}, 500, 'swing', function() {
                curr = ind-pos;
            });
        } else {
            $("html, body").animate({ scrollTop: tt-550}, 500, 'swing', function() {
                curr = ind-pos;
            });
        }
        for(i=0; i < 8; i++) {
            asd = $('<div class="slide"><div class="slide-inner"><div class="product"><div class="price"><h2>1230Ft<h2></div></div></div></div>');
            $('.slider').append(asd);
            asd = '';
        }
        $('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                breakpoint: 1170,
                settings: {
                    slidesToShow: 4
                }
                },
                {
                breakpoint: 970,
                settings: {
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 750,
                settings: {
                    slidesToShow: 2
                }
                },
                {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1
                }
                }
            ]
            });
}
$(function() {
    setBreakpoint();
    $(window).resize(function() {
        waitForFinalEvent(function() {
            setBreakpoint();
        });
    });
    $(window).on('breakpointChanged', function(event, oldb, newb) {
        if($('.boxAbout').length > 0) {
            $("html, body").scrollTop($('.boxAbout').offset().top);
        }
    })
    readyCarousel();
    $('.boxRow').on('click', function() {
     self = $(this)
         $.ajax({
            type        : 'POST',
            url         : '../../ShopAPI/getShop',
            data        : {
                id: self.data('id')
            },
            encode          : true,
            success: function(result){
                res = JSON.parse(result)
                shop = res[0];
                initShop(self,shop)
                
            },
            error: function(xhr, status, error){
            }
        })
    });
    $('.container').on('click','.boxAbout .boxTitle', function() {
        removeBox();
        curr = 100;
    })
    $('.container').on('click','.boxAboutButton', function() {
        id = $(this).closest('.boxAbout').data('id');
        f = $('<form action="Bolt" name="vote" method="get" style="display:none;"><input type="text" name="id" value="' + id + '" /></form>').appendTo('body');
        f.submit();
    })
})