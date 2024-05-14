function addEventListenerToCarousel(target) {
    if (window.matchMedia('(min-width: 576px)').matches) {
        let carousel = new bootstrap.Carousel(target, {
            interval: 1
        });

        //get target's carousel-inner width
        let carouselWidth = $(target).find('.carousel-inner').width();
        //get target's carousel-item width
        let carouselItemWidth = $(target).find('.carousel-item').width();
        let scrollPosition = 0;
        $(target).find('.carousel-control-prev').click(function() {
            if(scrollPosition > 0) {
                scrollPosition -= carouselItemWidth;
                $(target).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
            }
        });
        $(target).find('.carousel-control-next').click(function() {
            if(scrollPosition < carouselWidth - carouselItemWidth) {
                scrollPosition += carouselItemWidth;
                $(target).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
            }
            else {
                scrollPosition = 0;
                $(target).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
            }
        });

        target.interval = setInterval(function() {
            if(scrollPosition < carouselWidth - carouselItemWidth) {
                scrollPosition += carouselItemWidth;
                $(target).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
            }
            else {
                scrollPosition = 0;
                $(target).find('.carousel-inner').animate({scrollLeft: scrollPosition}, 500);
            }
        }, 3000);
    } else {
        let carousel = new bootstrap.Carousel(target, {
            
        });
        $(target).addClass("slide");
    }
}

function updateCarousel(requestData, target) { //taget co class 'carousel'
    $.ajax({
        url: "homepage_pages/phantrang.php",
        method: "POST",
        data: requestData,
        success: function(response){
            // console.log(response);
            try {
                data = JSON.parse(response);
            } catch (e) {
                console.log(response);
                return;
            }
            let products = data.products;
            if (products.length == 0) {
                $(target + " .carousel-inner").html("<h1>Không tìm thấy sản phẩm nào</h1>");
                //xoa thanh phan trang
                $(target + "> nav").html("");
                return;
            }
            
            //hien thi san pham nhan duoc
            let output = document.querySelector(target+" .carousel-inner");
            output.innerHTML = "";
            products.forEach(product => {
                output.innerHTML += `
                    <div class="carousel-item">
                        <div class="card" style="width: 320px">
                            <div class="img-wrapper">
                                <img src="${product.hinhAnh}" alt="Ảnh ${product.ten}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-nowrap overflow-hidden">${product.ten}</h5>
                                <p class="card-text text-primary"></p>${product.giagoc}đ</p>
                                <p class="card-text" style="height: 100px; overflow: auto;">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                `;
            });

            //active first item...
            $(target + " .carousel-item").first().addClass("active");

            //them event cho carousel
            addEventListenerToCarousel(target);
        }
    });
}

$(document).ready(function() {
    updateCarousel({
        page: 1,
        khuyenmai: 1
    }, "#khuyenmai_carousel");
    updateCarousel({
        page: 1,
        idDanhMuc: 1 //idDanhMuc: 1 la sach trong nuoc
    }, "#sachTrongNuoc_carousel");
    updateCarousel({
        page: 1,
        idDanhMuc: 2 //idDanhMuc: 2 la sach nuoc ngoai
    }, "#sachNuocNgoai_carousel");
});

