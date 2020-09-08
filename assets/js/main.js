(function($) {
    // Scrollify
    $.scrollify({
        section : '.section',
        // interstitialSection: '.mainFooter',
        easing: 'swing',
        scrollSpeed: 700,
        // offset: 0,
        scrollbars: true,
        standardScrollElements: 'textarea, .overlayScrollbars',
        setHeights: true,
        overflowScroll: true,
        updateHash: false,
        touchScroll: false,
        before: function() {
            playVideo();
        },
        after: function() {
            changeColor();
        },
        afterRender: function() {
            playVideo();
            changeColor();
        }
    });

    function playVideo() {
        var $videos = $('.bgVideo');
            $videos.each(function() {
                $(this).get(0).pause();
            });

        var currVideo = $.scrollify.current().find('.bgVideo');
        if (currVideo.length > 0 && !currVideo.hasClass('noAutoPlay')) {
            currVideo.get(0).play();
        }
    }

    function changeColor() {
        if (!$.scrollify.current().hasClass('noChangeColor')) {
            if ($.scrollify.current().hasClass('bgDark')) {
                $('.mainHeader').addClass('bgDarkTrue');
            } else {
                $('.mainHeader').removeClass('bgDarkTrue');
            }
        }
    }

    $('.scroll-next').on('click ontouchstart', function(e) {
        e.preventDefault();
        $.scrollify.next();
    });
    $('.scroll-prev').on('click ontouchstart', function(e) {
        e.preventDefault();
        $.scrollify.previous();
    });

    if ($(window).width() < 1200) {
        $.scrollify.disable();
    }
    // END Scrollify

    // Trigger menu
    $('.triggerMenu').on('click ontouchstart', function() {
        $('body').toggleClass('overflowHidden');
        $(this).toggleClass('isOpen');
        $('.mainMenu').toggleClass('isOpen');

        if (!$.scrollify.current().hasClass('bgDark')) {
            $('.mainHeader').toggleClass('bgDarkTrue');
        }

        if ($('body').hasClass('overflowHidden')) {
            $.scrollify.disable();
        } else {
            if ($(window).width() >= 1200) {
                $.scrollify.enable();
            }
        }
    });
    // END Trigger menu

    // Toggle item menu
    if ($(window).width() < 576) {
        $('.dropDown .toggleMenu').hide();
        $('.dropDown .toggle').on('click ontouchstart', function() {
            var $toggleMenu = $(this).parent().find('.toggleMenu');

            if ($toggleMenu.is(':visible')) {
                $toggleMenu.slideUp();
                $(this).removeClass('isOpen');
            } else {
                $('.toggleMenu:visible').slideUp();
                $toggleMenu.slideDown();
                $('.dropDown .toggle').removeClass('isOpen');
                $(this).addClass('isOpen');
            }
        });
    }
    // END Toggle item menu

    // Transfer block .messengers & .socials
    var $html = $('html');

    if ($(window).width() < 1200 || ($html.hasClass('ios') && $html.hasClass('ipad') && $html.hasClass('tablet') && $html.hasClass('landscape'))) {
        $('.socials').prependTo('.mainMenu .insertSocial');
        $('.messengers').prependTo('.mainMenu .insertSocial');
        // $('.socials').prependTo('.mainMenu .insertSocial').insertAfter('.calculateBtn');
        // $('.messengers').prependTo('.mainMenu .insertSocial').insertAfter('.calculateBtn');
    }
    // END Transfer block .messengers & .socials

    // About section video play
    $('.playBtn.videoPlay').on('click touchstart', function() {
        var $parentBlock = $(this).parent().parent().parent().parent().parent();

        if ($parentBlock.children('video').get(0).paused) {
            $parentBlock.find('.innerBlock').fadeOut();
            $parentBlock.children('video').get(0).play();
            $parentBlock.children('video').prop({controls: true, volume: 0.5});
        } else {
            $parentBlock.children('video').prop('controls', false);
            $parentBlock.children('video').get(0).pause();
            // $parentBlock.find('.innerBlock').fadeIn();
        }
        return false;
    });
    // END About section video play

    // Portfolio section video play on hover
    if ($(window).width() > 1150) {
        $('.portfolioItem .media').hover(function() {
            if ($(this).children('video').length > 0 && $(this).children('video').children('source').attr('src') !== '') {
                $(this).children('video')[0].play();
            } else {
            	return false;
            }
        }, function() {
            if ($(this).children('video').length > 0) {
                var el = $(this).children('video')[0];
                    el.pause();
                    el.currentTime = 0;
                    el.load();
            }
        });
    }
    // END Portfolio section video play on hover

    // Change block company section
    $('.company .playBtn').on('click ontouchstart', function() {
        $('.company').toggleClass('backSide bgDark');
        $('.company .mainTitle').toggleClass('lightTitle');

        $('.company .presentationLink .mainBtn').toggleClass('darkBtn');

        if ($(window).width() >= 1200) {
            changeColor();
        }
    });
    // END Change block company section

    // Change block aboutCompany section
    $('.aboutCompany .playBtn').on('click ontouchstart', function() {
        $('.aboutCompany').toggleClass('backSide bgDark');
        $('.aboutCompany .mainTitle').toggleClass('lightTitle');

        $('.company .presentationLink .mainBtn').toggleClass('darkBtn');

        if ($(window).width() >= 1200) {
            changeColor();
        }
    });
    // END Change block aboutCompany section

    // Reviews slider
    $('.reviewsSlider').on('init', function(event, slick) {
        $.scrollify.update();
    });

    $('.reviewsSlider').slick({
        swipe: false,
        dots: false,
        arrows: true,
        fade: true,
        prevArrow: '<svg class="svgIcon slickArrowLeft"><use xlink:href="#slickArrowLeft"></use></svg>',
        nextArrow: '<svg class="svgIcon slickArrowRight"><use xlink:href="#slickArrowRight"></use></svg>',
        responsive: [{
			breakpoint: 1200,
			settings: {
				adaptiveHeight: true,
			}
		}]
    });

    if ($(window).width() < 1200) {
    	$('.reviewsSlider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			$.scrollify.update();
		});
    }

    // Init dot radius on map
    initDotRadius();
    changeDotRadius();

    $('#mapInteractive [data-dot]').on('click ontouchstart', function(e) {
        e.preventDefault();
        $('#mapInteractive [data-dot]').removeClass('activeDot');
        $(this).addClass('activeDot');

        var $currDot = $(this).data('dot');
        $('.reviewsSlider').slick('slickGoTo', $currDot);
    });

    $('.reviewsSlider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $('#mapInteractive [data-dot]').removeClass('activeDot');

        var $currIndexDot = $('#mapInteractive').find('[data-dot="'+nextSlide+'"]');
            $currIndexDot.addClass('activeDot');

        changeDotRadius();
    });
    // END Reviews slider

    // Blog video slider
    $('.videoSlider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<span class="slick-prev slick-arrow">Prev</span>',
        nextArrow: '<span class="slick-next slick-arrow">Next</span>',
        // useTransform: false,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    // END Blog video slider

    // Not empty input
    $('.controlWrapper .controlForm').blur(function() {
        if ($(this).val() === '' || $(this).val() === undefined) {
            $(this).removeClass('notEmpty');
        } else {
            $(this).addClass('notEmpty');
        }
    });
    // END Not empty input

    // Overlay scrollbars
    $('.overlayScrollbars').overlayScrollbars({
        className: 'os-theme-light',
    });
    // END Overlay scrollbars

    // Masonry
    var $masonry = $('.masonry').masonry({
        initLayout: false,
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-sizer',
        percentPosition: true,
        horizontalOrder: true
    });
    $masonry.masonry('on', 'layoutComplete', function() {
        $.scrollify.update();
    });
    $masonry.masonry();
    // END Masonry

    // Popup post
    $('[data-fancybox]').fancybox({
        selector : '.popupTrigger',
        infobar: false,
        hideScrollbar: true,
        touch: false,
        smallBtn: true,
        btnTpl: {
            smallBtn:
                '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                '<svg class="svgIcon iconClose closePopup"><use xlink:href="#iconClose"></use></svg>' +
                '</button>',
            arrowLeft:
                '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">' +
                '<div><svg class="svgIcon postArrowLeft"><use xlink:href="#postArrowLeft"></use></svg></div>' +
                '</button>',
            arrowRight:
                '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">' +
                '<div><svg class="svgIcon postArrowRight"><use xlink:href="#postArrowRight"></use></svg></div>' +
                '</button>'
        },
        video: {
            autoStart: false
        },
        mobile: {
            arrows: false,
            touch: true,
        }
    });
    // END Popup post

    // Popup CV
    $('.careerPopup').on('click ontouchstart', function(e) {
        e.preventDefault();
        $.scrollify.disable();

        $('#popupCV').addClass('isOpen');
        $('body').addClass('overflowHidden');
    });
    $('#popupCV .closePopup').on('click ontouchstart', function() {
        if ($(window).width() >= 1200) {
            $.scrollify.enable();
        }

        $('#popupCV').removeClass('isOpen');
        $('body').removeClass('overflowHidden');
    });
    // END Popup CV

    // File input change label
    if ($('#cvFile').length) {

        var labelText = $('#cvFile').siblings('label');
        var initialLabelText = labelText.text();

        $(document).on('change', '#cvFile', function() {
            var el = $(this);
            if (el.val()) {
                var path = el.val();
                var fileName = path.split('\\').pop().split('/').pop();

                labelText.html(fileName+'<span class="decorUnderline"></span>');
            } else {
                labelText.html(initialLabelText+'<span class="decorUnderline"></span>');
            }
        });
    }
    // File input change label

    // Hide with scroll CV button
    if ($(window).width() > 991) {
        var hBlock = $('.vacancyHome').outerHeight();
        var hScroll = 0;

        $(window).scroll(function() {
            hScroll = $(window).scrollTop();

            if ((hScroll * 2) >= hBlock) {
                $('.cvLinkFixed').fadeOut();
            } else {
                $('.cvLinkFixed').fadeIn();
            }
        });
    }
    // END Hide with scroll CV button

    // Entering numbers only
    $('input[type="number"], input[type="tel"]').on('keydown', function(e) {
        if (e.key.length == 1 && e.key.match(/[^0-9]/)) {
            return false;
        }
    });
    // END Entering numbers only

    // Plus/Minus calculator
    $('.calculatorBlock .minus').on('click ontouchstart', function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();

        if ($input.val() > 0) {
            $(this).parent().addClass('isActive');
        } else {
            $(this).parent().removeClass('isActive');
        }

        return false;
    });
    $('.calculatorBlock .plus').on('click ontouchstart', function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();

        if ($input.val() > 0) {
            $(this).parent().addClass('isActive');
        } else {
            $(this).parent().removeClass('isActive');
        }

        return false;
    });
    // END Plus/Minus calculator

    // Reset calculator
    $('.formResetBtn button').on('click ontouchstart', function() {
        var $counter = $(this).parent().parent().find('.counter');
        $counter.removeClass('isActive').find('input').val('0');
    });
    // END Reset calculator

    // Time line calculator
    var $textDiscount = $('.projectTimeLine .grid .dot.active').data('discount');
    var $textTime = $('.projectTimeLine .grid .dot.active').data('time');

    var $inputDiscount = $('.hiddenInputDiscount');
    $inputDiscount.val($textDiscount);
    var $inputTime = $('.hiddenInputTime');
    $inputTime.val($textTime);
    
    var $tooltipDiscount = $('.tooltip .discount');
    $tooltipDiscount.text($textDiscount);
    var $tooltipTime = $('.tooltip .time');
    $tooltipTime.text($textTime);

    var $countDot = $('.projectTimeLine .grid .dot');
    $countDot.on('click ontouchstart', function() {
        var $dot = $(this).parent().find('.dot');
        $dot.removeClass('active').removeClass('marked');

        $(this).addClass('active');
        $inputDiscount.val($(this).data('discount'));
        $inputTime.val($(this).data('time'));
        $tooltipDiscount.text($(this).data('discount'));
        $tooltipTime.text($(this).data('time'));

        var $indexDot = $countDot.index(this);
        var $positionLeft = $(this).position().left;

        if ($indexDot > 0) {
            $positionLeft -= $('.projectTimeLine .rocketSlider').width() + ($(this).width() / 2);
            $('.projectTimeLine .iconRocket').css({
                'width': $positionLeft + 'px',
                'left': $positionLeft + 'px',
            });
            $('.projectTimeLine .tooltip').css({
                'left': $positionLeft + 'px'
            });
        } else {
            if ($(window).width > 575) {
                $('.projectTimeLine .iconRocket').css({
                    'width': 35 + 'px',
                    'left': 35 + 'px',
                });
                $('.projectTimeLine .tooltip').css({
                    'left': 35 + 'px'
                });
            } else {
                $('.projectTimeLine .iconRocket').css({
                    'width': 0,
                    'left': 0,
                });
                $('.projectTimeLine .tooltip').css({
                    'left': 0
                });
            }
        }

        $dot.each(function(i) {
            if (i < $indexDot) {
                $(this).addClass('marked');
            }
        });
    });
    // END Time line calculator

    // Popup calculator
    $('.calculatorPopup').on('click ontouchstart', function(e) {
        e.preventDefault();
        $.scrollify.disable();

        $('#popupCalculator').addClass('isOpen');
        $('body').addClass('overflowHidden');
    });
    $('#popupCalculator .closePopup').on('click ontouchstart', function() {
        if ($(window).width() >= 1200) {
            $.scrollify.enable();
        }

        $('#popupCalculator').removeClass('isOpen');
        $('body').removeClass('overflowHidden');
    });
    // END Popup calculator

    // Popup rules
    $('.rulesPopup').on('click ontouchstart', function(e) {
        e.preventDefault();
        $.scrollify.disable();

        $('#popupRules').addClass('isOpen');
        $('body').addClass('overflowHidden');
    });
    $('#popupRules .closePopup').on('click ontouchstart', function() {
        if ($(window).width() >= 1200) {
            $.scrollify.enable();
        }

        $('#popupRules').removeClass('isOpen');
        $('body').removeClass('overflowHidden');
    });
    // END Popup rules

    // Popup messengers
    $('.messengersPopup .messengersBtn').on('click ontouchstart', function(){
		$('.messengersPopup .messengersWrap').stop().fadeToggle();
	});

	$(document).on('mouseup touchstart', function (e) {
        var el = $('.messengersPopup');

        if (!el.is(e.target) && el.has(e.target).length === 0) {
            $('.messengersPopup .messengersWrap').fadeOut();
        }
    });
    // END Popup messengers

    /* Fix instagram buttons */
    $('#sb_instagram #sbi_load').find('.sbi_load_btn, .sbi_follow_btn a').addClass('mainBtn').append('<span class="decorUnderline"></span>');
    /* END Fix instagram buttons */
})(jQuery);

