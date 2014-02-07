$(function() {
    $('a[rel=tooltip]').tooltip();

    /* Media query for image so it load smaller size image if available */
    if ($(window).width () > "767") {
        $("img").each(function( index ) {
            if ($(this).attr ("data-src") != undefined || $(this).attr ("data-src") != "") {
                $(this).attr ("src", $(this).attr ("data-src"));
            }
        });

        $(".tooltips-info").delay (3000).fadeOut ();

        $(".background").css("background-image", "url(" + $(".background").attr ("data-large-src") + ")");
    } else {
        $(".background").css("background-image", "url(" + $(".background").attr ("data-small-src") + ")");
    }

    // setTimeout(function() {
    //     $('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('style','width: 40px; height: 15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; margin-left: 15px');
    //     $('div[title="Zoom out"]').attr('style','position: absolute; left: 37px; top: 2px; width: 22px; height: 17px; cursor: pointer;');
    //     $('div[title="Zoom in"]').attr('style','position: absolute; left: 10px; top: 2px; width: 22px; height: 17px; cursor: pointer;');
    //     $('img[src="http://maps.gstatic.com/mapfiles/szc4.png"]').attr('src',imgPlus);
    // }, 1000);

    $("section.main-nav .show-menu").click ( function () {
        $("section.main-nav nav ul.flat").slideToggle (500);
    })

    $("header nav li .button").click ( function () {
        $("header .flaoting-search").fadeToggle (100);
    });

    $("#map-inset-left .collapse").click ( function () {
        if ($("#map-inset-left .padder").hasClass ("collapsed")) {
            $("#map-inset-left .padder").animate ({
                left: '+=' + ($("#map-inset-left .padder").width () - 20)
            }, 500, function () {
                $(this).removeClass ("collapsed");
            });
        } else {
            $("#map-inset-left .padder").animate ({
                left: '-=' + ($("#map-inset-left .padder").width () - 20)
            }, 500, function () {
                $(this).addClass ("collapsed");
            });
        }
    });

    $("section.slide-right .collapse-right").click ( function () {

        if ($(".slide-right").hasClass ("collapsed")) {

            $(".slide-right").animate ({
                right: '+=' + ($("section.slide-right").width () - 60)
            }, 500, function () {
                $(this).removeClass ("collapsed");
            });

        } else {

            $(".slide-right").animate ({
                right: '-=' + ($(".slide-right").width () - 60)
            }, 500, function () {
                $(this).addClass ("collapsed");
            });
        }
    });
    
    // $(".sidebar-detail #scroll").css ("height", $(".slideshow .carousel-inner .sliders").height() - 54);

    $(window).resize(function() {
        if ($(window).width() > "550") {
            $(".sidebar-detail #scroll").css ("width", 100 + '%' );
            $(".sidebar-detail #scroll").css ("height", "auto" );
            $(".sidebar-detail #scroll .detail-wrap").css ("width", 100 + "%" );
            $(".sidebar-detail #scroll .detail-wrap").css ("height", "auto" );
            $(".sidebar-detail #scroll .antiscroll-inner.detail-cul").css ("width", 98+"%" );
            $(".sidebar-detail #scroll .antiscroll-inner.detail-cul").css ("height", "auto" );
            $(".sidebar-detail #scroll .antiscroll-inner.detail-cul .thumbnail-culture").css ("width", 98+"%" );
            $(".sidebar-detail #scroll .antiscroll-inner.detail-cul .thumbnail-culture").css ("height", "auto" );
        }

        if ($(window).width() >= "1024") {

            $(".sidebar #scroll.antiscroll-wrap").css ("width", $(".sidebar").width () - 5 + "px");
            $(".sidebar #scroll .antiscroll-inner").css ("width", $(".sidebar").width () + 20 + "px");
            $(".sidebar #scroll.antiscroll-wrap").css ("height", $(".sidebar").height () - 35 + "px");
            $(".sidebar #scroll .antiscroll-inner").css ("height", $(".sidebar").height () - 20 + "px");
            $(".sidebar #scroll .inner-wrap").css ("overflow-x", "hidden" );

            scrollheight = $(".sidebar-detail").height();
            scrollwidth = $(".sidebar-detail").width ();
            // alert(scrollheight);
            // scrollheight = $(".sidebar-detail").height ();

            $(".sidebar-detail #scroll").css ("width", scrollwidth - 10);
            $(".sidebar-detail #scroll").css ("height", $(".detail-slideshow").height () - 97 + "px");

            $(".sidebar-detail #scroll .detail-wrap").css ("width", scrollwidth );
            $(".sidebar-detail #scroll .detail-wrap").css ("height", $(".detail-slideshow").height () - 135 + "px" );
            $(".sidebar-detail #scroll .antiscroll-inner").css ("width", scrollwidth );
            $(".sidebar-detail #scroll .antiscroll-inner").css ("height", $(".detail-slideshow").height () - 135 + "px");

            $(".sidebar-detail #scroll .antiscroll-inner > *").css ("width", scrollwidth - 50);
            // $(".sidebar-detail #scroll .antiscroll-wrap").css ("height", $(".sidebar-detail").height () - 240 + "px");
        }

    });

    $(window).resize();

    $(window).load(function(){
        if ($(window).width() >= "1024") {
            scrollheight = $(".sidebar-detail").height();
            scrollwidth = $(".sidebar-detail").width ();
            $(".sidebar-detail #scroll").css ("width", scrollwidth - 10);
            $(".sidebar-detail #scroll").css ("height", $(".detail-slideshow").height () - 97 + "px");

            $(".sidebar-detail #scroll .detail-wrap").css ("width", scrollwidth );
            $(".sidebar-detail #scroll .detail-wrap").css ("height", $(".detail-slideshow").height () - 135 + "px" );
            $(".sidebar-detail #scroll .antiscroll-inner").css ("width", scrollwidth );
            $(".sidebar-detail #scroll .antiscroll-inner").css ("height", $(".detail-slideshow").height () - 135 + "px");

            $(".sidebar-detail #scroll .antiscroll-inner > *").css ("width", scrollwidth - 50);
        }
        if ($(window).width() < "800") {
            $(".sidebar #scroll.antiscroll-wrap").css ("width", $(".sidebar").width () - 5 + "px");
            $(".sidebar #scroll .antiscroll-inner").css ("width", $(".sidebar").width () + 20 + "px");
            $(".sidebar #scroll.antiscroll-wrap").css ("height", $(".sidebar").height () - 35 + "px");
            $(".sidebar #scroll .antiscroll-inner").css ("height", $(".sidebar").height () - 20 + "px");
            $(".sidebar #scroll .inner-wrap").css ("overflow-x", "hidden" );
        }
    });


    $('.antiscroll-wrap').antiscroll();

    // Stylize everything
    xn.helper.stylize('body');

    $("body").css ("visibility", "visible");
});

