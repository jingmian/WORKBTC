function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}


/**
 * @function      isIE
 * @description   checks if browser is an IE
 * @returns       {number} IE Version
 */
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}
;


/**
 * @module       Copyright
 * @description  Evaluates the copyright year
 */
;
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);


/**
 * @module       IE Fall&Polyfill
 * @description  Adds some loosing functionality to old IE browsers
 */
;
(function ($) {
    if (isIE() && isIE() < 11) {
        include('js/pointer-events.min.js');
        $('html').addClass('lt-ie11');
        $(document).ready(function () {
            PointerEventsPolyfill.initialize({});
        });
    }

    if (isIE() && isIE() < 10) {
        $('html').addClass('lt-ie10');
    }
})(jQuery);


/**
 * @module       WOW Animation
 * @description  Enables scroll animation on the page
 */
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop') && o.hasClass("wow-animation") && $(".wow").length) {
        include('js/wow.min.js');

        $(document).ready(function () {
            new WOW().init();
        });
    }
})(jQuery);


/**
 * @module       Smoothscroll
 * @description  Enables smooth scrolling on the page
 */
;
(function ($) {
    if ($("html").hasClass("smoothscroll")) {
        include('js/smoothscroll.min.js');
    }
})(jQuery);


/**
 * @module       ToTop
 * @description  Enables ToTop Plugin
 */
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('js/jquery.ui.totop.min.js');

        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart',
                containerClass: 'ui-to-top fa fa-angle-up'
            });
        });
    }
})(jQuery);

/**
 * @module       Swiper Slider
 * @description  Enables Swiper Plugin
 */
;
(function ($, undefined) {
    var o = $(".swiper-slider");
    if (o.length) {
        include('js/jquery.swiper.min.js');

        function getSwiperHeight(object, attr) {
            var val = object.attr("data-" + attr),
                    dim;

            if (!val) {
                return undefined;
            }

            dim = val.match(/(px)|(%)|(vh)$/i);

            if (dim.length) {
                switch (dim[0]) {
                    case "px":
                        return parseFloat(val);
                    case "vh":
                        return $(window).height() * (parseFloat(val) / 100);
                    case "%":
                        return object.width() * (parseFloat(val) / 100);
                }
            } else {
                return undefined;
            }
        }

        function toggleSwiperInnerVideos(swiper) {
            var prevSlide = $(swiper.slides[swiper.previousIndex]),
                    nextSlide = $(swiper.slides[swiper.activeIndex]),
                    videos;

            prevSlide.find("video").each(function () {
                this.pause();
            });

            videos = nextSlide.find("video");
            if (videos.length) {
                videos.get(0).play();
            }
        }

        function toggleSwiperCaptionAnimation(swiper) {
            var prevSlide = $(swiper.container),
                    nextSlide = $(swiper.slides[swiper.activeIndex]);

            prevSlide
                    .find("[data-caption-animate]")
                    .each(function () {
                        var $this = $(this);
                        $this
                                .removeClass("animated")
                                .removeClass($this.attr("data-caption-animate"))
                                .addClass("not-animated");
                    });

            nextSlide
                    .find("[data-caption-animate]")
                    .each(function () {
                        var $this = $(this),
                                delay = $this.attr("data-caption-delay");

                        setTimeout(function () {
                            $this
                                    .removeClass("not-animated")
                                    .addClass($this.attr("data-caption-animate"))
                                    .addClass("animated");
                        }, delay ? parseInt(delay) : 0);
                    });
        }

        $(document).ready(function () {
            o.each(function () {
                var s = $(this);

                var pag = s.find(".swiper-pagination"),
                        next = s.find(".swiper-button-next"),
                        prev = s.find(".swiper-button-prev"),
                        bar = s.find(".swiper-scrollbar"),
                        h = getSwiperHeight(o, "height"), mh = getSwiperHeight(o, "min-height");
                s.find(".swiper-slide")
                        .each(function () {
                            var $this = $(this),
                                    url;
                            if (url = $this.attr("data-slide-bg")) {
                                $this.css({
                                    "background-image": "url(" + url + ")",
                                    "background-size": "cover"
                                })
                            }
                        })
                        .end()
                        .find("[data-caption-animate]")
                        .addClass("not-animated")
                        .end()
                        .swiper({
                            autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
                            direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
                            effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
                            speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
                            keyboardControl: s.attr('data-keyboard') === "true",
                            mousewheelControl: s.attr('data-mousewheel') === "true",
                            mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
                            nextButton: next.length ? next.get(0) : null,
                            prevButton: prev.length ? prev.get(0) : null,
                            pagination: pag.length ? pag.get(0) : null,
                            paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
                            paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function (index, className) {
                                return '<span class="' + className + '">' + (index + 1) + '</span>';
                            } : null : null,
                            scrollbar: bar.length ? bar.get(0) : null,
                            scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
                            scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
                            loop: s.attr('data-loop') !== "false",
                            onTransitionStart: function (swiper) {
                                toggleSwiperInnerVideos(swiper);
                            },
                            onTransitionEnd: function (swiper) {
                                toggleSwiperCaptionAnimation(swiper);
                            },
                            onInit: function (swiper) {
                                toggleSwiperInnerVideos(swiper);
                                toggleSwiperCaptionAnimation(swiper);
                            }
                        });

                $(window)
                        .on("resize", function () {
                            var mh = getSwiperHeight(s, "min-height"),
                                    h = getSwiperHeight(s, "height");
                            if (h) {
                                s.css("height", mh ? mh > h ? mh : h : h);
                            }
                        })
                        .trigger("resize");
            });
        });
    }
})(jQuery);

