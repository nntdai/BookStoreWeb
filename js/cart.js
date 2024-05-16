// })
function itemDelete(item_id){
    $.ajax({
        url: './homepage_pages/delete_from_cart.php', // URL of your PHP script
        type: 'POST',
        data: {id: item_id},
        success: function(data) {
            location.replace(location.href);
        },
        error: function() {
            alert('An error occurred');
        }
    });
}
$('#purchase_button').click(function(){
    // var item_quantity = document.querySelector('.counter-value_detail').value;
    // var item_id = document.querySelector('.product_detail').id;
    // var item_price = document.querySelector('.newprice_detail').innerHTML
    // var total_price = parseInt(item_price.substring(0, item_price.indexOf(' '))) * item_quantity;
    // if (item_quantity == 0){
    //   alert("Chọn số lượng phù hợp");
    //   return;
    // }
    // document.getElementById("order_price").textContent = total_price + " đ";
    var datetime = new Date();
    document.getElementById('order_date').textContent = formatDateToSQL(datetime);
    document.getElementById("order_wrapper_cart").style.display = 'block';
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
    document.getElementById("order_wrapper_cart").style.display = 'none';
  }

$('#cartSubmit').click(function() {
    // var item_quantity = document.querySelector('.counter-value_detail').value;
    // var item_id = document.querySelector('.product_detail').id;
    var cart_price = document.querySelector('#cart_total_price').innerHTML
    var total_price = parseInt(cart_price.substring(0, cart_price.indexOf(' ')));
    var cart_id = document.getElementById('cart_id').innerHTML;
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
        data: {id: cart_id, address: address, sdt: phonenum, date: date,cart_price:total_price, method: 2},
        success: function(data) {
            alert("Đã thanh toán sản phẩm");
        },
        error: function() {
            alert('An error occurred');
        }
    });
  });