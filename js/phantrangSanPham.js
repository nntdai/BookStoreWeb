function loadPage(page, khuyenmai, chude, ngonngu, collapse){
    let requestData = {};
    if (khuyenmai) requestData.khuyenmai = khuyenmai;
    if (chude) requestData.chude = chude;
    if (ngonngu) requestData.ngonngu = ngonngu;
    requestData.page = page;
    $.ajax({
        url: "homepage_pages/phantrang_khuyenmai.php",
        method: "POST",
        data: requestData,
        success: function(response){
            console.log(response);
            data = JSON.parse(response);
            let products = data.products;
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
                loadPage(data.last_page, khuyenmai, chude, ngonngu, collapse);
            });

            //hien thi san pham nhan duoc
            let output = document.querySelector(collapse+" .response");
            output.innerHTML = "";
            products.forEach(product => {
                let wrapper = document.createElement("div");
                wrapper.classList.add("col-sm-6", "col-md-4", "col-lg-3");
                let card = document.createElement("div");
                card.classList.add("card");
                card.innerHTML = `
                    <div class="img-wrapper">
                        <img src="${product.hinhAnh}" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> ${product.ten} </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                `;
                wrapper.appendChild(card);
                output.appendChild(wrapper);
            });
        }
    });
}

$("#km_collapse").on("click", ".page-index", function(){
    if ($(this).hasClass("active")) return;
    $(this).addClass("active").siblings().removeClass("active");
    loadPage($(this).text(), 1, 0, 0, "#km_collapse");
});

$("#km_collapse").on("click", ".go-to-first-btn", function(){
    loadPage(1, 1, 0, 0, "#km_collapse");
});
$(document).ready(function() {
    loadPage(1, 1, 0, 0, "#km_collapse");
});