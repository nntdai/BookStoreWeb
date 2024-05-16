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
  document.getElementById("info_btn").click();
  function viewTabs(evt, tab_name){
    var tabcontent = document.getElementsByClassName("detailed_information");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    var tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tab_name).style.display = "flex";
    evt.currentTarget.className += " active";
  }
  
  let slideIndex = 0;
  let numSlides = 5;
  
  function nextSlide() {
    var slider = document.querySelector('.recommending_books_detail');
    slideIndex += numSlides;
    slider.scrollLeft = 5;
    if (slideIndex >= slider.childNodes.length) {
      slideIndex = 0;
    }
    slider.scrollLeft = slideIndex * slider.children[0].offsetWidth;
  }
  function prevSlide(){
    var slider = document.querySelector('.recommending_books_detail');
    slideIndex -= numSlides;
    slider.scrollLeft = 5;
    if (slideIndex < 0) {
      slideIndex = slider.childNodes.length - numSlides;
    }
    slider.scrollLeft = slideIndex * slider.children[0].offsetWidth;
  }
  
  function clickedDetail(id){
    document.location.href = "thongtinSP.php?id="+id;
  }
  window.onload = function() {
    var counter = document.querySelector('.counter-value_detail');
    var max_value = counter.max;
    counter.addEventListener('input', function() {
        if (parseInt(this.value) > max_value) {
            this.value = max_value;
        } else if (parseInt(this.value) < 0) {
            this.value = 0;
        }
    });
  };
  
  $('#purchase_btn').click(function(){
    var item_quantity = document.querySelector('.counter-value_detail').value;
    var item_id = document.querySelector('.product_detail').id;
    var item_price = document.querySelector('.newprice_detail').innerHTML
    var total_price = parseInt(item_price.substring(0, item_price.indexOf(' '))) * item_quantity;
    if (item_quantity == 0){
      alert("Chọn số lượng phù hợp");
      return;
    }
    document.getElementById("order_price").textContent = total_price + " đ";
    var date = new Date();
    document.getElementById('order_date').textContent = formatDateToSQL(date);
    document.getElementById("order_wrapper").style.display = 'block';
  })
  function formatDateToSQL(date) {
    var mm = date.getMonth() + 1; 
    var dd = date.getDate();
  
    return [date.getFullYear(),
            (mm>9 ? '' : '0') + mm,
            (dd>9 ? '' : '0') + dd
           ].join('-');
  }
  function hideOrderPopup(){
    document.getElementById("order_wrapper").style.display = 'none';
  }
  $('#addtoCart_btn').click(function() {
    var item_quantity = document.querySelector('.counter-value_detail').value;
    var item_id = document.querySelector('.product_detail').id;
    var item_price = document.querySelector('.newprice_detail').innerHTML
    var total_price = parseInt(item_price.substring(0, item_price.indexOf(' '))) * item_quantity;
    if (item_quantity == 0){
      alert("Chọn số lượng phù hợp");
      return;
    }
    $.ajax({
        url: './homepage_pages/add_to_cart.php', // URL of your PHP script
        type: 'POST',
        data: {id: item_id, quantity: item_quantity, price: total_price},
        success: function(data) {
            alert("Đã thêm vào giỏ hàng");
        },
        error: function() {
            alert('An error occurred');
        }
    });
  });
  
  $('#orderSubmit').click(function() {
    var item_quantity = document.querySelector('.counter-value_detail').value;
    var item_id = document.querySelector('.product_detail').id;
    var item_price = document.querySelector('.newprice_detail').innerHTML
    var total_price = parseInt(item_price.substring(0, item_price.indexOf(' '))) * item_quantity;
    var address = document.getElementById('address').value;
    var phonenum = document.getElementById('order_phonenum').innerHTML;
    var date = document.getElementById('order_date').textContent;
    if (address == ""){
      alert("Vui lòng nhập địa chỉ");
      return;
    }
    $.ajax({
        url: './homepage_pages/createBill.php', // URL of your PHP script
        type: 'POST',
        data: {id: item_id, quantity: item_quantity, price: total_price, address: address, sdt: phonenum, date: date, method: 1},
        success: function(data) {
            alert("Đã thanh toán sản phẩm");
        },
        error: function() {
            alert('An error occurred');
        }
    });
  });