/**
 * @module       Vide
 * @description  Enables Vide.js Plugin
 */
;
(function ($) {
    var o = $(".vide");
    if (o.length) {
        include('js/jquery.vide.min.js');

        $(document).ready(function () {
            o.wrapInner('<div class="vide__body"></div>');
        });
    }
})(jQuery);

/**
 * @module       RD Parallax 3
 * @description  Enables RD Parallax 3 Plugin
 */
;
(function ($) {
    var o = $('.rd-parallax');
    if (o.length) {
        include('js/jquery.rd-parallax.min.js');

        $(document).ready(function () {
            o.RDParallax({
                layerDirection: ($('html').hasClass("smoothscroll") || $('html').hasClass("smoothscroll-all")) && !isIE() ? "normal" : "inverse"
            });
        });
    }
})(jQuery);

/**
 * @module       RD Navbar
 * @description  Enables RD Navbar Plugin
 */
;
(function ($) {
    var o = $('.rd-navbar');
    if (o.length > 0) {
        include('/themes/templates/assets/frontend/layout/scripts/jquery.rd-navbar.min.js');

        $(document).ready(function () {
            o.RDNavbar({
                stickUpClone: false,
                stickUpOffset: 170
            });
        });
    }
})(jQuery);

/* Navbar
 ========================================================*/

(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/wow.js');
})(jQuery);

(function ($) {
    include('/themes/templates/assets/global/plugins/jquery-migrate.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/bootstrap/js/bootstrap.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/fancybox/source/jquery.fancybox.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/fancybox/source/helpers/jquery.fancybox-thumbs.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/zoom/jquery.zoom.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/slider-layer-slider/js/greensock.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/pages/scripts/layerslider-init.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/global/scripts/metronic.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/layout.js');
})(jQuery);
//(function ($) {
//    include('/themes/templates/assets/frontend/layout/scripts/back-to-top.js');
//})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/common.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/google_map_api.js');
})(jQuery);

(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.iosslider.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.masonry.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.infinitescroll.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.autoellipsis-1.0.10.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/perfect-scrollbar.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.mousewheel.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.idTabs.min.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/script218.js');
})(jQuery);

(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/classie.js');
})(jQuery);
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/modalEffects.js');
})(jQuery);

/*start zoom images*/
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.etalage.min.js');
})(jQuery);

/*jquery match height*/
(function ($) {
    include('/themes/templates/assets/frontend/layout/scripts/jquery.matchHeight-min.js');
})(jQuery);

jQuery(function ($) {
    $('.matchheight').matchHeight();
});

/* end jquery match height*/


jQuery(document).ready(function () {
    Metronic.init();
    Layout.init();
    Layout.initOWL();
    LayersliderInit.initLayerSlider();
    Layout.initNavScrolling();
    wow = new WOW(
            {
                boxClass: 'wow', // default
                animateClass: 'animated', // default
                offset: 100, // default
                mobile: true, // default
                live: true        // default
            }
    )
    wow.init();
});

jQuery(document).ready(function () {
    jQuery('#load-videos').on('change', function () {
        if (jQuery('select option:selected')) {
            var videoID = $(this).val();
            $("#append-html iframe").remove();
            $('<iframe width="100%" height="220" frameborder="0" allowfullscreen></iframe>')
                    .attr("src", "http://www.youtube.com/embed/" + videoID)
                    .appendTo("#append-html");
        }
    });
});

function AddToCart(id) {
    $.ajax({
        type: 'POST',
        url: '/cart/order/',
        data: {
            id: id
        },
        beforeSend: function () {
            $(".modal").show();
        },
        success: function (result) {
            if (result == 0) {
                $(".modal").hide();
                $("html, body").animate({scrollTop: '400px'}, 1000);
                $('.alert-success').show();
                $('.show-notify').text("Sản Phẩm đã được thêm thành công vào giỏ hàng");
                location.href = "/gio-hang/";
            }
        }
    });
}


/*zoom initializer*/
jQuery(document).ready(function ($) {
    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 300,
        source_image_width: 900,
        source_image_height: 1200,
        show_hint: true,
        click_callback: function (image_anchor, instance_id) {
            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
        }
    });
});