if (typeof(console) == 'undefined') {
    window.console = console = {
        'log': function() {},
        'info': function() {},
        'warn': function() {},
        'error': function() {}
    };
}

var xn = {};

xn.helper = {
    stylize: function(selector) {
        if (typeof(selector) == 'undefined') {
            selector = 'body';
        }

        /* Add common odd, even, first, last and hover */
        $(selector).find("*").hover(function () {
            $(this).addClass("hover");
        }, function () {
            $(this).removeClass("hover");
            $(this).removeClass('pressed');
        }).focus(function() {
            $(this).addClass('focus');
        }).blur(function() {
            $(this).removeClass('focus');
        }).mousedown(function(){
            $(this).addClass('pressed');
        });

        $(selector).find("input").addClass(function () {
            return $(this).attr("type").toLowerCase();
        });
        $(selector).find("select").addClass("select");
        $(selector).find("select[multiple]").addClass("multiple");

        $(selector).find("table > tr:nth-child(odd),ul > li:nth-child(odd), ol > li:nth-child(odd), .list > .comment:nth-child(odd)").addClass("odd");
        $(selector).find("table > tr:nth-child(even),ul > li:nth-child(even), ol > li:nth-child(even), .list > .comment:nth-child(even)").addClass("even");
        $(selector).find("ul > li:first-child, ol > li:first-child, .list > .comment:first-child, div > .button:first-child").addClass("first");
        $(selector).find("ul > li:last-child, ol > li:last-child, .list > .comment:last-child, div > .button:last-child").addClass("last");

        $(selector).find("[class^=blocks_] > div.block:first-child").addClass("first");
        $(selector).find("[class^=blocks_] > div.block:last-child").addClass("last");

        $(selector).find("[class^=grid] tr").removeClass("first last even odd");
        $(selector).find("[class^=grid] tr:first-child").addClass ("first");
        $(selector).find("[class^=grid] tr:last-child").addClass ("last");
        $(selector).find("[class^=grid] tr:nth-child(odd)").addClass ("even");
        $(selector).find("[class^=grid] tr:nth-child(even)").addClass ("odd");

        $(selector).find("[class^=grid] tr:first-child td:first-child").addClass ("first");
        $(selector).find("[class^=grid] tr:first-child td:last-child").addClass ("last");
        $(selector).find("[class^=grid] tr:first-child td:nth-child(odd)").addClass ("even");
        $(selector).find("[class^=grid] tr:first-child td:nth-child(even)").addClass ("odd");

        /* HTML5 Input's Placeholder for older browser */
        $(selector).find('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();
        $(selector).find('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            })
        });
    }
};

var konami = "38,38,40,40,37,39,37,39,66,65".split(',');
var keyIndex = 0;
$(document).keydown(function(ev) {
    (konami[keyIndex] == ev.keyCode) ? keyIndex++:keyIndex = 0;
    if (keyIndex == konami.length) {
        keyIndex = 0;
    }
});
