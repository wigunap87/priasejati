(function($) {
    $(function() {
        var jcarousel = $('.jcarouselpartner');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 1;
                } else if (width >= 350) {
                    width = width / 1;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarouselpartner-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarouselpartner-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarouselpartner-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
	setInterval("$('.jcarouselpartner').jcarousel('scroll', '+=1')", 5000)
})(jQuery);
