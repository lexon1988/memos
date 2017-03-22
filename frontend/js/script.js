var trig = 1;
var trig2 = 1;
var turn = 90;
var grid = $('.grid');


grid.imagesLoaded(function () {

    $('.grid').show();

    grid.masonry({

        itemSelector: '.grid-item',
        columnWidth: 315,
        isFitWidth: true,
        transitionDuration: '0.3s'


    });

});


grid.imagesLoaded(function () {

    grid.infinitescroll({
// Pagination element that will be hidden
            navSelector: '#pagination',
            // Next page link
            nextSelector: '#next_page',
            // Selector of items to retrieve
            itemSelector: '.grid-item',

            extraScrollPx: 350
        },


// Function called once the elements are retrieved
        function (new_elts) {

            var elts = $(new_elts);
            grid.masonry('appended', elts);

        });

});


$('#navbar').toggleNav({
    slideEffect: true,
    speed: 400
});


$("#menu").click(function () {

    trig = trig + 1;


    if (trig == 2) {


        $(".modal_shade").show();
        $(".modal").slideDown();
        $(".modal").show(600);

        $("#menu").rotate({
            endDeg: turn,
            persist: true,
            duration: 0.3,
        });


        $(".modal_shade").animate({
            opacity: 0.5,
        }, 500, function () {
        });
        $("body").css("overflow-y", "hidden");


        turn = turn + 90;

    }

    if (trig == 3) {

        trig = 1;

        $(".modal").slideUp();
        $(".modal").hide(100);

        $("#menu").rotate({
            endDeg: turn,
            persist: true,
            duration: 0.3,
        });

        if (trig2 != 2) {

            $(".modal_shade").animate({
                opacity: 0,
            }, 100, function () {
                $(".modal_shade").hide();
                $("body").css("overflow-y", "auto");
            });

        }


        turn = turn + 90;
    }

});


$("#sett").click(function () {

    trig2 = trig2 + 1;


    if (trig2 == 2) {

        $("#sett").rotate({
            endDeg: -360,
            count: 1,
            duration: 0.4
        });


        $(".modal_shade").show();
        $(".modal2").slideDown();
        $(".modal2").show(600);


        $(".modal_shade").animate({
            opacity: 0.5,
        }, 500, function () {

        });

        $("body").css("overflow-y", "hidden");


    }

    if (trig2 == 3) {

        $("#sett").rotate({
            endDeg: 360,
            count: 1,
            duration: 0.4
        });


        $(".modal2").slideUp();
        $(".modal2").hide(100);

        if (trig != 2) {

            $(".modal_shade").animate({
                opacity: 0,
            }, 100, function () {
                $(".modal_shade").hide();
                $("body").css("overflow-y", "auto");
            });

        }

        trig2 = 1;

    }


});


$(".modal_shade").click(function () {


    $(".modal").slideUp();
    $(".modal").hide(200);

    if (trig == 2) {
        $("#menu").rotate({
            endDeg: turn,
            persist: true,
            duration: 0.3,
        });
        turn = turn + 90;

    }

    if (trig2 == 2) {
        $("#sett").rotate({
            endDeg: 360,
            count: 1,
            duration: 0.4
        });
    }


    $(".modal2").slideUp();
    $(".modal2").hide(200);


    $(".modal_shade").animate({
        opacity: 0,
    }, 300, function () {


        $(".modal_shade").hide();
        $("body").css("overflow-y", "auto");
    });


    trig = 1;
    trig2 = 1;

});


$('html').keydown(function (eventObject) {
    if (event.keyCode == 27) {

        if (trig2 == 2) {

            $("#sett").rotate({
                endDeg: 360,
                count: 1,
                duration: 0.4
            });


            $(".modal2").slideUp();
            $(".modal2").hide(100);

            $(".modal_shade").animate({
                opacity: 0,
            }, 100, function () {
                $(".modal_shade").hide();
                $("body").css("overflow-y", "auto");
            });



            trig2 = 1;

        }


        if (trig == 2) {

            trig = 1;

            $(".modal").slideUp();
            $(".modal").hide(100);

            $("#menu").rotate({
                endDeg: turn,
                persist: true,
                duration: 0.3,
            });

            if (trig2 != 2) {

                $(".modal_shade").animate({
                    opacity: 0,
                }, 100, function () {
                    $(".modal_shade").hide();
                    $("body").css("overflow-y", "auto");
                });

            }


            turn = turn + 90;
        }

        $(".text_full").hide();
        $(".modal_text").hide();

        $("body").css("overflow-y", "auto");

    }


});


