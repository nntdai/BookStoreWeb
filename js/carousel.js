$(document).ready(function() {
    let sanPhamCarousel = document.querySelectorAll('.sanpham_carousel');
    if (window.matchMedia('(min-width: 576px)').matches) {
        $(sanPhamCarousel).each(function(index, element) {
            let carousel = new bootstrap.Carousel(element, {
                interval: 1
            });

            //get element's carousel-inner width
            let carouselWidth = $(element).find('.carousel-inner').width();
            //get element's carousel-item width
            let carouselItemWidth = $(element).find('.carousel-item').width();
            let scrollPosition = 0;
            $(element).find('.carousel-control-prev').click(function() {
                if(scrollPosition > 0) {
                    scrollPosition -= carouselItemWidth;
                    $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                }
            });
            $(element).find('.carousel-control-next').click(function() {
                if(scrollPosition < carouselWidth - carouselItemWidth) {
                    scrollPosition += carouselItemWidth;
                    $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                }
                else {
                    scrollPosition = 0;
                    $(element).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
                }
            });

            element.interval = setInterval(function() {
                $(element).find('.carousel-control-next').click();
            }, 3000);
        });

        
        
    } else {
        $(sanPhamCarousel).each(function(index, element) {
            let carousel = new bootstrap.Carousel(element, {
                
            });
            $(element).addClass("slide");
        });
    }
});

$(window).on('resize', function() {
    //neu chieu rong cua trinh duyet co width: 576px thi reload lai trang
    if (window.matchMedia('(max-width: 576px)').matches) {
        location.reload();
    }

});
