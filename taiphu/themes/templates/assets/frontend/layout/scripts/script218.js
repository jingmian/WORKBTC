jQuery(document).ready(function () {
    $('.backTop').hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.backTop').fadeIn(100);
        } else {
            $('.backTop').fadeOut();
        }
    });
    $('.backTop').live('click', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.scrollbar').perfectScrollbar({
        useBothWheelAxes: true,
        wheelSpeed: 20,
    });
    var ua = navigator.userAgent,
            event = (ua.match(/iPad/i)) ? 'touchstart' : 'click';
    /**/
    $(".zoom").fancybox({
        margin: 0,
        openEffect: "fade",
        closeEffect: "fade",
        prevEffect: "fade",
        nextEffect: "fade",
        autoSize: false,
        helpers: {title: true},
    });
    $('.popup').fancybox();
    if (navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/BlackBerry/) ||
            navigator.userAgent.match(/Windows Phone/i) ||
            navigator.userAgent.match(/ZuneWP7/i)
            ) {
        $('body').addClass("devices");
        $('.menu > li > ul').each(function () {
            var countSub1 = $(this).length;
            if (countSub1 >= 1) {
                var text = $(this).prev('a').text();
                $(this).prev('a').remove();
                $(this).before('<span>' + text + '</span>');
            }
        });
    }
    $('.thumb img').each(function () {
        var src = $(this).attr('src');
        $(this).parent().css({'background-image': 'url(' + src + ')'});
    });
    $('.selectBox ul a i').each(function () {
        $(this).parent('a').remove();
    });
    $('.selectBox > span').live('click', function () {
        $(this).parent().toggleClass('click');
    });
    function twoItem() {
        $('.twoItem').children().each(function (i) {
            if (i % 2 == 0) {
                $div = $('<ul class="col" />');
                $dad = $(this).parent('.twoItem');
                $div.appendTo($dad);
            }
            $(this).appendTo($div);
        });
    }
    twoItem();
    function threeItem() {
        $('.threeItem').children().each(function (i) {
            if (i % 3 == 0) {
                $div = $('<ul class="col" />');
                $dad = $(this).parent('.threeItem');
                $div.appendTo($dad);
            }
            $(this).appendTo($div);
        });
    }
    threeItem();
    function fourItem() {
        $('.fourItem').children().each(function (i) {
            if (i % 4 == 0) {
                $div = $('<ul class="col" />');
                $dad = $(this).parent('.fourItem');
                $div.appendTo($dad);
            }
            $(this).appendTo($div);
        });
    }
    fourItem();
    function fiveItem() {
        $('.fiveItem').children().each(function (i) {
            if (i % 5 == 0) {
                $div = $('<ul class="col" />');
                $dad = $(this).parent('.fiveItem');
                $div.appendTo($dad);
            }
            $(this).appendTo($div);
        });
    }
    fiveItem();
    function sixItem() {
        $('.sixItem').children().each(function (i) {
            if (i % 6 == 0) {
                $div = $('<ul class="col" />');
                $dad = $(this).parent('.sixItem');
                $div.appendTo($dad);
            }
            $(this).appendTo($div);
        });
    }
    sixItem();

    function desc() {
        $('.oneNews p').ellipsis();
    }
    desc();
    /*menu mobile*/
    $("#menuMobile h3").live('click', function () {
        $(this).next("ul").slideToggle(300)
                .siblings("ul:visible").slideUp(300);
        $(this).toggleClass("active");
        $(this).siblings("h3").removeClass("active");
    });
//    $('#myFancyCloudZoom').bind('click', function () {
//        var cloudZoom = $(this).data('CloudZoom');
//        $.fancybox.open(cloudZoom.getGalleryList());
//        return false;
//    });
//    CloudZoom.quickStart();
});


jQuery(document).ready(function (e) {
    e(document).on("click", ".plus, .minus", function () {
        var t = e(this).closest(".quantity").find(".qty"), n = parseFloat(t.val()), r = parseFloat(t.attr("max")), i = parseFloat(t.attr("min")), s = t.attr("step");
        if (!n || n == "" || n == "NaN")
            n = 0;
        if (r == "" || r == "NaN")
            r = "";
        if (i == "" || i == "NaN")
            i = 0;
        if (s == "any" || s == "" || s == undefined || parseFloat(s) == "NaN")
            s = 1;
        e(this).is(".plus") ? r && (r == n || n > r) ? t.val(r) : t.val(n + parseFloat(s)) : i && (i == n || n < i) ? t.val(i) : n > 0 && t.val(n - parseFloat(s));
        t.trigger("change")
    });
});
this.sitemapstyler = function () {
    var sitemap = document.getElementById("sitemap")
    if (sitemap) {

        this.listItem = function (li) {
            if (li.getElementsByTagName("ul").length > 0) {
                var ul = li.getElementsByTagName("ul")[0];
                ul.style.display = "none";
                var span = document.createElement("span");
                span.className = "collapsed";
                span.onclick = function () {
                    ul.style.display = (ul.style.display == "none") ? "block" : "none";
                    this.className = (ul.style.display == "none") ? "collapsed" : "expanded";
                };
                li.appendChild(span);
            }
            ;
        };

        var items = sitemap.getElementsByTagName("li");
        for (var i = 0; i < items.length; i++) {
            listItem(items[i]);
        }
        ;

    }
    ;
};
window.onload = sitemapstyler;