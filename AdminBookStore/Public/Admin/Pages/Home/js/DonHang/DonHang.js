function send_data_update(){
    var formData = new FormData(document.getElementById("update_order"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'View/Admin/Pages/DonHang/EditDonHang.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                // alert(response);
                if(response==2){
                    alert("Cập nhật đơn hàng thành công !");
                    window.location.href = 'index.php?controller=order';
                }else if(response==3){
                    alert("Cập nhật đơn hàng không thành công !");
                }else if(response==4){
                    var data=document.getElementById("khung_hinh_update")
                    data.style.display="block"
                    alert("Thiếu dữ liệu!");
                }
            } else {
                alert('Có lỗi xảy ra khi gửi yêu cầu.');
            }
        }
    };
    xhr.send(formData);
}
function close_update_order(){
    var data=document.getElementById('khung_hinh_update');
    data.style.display="none";
    window.location.href='index.php?controller=order'
}
function open_Detail(){
    var data=document.getElementById('khung_hinh_chitietgiohang');
    data.style.display="block";
}
function close_Detail(){
    var data=document.getElementById('khung_hinh_chitietgiohang');
    data.style.display="none";
}