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
function vietnamzone_reloadSlider(){
  vietnam_product_slider.style.transform = `translateX(-${vietnamzone_active * vietnam_product_slider.offsetWidth}px)`;
    clearInterval(vietnamzone_refreshInterval);
    vietnamzone_refreshInterval = setInterval(()=> {vietnamzone_next.click()}, 3000);
}

/*----------------------------Slider cua sach tieng anh----------------------------*/
let eng_product_slider = document.querySelector('.eng_product .product_wrapper .list');
let eng_product = document.querySelectorAll('.eng_product .product_wrapper .list .product');
let engzone_next = document.getElementById('eng_next');
let engzone_prev = document.getElementById('eng_prev');

let engproduct_length = eng_product.length - 1;
let engzone_productWidth = eng_product[0].offsetWidth; // Assume all products have the same width
let engzone_active = 0;

let engzone_refreshInterval = setInterval(()=> {next.click()}, 3000);

engzone_next.onclick = function(){
    engzone_active = engzone_active + 1 <= engproduct_length/4 ? engzone_active + 1 : 0;
    engzone_reloadSlider();
}
engzone_prev.onclick = function(){
    engzone_active = engzone_active - 1 >= 0? engzone_active - 1 : engproduct_length;
    engzone_reloadSlider();
}
function engzone_reloadSlider(){
  eng_product_slider.style.transform = `translateX(-${engzone_active * eng_product_slider.offsetWidth}px)`;
    clearInterval(engzone_refreshInterval);
    engzone_refreshInterval = setInterval(()=> {engzone_next.click()}, 3000);
}

window.onresize = function() {
  reloadSlider();
  vietnamzone_reloadSlider();
  engzone_reloadSlider();
};