
$(document).ready(function() {
    // load data from ajax request
    function load_km_data(page){
        $.ajax({
            url: "homepage_pages/phantrang_khuyenmai.php",
            method: "POST",
            data: {discount_page: page},
            success: function(km_data){
                km_data = JSON.parse(km_data);
                let products = km_data.products;
                //TODO: hien thi thanh phan trang
                let html = `
                    <ul class=\"pagination\">
                        <li class=\"page-item go-to-first-btn ${page==1? "disabled" : ""}\">
                            <a class=\"page-link\"aria-label=\"Previous\">
                                <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                        </li>
                `;
                for(let i= km_data.start_page; i <= km_data.end_page; i++) {
                    if (i == page) html += `
                        <li class=\"page-item page-index active\"><a class=\"page-link\">${i}</a></li>
                    `;
                    else html += `
                        <li class=\"page-item page-index\"><a class=\"page-link\">${i}</a></li>
                    `;
                }
                html += `
                        <li class=\"page-item go-to-last-btn ${page==km_data.last_page? "disabled" : ""}\">
                            <a class=\"page-link\" aria-label=\"Next\">
                                <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                `;
                $("#km_collapse nav").html(html);
                $("#km_collapse .page-index").click(function(){
                    if ($(this).hasClass("active")) return;
                    $(this).addClass("active").siblings().removeClass("active");
                    load_km_data($(this).text());
                });
                $("#km_collapse .go-to-first-btn").click(function(){
                    load_km_data(1);
                });
                $("#km_collapse .go-to-last-btn").click(function(){
                    load_km_data(km_data.last_page);
                });

                //hien thi san pham nhan duoc
                let response = document.querySelector("#km_collapse .response");
                response.innerHTML = "";
                products.forEach(product => {
                    let wrapper = document.createElement("div");
                    wrapper.classList.add("col-sm-6", "col-md-4", "col-lg-3");
                    let card = document.createElement("div");
                    card.classList.add("card");
                    card.innerHTML = `
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${product.tensp}</h5>
                            <p class="card-text">${product.dongia}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    `;
                    wrapper.appendChild(card);
                    response.appendChild(wrapper);
                });
            }
        });
    }

    load_km_data(1);   
    
    function load_sp_data(page){
        $.ajax({
            url: "homepage_pages/phantrang_khuyenmai.php",
            method: "POST",
            data: {discount_page: page},
            success: function(km_data){
                km_data = JSON.parse(km_data);
                let products = km_data.products;
                //TODO: hien thi thanh phan trang
                let html = `
                    <ul class=\"pagination\">
                        <li class=\"page-item go-to-first-btn ${page==1? "disabled" : ""}\">
                            <a class=\"page-link\"aria-label=\"Previous\">
                                <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                        </li>
                `;
                for(let i= km_data.start_page; i <= km_data.end_page; i++) {
                    if (i == page) html += `
                        <li class=\"page-item page-index active\"><a class=\"page-link\">${i}</a></li>
                    `;
                    else html += `
                        <li class=\"page-item page-index\"><a class=\"page-link\">${i}</a></li>
                    `;
                }
                html += `
                        <li class=\"page-item go-to-last-btn ${page==km_data.last_page? "disabled" : ""}\">
                            <a class=\"page-link\" aria-label=\"Next\">
                                <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                `;
                $("#km_collapse nav").html(html);
                $("#km_collapse .page-index").click(function(){
                    if ($(this).hasClass("active")) return;
                    $(this).addClass("active").siblings().removeClass("active");
                    load_km_data($(this).text());
                });
                $("#km_collapse .go-to-first-btn").click(function(){
                    load_km_data(1);
                });
                $("#km_collapse .go-to-last-btn").click(function(){
                    load_km_data(km_data.last_page);
                });

                //hien thi san pham nhan duoc
                let response = document.querySelector("#km_collapse .response");
                response.innerHTML = "";
                products.forEach(product => {
                    let wrapper = document.createElement("div");
                    wrapper.classList.add("col-sm-6", "col-md-4", "col-lg-3");
                    let card = document.createElement("div");
                    card.classList.add("card");
                    card.innerHTML = `
                        <div class="img-wrapper">
                            <img src="./Image/image_180222.jpg" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${product.tensp}</h5>
                            <p class="card-text">${product.dongia}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    `;
                    wrapper.appendChild(card);
                    response.appendChild(wrapper);
                });
                

            }
        });
    }

    load_sp_data(1);  
});