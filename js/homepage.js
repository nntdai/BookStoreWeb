// Ẩn/Hiện dropdown menu
let angle_down = document.getElementById('angle_down');
angle_down.addEventListener("click", function(event) {
    let dropdown_content = document.getElementById('dropdown_content');
    dropdown_content.classList.toggle('hidden');
})
// Ẩn/Hiện dropdown user
let user_img = document.getElementById('user_img');
user_img.addEventListener("click", function(event) {
    let user_dropdown = document.getElementById('user_dropdown');
    user_dropdown.classList.toggle('hidden');
})

/*----------------------------Banner_Slide----------------------------*/
let slideIndex = 1;
showSlides(slideIndex);
// Thumbnail image controls
setInterval(function() {
  slideIndex++;
  showSlides(slideIndex);
}, 5000);
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("item");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "grid";
  dots[slideIndex-1].className += " active";
}
/*----------------------------Slider cua khuyen mai----------------------------*/
let discount_slider = document.querySelector('.discount_wrapper .product_wrapper .list');
let product = document.querySelectorAll('.discount_wrapper .product_wrapper .list .product');
let next = document.getElementById('next');
let prev = document.getElementById('prev');

let lengthproduct = product.length - 1;
let productWidth = product[0].offsetWidth; // Assume all products have the same width
let active = 0;

next.onclick = function(){
    active = active + 1 <= lengthproduct/4 ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0? active - 1 : lengthproduct;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
  discount_slider.style.transform = `translateX(-${active * discount_slider.offsetWidth}px)`;
    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);
}

/*----------------------------Slider cua sach tieng viet----------------------------*/
let vietnam_product_slider = document.querySelector('.vietnam_product .product_wrapper .list');
let vietnam_product = document.querySelectorAll('.vietnam_product .product_wrapper .list .product');
let vietnamzone_next = document.getElementById('vietnam_next');
let vietnamzone_prev = document.getElementById('vietnam_prev');

let vietnamproduct_length = vietnam_product.length - 1;
let vietnamzone_productWidth = vietnam_product[0].offsetWidth; // Assume all products have the same width
let vietnamzone_active = 0;

let vietnamzone_refreshInterval = setInterval(()=> {next.click()}, 3000);
vietnamzone_next.onclick = function(){
    vietnamzone_active = vietnamzone_active + 1 <= vietnamproduct_length/4 ? vietnamzone_active + 1 : 0;
    vietnamzone_reloadSlider();
}
vietnamzone_prev.onclick = function(){
    vietnamzone_active = vietnamzone_active - 1 >= 0? vietnamzone_active - 1 : vietnamproduct_length;
    vietnamzone_reloadSlider();
}

function addToCart(product){
    let cart = JSON.parse(localStorage.getItem("cart"));
    let phonenum = document.getElementById("soDienThoai").value;
      $.ajax({
        url: './homepage_pages/add_to_cart.php', // URL of your PHP script
        type: 'POST',
        data: {id: product.idSach, phonenum: phonenum, price:product.giagoc},
        success: function(response) {
            alert(response);
        },
        error: function() {
            alert('An error occurred');
        }
    });
        cart.push({
            id: product.id,
            ten: product.ten,
            url: product.url,
            giagoc: product.giagoc,
            quantity: 1
        });
    localStorage.setItem("cart", JSON.stringify(cart));
}

//chua dung den
$("#btn_showCart").click(function(){
    //load gio hang
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (!cart) cart = [];
    let content = $("#cartContent");
    content.html("");
    cart.forEach(item => {
        let row = `
            <li class="row">
                <div class="col-3">
                    <img src="${item.url}" alt="Ảnh ${item.ten}" style="width: 100%">
                </div>
                <div class="col-9">
                    <h5>${item.ten}</h5>
                    <p>${item.giagoc}đ x ${item.quantity}</p>
                </div>
            </li>
        `;
        content.append(row);
    });

});

let shopping_cart = document.getElementById('btn_showCart');
shopping_cart.addEventListener('click' , function(event){
  document.location.href = "./homepage_pages/cart.php";
})


