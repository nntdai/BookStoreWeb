// })
function itemDelete(item_id, cart){
    $.ajax({
        url: 'delete_from_cart.php', // URL of your PHP script
        type: 'POST',
        data: {id: item_id, cart_id: cart},
        success: function(response) {
            location.replace(location.href);
        },
        error: function() {
            alert('An error occurred');
        }
    });
}
$('#purchase_button').click(function(){
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
    let product = document.getElementsByClassName('product_panel');
    if(product.length == 0){
        alert("Hãy thêm sản phẩm");
        return;
    }
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
        url: 'createBill.php', // URL of your PHP script
        type: 'POST',
        data: {id: cart_id, address: address, sdt: phonenum, date: date,cart_price:total_price},
        success: function(data) {
            alert("Đã thanh toán sản phẩm");
            location.replace(location.href);
        },
        error: function() {
            alert('An error occurred');
        }
    });
  });

function quantityChanged(id){
    let quantity = document.querySelector('#id' + id + ' .counter-value').value;
    let price = document.querySelector('#id' + id + ' .newprice').textContent;
    let item_price = parseInt(price.substring(0, price.indexOf(' ')));
    document.querySelector('#id' + id + ' .total').innerHTML = quantity * item_price +" đ";
    let product_quantity = document.getElementsByClassName("counter-value");
    let product_price = document.getElementsByClassName("newprice");
    let total_price = 0;
    let cart_id = document.getElementById('cart_id').innerHTML;
    for (var i = 0; i < product_quantity.length; i++){
        total_price += product_quantity[i].value * (parseInt(product_price[i].textContent.substring(0, product_price[i].textContent.indexOf(' '))));
    }
    document.getElementById("cart_total_price").textContent =total_price+" đ";
    $.ajax({
        url: 'updateCart.php', // URL of your PHP script
        type: 'POST',
        data: {id: cart_id, idSach: id, quantity: quantity, price: quantity * item_price},
        success: function(response) {
        },
        error: function() {
            alert('An error occurred');
        }
    });
}