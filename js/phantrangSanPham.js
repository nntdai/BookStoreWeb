function loadPage(page, khuyenmai, idChuDe, idNgonNgu, idTheLoai, khoangGia, tenSach ,collapse, updateCarousel){
    let requestData = {};
    if (khuyenmai != 0) requestData.khuyenmai = khuyenmai;
    if (idChuDe != 0) requestData.chude = idChuDe;
    if (idNgonNgu != 0) requestData.ngonngu = idNgonNgu;
    if (khoangGia != 0) requestData.price_range = khoangGia;
    if (idTheLoai != 0) requestData.theloai = idTheLoai;
    if (tenSach != 0) requestData.tenSach = tenSach;
    requestData.page = page;
    
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
                console.log("Khong tim thay san pham nao")
                $(collapse + " .response").html("<h1>Không tìm thấy sản phẩm nào</h1>");
            }
            // cap nhap carousel
            //tim carousel inner gan nhat
            $carousel = $(collapse).siblings(".carousel");
            $carouselInner = $carousel.find(".carousel-inner");
            if ($carouselInner && updateCarousel) {
                console.log("carousel inner");
                $carouselInner.html("");
                //lay index khi for each product
                products.forEach(function(product, index) {
                    $carouselInner.append(`
                    <div class="carousel-item ${index==0? "active":""}" style="width: 320px;">  
                        <div class="card">
                            <div class="img-wrapper">
                                <img src="${product.hinhAnh}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-nowrap overflow-hidden">${product.ten}</h5>
                                <p class="card-text" style="height: 100px; overflow: auto;">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    `);
                });
            }

            //TODO: hien thi thanh phan trang
            let html = `
                <ul class=\"pagination\">
                    <li class=\"page-item go-to-first-btn ${page==1? "disabled" : ""}\">
                        <a class=\"page-link\"aria-label=\"Previous\">
                            <span aria-hidden=\"true\">&laquo;</span>
                        </a>
                    </li>
            `;
            for(let i= data.start_page; i <= data.end_page; i++) {
                if (i == page) html += `
                    <li class=\"page-item page-index active\"><a class=\"page-link\">${i}</a></li>
                `;
                else html += `
                    <li class=\"page-item page-index\"><a class=\"page-link\">${i}</a></li>
                `;
            }
            html += `
                    <li class=\"page-item go-to-last-btn ${page==data.last_page? "disabled" : ""}\">
                        <a class=\"page-link\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">&raquo;</span>
                        </a>
                    </li>
                </ul>
            `;
            $(collapse + " nav").html(html);

            //them event last page
            $(collapse + " .go-to-last-btn").click(function(){
                if ($(this).hasClass("active")) return;
                $(this).addClass("active").siblings().removeClass("active");
                loadPage(data.last_page, khuyenmai, idChuDe, idNgonNgu, idTheLoai, khoangGia, tenSach, collapse);
            });
            $(collapse).on("click", ".page-index", function(){
                if ($(this).hasClass("active")) return;
                $(this).addClass("active").siblings().removeClass("active");
                loadPage($(this).text(), khuyenmai, idChuDe, idNgonNgu, idTheLoai, khoangGia, tenSach, collapse);
            });
            
            $(collapse).on("click", ".go-to-first-btn", function(){
                loadPage(1, khuyenmai, idChuDe, idNgonNgu, idTheLoai, khoangGia, tenSach, collapse);
            });

            //hien thi san pham nhan duoc
            let output = document.querySelector(collapse+" .response");
            output.innerHTML = "";
            products.forEach(product => {
                let wrapper = document.createElement("div");
                wrapper.classList.add("col-sm-6", "col-md-4", "col-lg-3");
                wrapper.innerHTML = `
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="${product.hinhAnh}" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-nowrap overflow-hidden"> ${product.ten} </h5>
                            <p class="card-text" style="height: 100px; overflow: auto;">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                `;
                output.appendChild(wrapper);
            });
        }
    });
}

$(document).ready(function() {
    loadPage(1, 1, 0, 0, 0, 0, 0, "#km_collapse", true);
    loadPage(1, 0,1, 1, 0, 0, 0, '#sachtiengviet_collapse', true);
    loadPage(1, 0, 5, 2, 0, 0, 0, '#sachtienganh_collapse', true);
});