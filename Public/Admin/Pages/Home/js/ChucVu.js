function check_data(){
    if(!document.getElementById('NameText').value==""){
        var x=String(parseInt(document.getElementById('NameText').value))
        if(x!="NaN"){
            document.getElementById('NameText').setAttribute("style","border: solid 1px; border-color:red; border-radius:5px")
            document.getElementById('Error').setAttribute("style","color:red; text-align:left; margin-left:110px")
            document.getElementById('Error').innerHTML="Tên chức vụ không có số !"
            document.getElementById('NameText').focus();
            return false;
        }
    }else{
        document.getElementById('NameText').setAttribute("style","border: solid 1px; border-color:red; border-radius:5px")
        document.getElementById('Error').setAttribute("style","color:red; text-align:left; margin-left:110px")
        document.getElementById('Error').innerHTML="Tên chức vụ không được để trống !"
        document.getElementById('NameText').focus();
        return false;
    }
    return true;
}