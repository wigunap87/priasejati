(function($) {
    $(function() {
        var jcarousel = $('.jcarouselhome');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var width = jcarousel.innerWidth();

                if (width >= 600) {
                    width = width / 4;
                } else if (width >= 350) {
                    width = width / 1;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        $('.jcarouselhome-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarouselhome-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarouselhome-pagination')
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
	setInterval("$('.jcarouselhome').jcarousel('scroll', '+=1')", 5000)
})(jQuery);