$(window).on('load', function() {
    // Preloader
    // $('#preloader').delay(500).fadeOut('slow');
    // END Preloader
});

// Filter portfolio
var portfolioEl = document.querySelector('.targetFilterPortfolio');
var portfolioMixer;

if (portfolioEl) {
    portfolioMixer = mixitup(portfolioEl, {
        selectors: {
            control: '.portfolioFilter .itemFilter',
            target: '.mixIt',
        },
        animation: {
            easing: 'ease-in-out',
        },
        callbacks: {
            onMixEnd: function(state) {
                $.scrollify.update();
            }
        }
    });
}
// END Filter portfolio

// Filter blog
var blogEl = document.querySelector('.targetFilterBlog');
var blogMixer;

if (blogEl) {
    blogMixer = mixitup(blogEl, {
        selectors: {
            control: '.blogFilter .itemFilter',
            target: '.mixIt',
        },
        animation: {
            easing: 'ease-in-out',
        },
        callbacks: {
            onMixEnd: function(state) {
                $.scrollify.update();
            }
        }
    });
}
// END Filter blog

// Animate On Scroll
AOS.init({
    // disable: window.innerWidth < 1200,
});
// END Animate On Scroll

// Change dot radius on map
function initDotRadius() {
    $('#mapInteractive .dot .changeRadius').each(function() {
        var r = $(this).attr('r');
        $(this).attr('data-r', r);
    });
}

function changeDotRadius() {
    $('#mapInteractive .dot').each(function() {
        if ($(this).hasClass('activeDot')) {
            $(this).find('.changeRadius').each(function() {
                $(this).attr('r', parseFloat($(this).data('r'))*3);
            });
        } else {
            $(this).find('.changeRadius').each(function() {
                $(this).attr('r', parseFloat($(this).data('r')));
            });
        }
    });
}
// END Change dot radius on map

// Scrollify update
$.scrollify.update();
// END Scrollify update