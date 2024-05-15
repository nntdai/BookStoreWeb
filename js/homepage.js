// Ẩn/Hiện dropdown menu
let angle_down = document.getElementById('angle_down');
angle_down.addEventListener("click", function(event) {
    let dropdown_content = document.getElementById('dropdown_content');
    dropdown_content.classList.toggle('hidden');
})

//Hover danh mục thì sẽ hiện ra chủ đề
window.addEventListener('DOMContentLoaded', function() {
  let categories = document.querySelectorAll('.category');
  let contents = document.querySelectorAll('.content');
  categories.forEach(function(category, index) {
    category.addEventListener('mouseover', function() {
      hideAllContents();
      contents[index].classList.add('active');
    });

    category.addEventListener('mouseleave', function() {
      contents[index].classList.remove('active');
    });
  });

  function hideAllContents() {
    contents.forEach(function(content) {
      content.classList.remove('active');
    });
  }
});


//Click vào chủ đề để lọc sách ở các vùng sách tiếng việt và nước ngoài
window.addEventListener('DOMContentLoaded', function() {
  var listItems = document.querySelectorAll('.bookszoneproduct_header .list li');

  listItems.forEach(function(listItem) {
    listItem.addEventListener('click', function() {
      // Loại bỏ hiệu ứng box-shadow khỏi tất cả các phần tử
      listItems.forEach(function(item) {
        item.style.boxShadow = 'none';
      });

      // Áp dụng hiệu ứng box-shadow vào phần tử được click
      this.style.boxShadow = '0 3px';
    });
  });
});

//Click vào img Search sẽ hiện ra input
let Btn_search = document.getElementById('btn_search');
Btn_search.addEventListener('click', function(){
  let Input_search = document.getElementById('search');
  Input_search.classList.toggle('block');
})

$(window).on('resize', function() {
  //neu chieu rong cua trinh duyet co width: 576px thi reload lai trang
  if (window.matchMedia('(max-width: 576px)').matches) {
      location.reload();
  }
});
function updateAndShowDetailModal(product){
  let modal = $("#productModal");
  modal.find(".productName").text(product.ten);
  modal.find(".productPrice").text(product.giagoc+"đ");
  modal.find(".productDescription").text(product.moTa);
  modal.find(".productImage").attr("src", product.url);
  modal.find(".productAuthor").text(product.hoTen);
  modal.find(".productTranslator").text(product.tenNguoiDich);
  modal.find(".productPublisher").text(product.tenNXB);
  modal.find(".productPublishYear").text(product.namXB);
  modal.find(".productCategory").text(product.tenTheLoai);
  modal.find(".productPageCount").text(product.soTrang);
  modal.find(".productWeight").text(product.trongLuong+" gram");
  modal.find(".productDimension").text(product.kichThuocBaoBi);

    //update event add to cart
    modal.find("#btn_addToCart").off("click").click(function(){
        addToCart(product);
        $("#productModal").modal("hide");
    });

  modal.modal("show");
}

function addToCart(product){
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (!cart) cart = [];
    let found = false;
    cart.forEach(item => {
        if (item.id == product.id) {
            item.quantity++;
            found = true;
        }
    });
    if (!found) {
        cart.push({
            id: product.id,
            ten: product.ten,
            url: product.url,
            giagoc: product.giagoc,
            quantity: 1
        });
    }
    localStorage.setItem("cart", JSON.stringify(cart));
}


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