$.fn.rotate = function (options) {
    var $this = $(this),
        prefixes, opts, wait4css = 0;
    prefixes = ['-Webkit-', '-Moz-', '-O-', '-ms-', ''];
    opts = $.extend({
        startDeg: false,
        endDeg: 360,
        duration: 1,
        count: 1,
        easing: 'linear',
        animate: {},
        forceJS: false
    }, options);

    function supports(prop) {
        var can = false,
            style = document.createElement('div').style;
        $.each(prefixes, function (i, prefix) {
            if (style[prefix.replace(/\-/g, '') + prop] === '') {
                can = true;
            }
        });
        return can;
    }

    function prefixed(prop, value) {
        var css = {};
        if (!supports.transform) {
            return css;
        }
        $.each(prefixes, function (i, prefix) {
            css[prefix.toLowerCase() + prop] = value || '';
        });
        return css;
    }

    function generateFilter(deg) {
        var rot, cos, sin, matrix;
        if (supports.transform) {
            return '';
        }
        rot = deg >= 0 ? Math.PI * deg / 180 : Math.PI * (360 + deg) / 180;
        cos = Math.cos(rot);
        sin = Math.sin(rot);
        matrix = 'M11=' + cos + ',M12=' + (-sin) + ',M21=' + sin + ',M22=' + cos + ',SizingMethod="auto expand"';
        return 'progid:DXImageTransform.Microsoft.Matrix(' + matrix + ')';
    }

    supports.transform = supports('Transform');
    supports.transition = supports('Transition');

    opts.endDeg *= opts.count;
    opts.duration *= opts.count;

    if (supports.transition && !opts.forceJS) { // CSS-Transition
        if ((/Firefox/).test(navigator.userAgent)) {
            wait4css = (!options || !options.animate) && (opts.startDeg === false || opts.startDeg >= 0) ? 0 : 25;
        }
        $this.queue(function (next) {
            if (opts.startDeg !== false) {
                $this.css(prefixed('transform', 'rotate(' + opts.startDeg + 'deg)'));
            }
            setTimeout(function () {
                $this
                    .css(prefixed('transition', 'all ' + opts.duration + 's ' + opts.easing))
                    .css(prefixed('transform', 'rotate(' + opts.endDeg + 'deg)'))
                    .css(opts.animate);
            }, wait4css);

            setTimeout(function () {
                $this.css(prefixed('transition'));
                if (!opts.persist) {
                    $this.css(prefixed('transform'));
                }
                next();
            }, (opts.duration * 1000) - wait4css);
        });

    } else { // JavaScript-Animation + filter
        if (opts.startDeg === false) {
            opts.startDeg = $this.data('rotated') || 0;
        }
        opts.animate.perc = 100;

        $this.animate(opts.animate, {
            duration: opts.duration * 1000,
            easing: $.easing[opts.easing] ? opts.easing : '',
            step: function (perc, fx) {
                var deg;
                if (fx.prop === 'perc') {
                    deg = opts.startDeg + (opts.endDeg - opts.startDeg) * perc / 100;
                    $this
                        .css(prefixed('transform', 'rotate(' + deg + 'deg)'))
                        .css('filter', generateFilter(deg));
                }
            },
            complete: function () {
                if (opts.persist) {
                    while (opts.endDeg >= 360) {
                        opts.endDeg -= 360;
                    }
                } else {
                    opts.endDeg = 0;
                    $this.css(prefixed('transform'));
                }
                $this.css('perc', 0).data('rotated', opts.endDeg);
            }
        });
    }

    return $this;
};











