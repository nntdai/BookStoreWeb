function send_data(){
    var formData = new FormData(document.getElementById("add_account"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'View/Admin/Pages/TaiKhoan/AddTaiKhoan.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if(response==1){
                    var data=document.getElementById("khung_hinh")
                    data.style.display="block"
                    document.getElementById('PhoneText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
                    document.getElementById('PhoneError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
                    document.getElementById('PhoneError').innerHTML="Số điện thoại trùng !"
                }else if(response==2){
                    alert("Thêm tài khoản thành công !");
                    window.location.href = 'index.php?controller=account';
                }else if(response==3){
                    alert("Thêm tài khoản không thành công !");
                }else if(response==4){
                    var data=document.getElementById("khung_hinh")
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
function send_data_update(){
    var formData = new FormData(document.getElementById("update_account"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'View/Admin/Pages/TaiKhoan/EditTaiKhoan.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                // alert(response);
                if(response==1){
                    var data=document.getElementById("khung_hinh_update")
                    data.style.display="block"
                    document.getElementById('PhoneText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
                    document.getElementById('PhoneError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
                    document.getElementById('PhoneError_update').innerHTML="Số điện thoại trùng !"
                }else if(response==2){
                    alert("Cập nhật tài khoản thành công !");
                    window.location.href = 'index.php?controller=account';
                }else if(response==3){
                    alert("Cập nhật tài khoản không thành công !");
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
function remove(){
    var formData = new FormData(document.getElementById("remove_account"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'View/Admin/Pages/TaiKhoan/DeleteTaiKhoan.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if(response==2){
                    alert("Xóa tài khoản thành công !");
                    window.location.href = 'index.php?controller=account';
                }else if(response==3){
                    alert("Xóa tài khoản không thành công !");
                }else if(response==4){
                    var data=document.getElementById("khung_hinh_remove")
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
function checkPhone(){
    if(!document.getElementById('PhoneText').value==""){
        var re = /^0(\d{9}|9\d{8})$/;
        var x=document.getElementById('PhoneText').value
        if(!re.test(x)){
            document.getElementById('PhoneText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('PhoneError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PhoneError').innerHTML="Số điện thoại không hợp lệ !"
            return false;
        }else{
            document.getElementById('PhoneText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('PhoneError').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PhoneError').innerHTML="Số điện thoại hợp lệ !"
        }
    }else{
        document.getElementById('PhoneText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PhoneError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PhoneError').innerHTML="Số điện thoại không được để trống !"
        return false;
    }
    return true;
}
function checkMail(){
    if(!document.getElementById('MailText').value==""){
        var x=String(document.getElementById('MailText').value)
        if(x.indexOf("@gmail.com")==-1){
            document.getElementById('MailText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('MailError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('MailError').innerHTML="Email phải có đuôi @gmail.com !"
            return false;
        }else{
            document.getElementById('MailText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('MailError').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('MailError').innerHTML="Email hợp lệ !"
        }
    }else{
        document.getElementById('MailText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('MailError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('MailError').innerHTML="Email không được để trống !"
        return false;
    }
    return true
}
function checkName(){
    if(!document.getElementById('NameText').value==""){
        var x=String(parseInt(document.getElementById('NameText').value))
        if(!isNaN(x)){
            document.getElementById('NameText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('NameError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('NameError').innerHTML="Họ và tên không hợp lệ!"
            return false;
        }else{
            document.getElementById('NameText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('NameError').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('NameError').innerHTML="Họ và tên hợp lệ !"
        }
    }else{
        document.getElementById('NameText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('NameError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('NameError').innerHTML="Họ và tên không được để trống !"
        return false;
    }
    return true
}
function checkCBB(){
    if(document.getElementById('cboChucVu').value==''){
        document.getElementById('cboChucVu').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('CBError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('CBError').innerHTML="Vui lòng chọn chức vụ !"
        return false;
    }
    return true
}
function checkPass(){
    if(document.getElementById('PassText').value==''){
        document.getElementById('PassText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PassError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PassError').innerHTML="Vui lòng nhập mật khẩu !"
        return false;
    }else{
        document.getElementById('PassText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
        document.getElementById('PassError').innerHTML=""
    }
    return true
}
function checkPassAgain(){
    var pass=document.getElementById('PassText').value
    var pass_again=document.getElementById('PassAgainText').value
    if(pass==''){
        checkPass();
        return false
    }
    if(!pass_again==''){
        if(pass!=pass_again){
            document.getElementById('PassAgainText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('PassAgainError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PassAgainError').innerHTML="Mật khẩu nhập lại không đúng, vui lòng nhập lại !"
            return false;
        }else{
            document.getElementById('PassAgainText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('PassAgainError').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PassAgainError').innerHTML="Mật khẩu nhập lại khớp !"
        }
    }else{
        document.getElementById('PassAgainText').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PassAgainError').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PassAgainError').innerHTML="Vui lòng nhập lại mật khẩu !"
        return false;
    }
    return true;
}
function checkPhone_update(){
    if(!document.getElementById('PhoneText_update').value==""){
        var re = /^0(\d{9}|9\d{8})$/;
        var x=document.getElementById('PhoneText_update').value
        if(!re.test(x)){
            document.getElementById('PhoneText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('PhoneError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PhoneError_update').innerHTML="Số điện thoại không hợp lệ !"
            return false;
        }else{
            document.getElementById('PhoneText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('PhoneError_update').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PhoneError_update').innerHTML="Số điện thoại hợp lệ !"
        }
    }else{
        document.getElementById('PhoneText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PhoneError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PhoneError_update').innerHTML="Số điện thoại không được để trống !"
        return false;
    }
    return true;
}
function checkMail_update(){
    if(!document.getElementById('MailText_update').value==""){
        var x=String(document.getElementById('MailText_update').value)
        if(x.indexOf("@gmail.com")==-1){
            document.getElementById('MailText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('MailError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('MailError_update').innerHTML="Email phải có đuôi @gmail.com !"
            return false;
        }else{
            document.getElementById('MailText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('MailError_update').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('MailError_update').innerHTML="Email hợp lệ !"
        }
    }else{
        document.getElementById('MailText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('MailError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('MailError_update').innerHTML="Email không được để trống !"
        return false;
    }
    return true
}
function checkName_update(){
    if(!document.getElementById('NameText_update').value==""){
        var x=String(parseInt(document.getElementById('NameText').value))
        if(!isNaN(x)){
            document.getElementById('NameText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('NameError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('NameError_update').innerHTML="Họ và tên không hợp lệ!"
            return false;
        }else{
            document.getElementById('NameText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('NameError_update').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('NameError_update').innerHTML="Họ và tên hợp lệ !"
        }
    }else{
        document.getElementById('NameText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('NameError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('NameError_update').innerHTML="Họ và tên không được để trống !"
        return false;
    }
    return true
}
function checkCBB_update(){
    if(document.getElementById('cboChucVu_update').value==''){
        document.getElementById('cboChucVu_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('CBError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('CBError_update').innerHTML="Vui lòng chọn chức vụ !"
        return false;
    }
    return true
}
function checkPass(){
    if(document.getElementById('PassText_update').value==''){
        document.getElementById('PassText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PassError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PassError_update').innerHTML="Vui lòng nhập mật khẩu !"
        return false;
    }else{
        document.getElementById('PassText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
        document.getElementById('PassError_update').innerHTML=""
    }
    return true
}
function checkPassAgain_update(){
    var pass=document.getElementById('PassText_update').value
    var pass_again=document.getElementById('PassAgainText_update').value
    if(pass==''){
        checkPass();
        return false
    }
    if(!pass_again==''){
        if(pass!=pass_again){
            document.getElementById('PassAgainText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
            document.getElementById('PassAgainError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PassAgainError_update').innerHTML="Mật khẩu nhập lại không đúng, vui lòng nhập lại !"
            return false;
        }else{
            document.getElementById('PassAgainText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:green")
            document.getElementById('PassAgainError_update').setAttribute("style","color:green; text-align:right; margin-top:5px; font-size:13px")
            document.getElementById('PassAgainError_update').innerHTML="Mật khẩu nhập lại khớp !"
        }
    }else{
        document.getElementById('PassAgainText_update').setAttribute("style","border:none; border-bottom: solid 1px; border-color:red")
        document.getElementById('PassAgainError_update').setAttribute("style","color:red; text-align:right; margin-top:5px; font-size:13px")
        document.getElementById('PassAgainError_update').innerHTML="Vui lòng nhập lại mật khẩu !"
        return false;
    }
    return true;
}
function open_add_account(){
    var data=document.getElementById("khung_hinh")
    data.style.display="block"
}
function close_add_account(){
    var data=document.getElementById("khung_hinh")
    data.style.display="none"
}
function open_update_account(){
    var data=document.getElementById("khung_hinh_update")
    data.style.display="block"
}
function close_update_account(){
    var data=document.getElementById("khung_hinh_update")
    data.style.display="none"
    window.location.href = 'index.php?controller=account';
}
function close_remove_account(){
    var data=document.getElementById("khung_hinh_update")
    data.style.display="none"
    window.location.href = 'index.php?controller=account';
}