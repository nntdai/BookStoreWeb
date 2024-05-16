
function loadPage(requestData, target){
    console.log(requestData);
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
                $(target + " .response").html("<h1>Không tìm thấy sản phẩm nào</h1>");
                $(target + "> nav").html("");
                return;
            }

            //TODO: hien thi thanh phan trang
            let html = `
                <ul class=\"pagination\">
                    <li class=\"page-item go-to-first-btn ${requestData.page==1? "disabled" : ""}\">
                        <a class=\"page-link\"aria-label=\"Previous\">
                            <span aria-hidden=\"true\">&laquo;</span>
                        </a>
                    </li>
            `;
            for(let i= data.start_page; i <= data.end_page; i++) {
                if (i == requestData.page) html += `
                    <li class=\"page-item page-index active\"><a class=\"page-link\">${i}</a></li>
                `;
                else html += `
                    <li class=\"page-item page-index\"><a class=\"page-link\">${i}</a></li>
                `;
            }
            html += `
                    <li class=\"page-item go-to-last-btn ${requestData.page==data.last_page? "disabled" : ""}\">
                        <a class=\"page-link\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">&raquo;</span>
                        </a>
                    </li>
                </ul>
            `;
            //neu last_page = 1 thi khong hien thi thanh phan trang
            if (data.last_page == 1) html = "";
            $(target + "> nav").html(html);

            $(target).off("click", ".page-index").on("click", ".page-index", function(e){
                if ($(e.target).hasClass("active")) return;
                $(e.target).addClass("active").siblings().removeClass("active");
                let copy = JSON.parse(JSON.stringify(requestData));
                copy.page = $(e.target).text();
                loadPage(copy, target);
            });
            
            let lastPage = data.last_page;//luu lai trang cuoi cung
            $(target).off("click", ".go-to-last-btn").on("click", ".go-to-last-btn", function(e){
                if ($(e.target).hasClass("active")) return;
                $(e.target).addClass("active").siblings().removeClass("active");
                let copy = JSON.parse(JSON.stringify(requestData));
                copy.page = lastPage;
                loadPage(copy, target);
            });
            $(target).off("click", ".go-to-first-btn").on("click", ".go-to-first-btn", function(e){
                let copy = JSON.parse(JSON.stringify(requestData));
                copy.page = 1;
                loadPage(copy, target);
            });

            //hien thi san pham nhan duoc
            let output = document.querySelector(target+" .response");
            output.innerHTML = "";
            products.forEach(product => {
                let wrapper = document.createElement("div");
                wrapper.classList.add("col-sm-6", "col-md-4", "col-lg-3");
                wrapper.innerHTML = `
                    <div class="card" style="width: 320px">
                        <div class="img-wrapper">
                            <img src="${product.url}" alt="Ảnh ${product.ten}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-nowrap overflow-hidden"> ${product.ten} </h5>
                            <p class="card-text text-primary"></p>${product.giagoc}đ</p>
                            <p class="card-text" style="height: 100px; overflow: auto;">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                            <a class="btn btn-primary" id="btn-showDetail">Xem chi tiết</a>
                        </div>
                    </div>
                `;
                output.appendChild(wrapper);
                //them su kien click vao card
                $(wrapper).find("#btn-showDetail").click(function(){
                    updateAndShowDetailModal(product);
                });
            });

        }
    });
}


$(document).ready(function() {
    loadPage({
        page: 1,
        khuyenmai: 1
    }, "#km_collapse");
    loadPage({
        page: 1,
        idDanhMuc: 1 //idDanhMuc: 1 la sach trong nuoc
    }, "#sachTrongNuoc_collapse");
    loadPage({
        page: 1,
        idDanhMuc: 2 //idDanhMuc: 2 la sach ngoai van
    }, "#sachNuocNgoai_collapse");

    $("#btn_thongtintaikhoan").on("click", function() {
        $("#thongtintaikhoan").modal("show");
    });
});