

//chua sua theo db moi




$("#navAccount").addClass("active");

function setAccountModal(account_id) {
    //truy xuat ajax de lay thong tin chi tiet cua account
    $.ajax({
        type: "POST",
        url: "admin.php",
        data: {
            controller: "account",
            action: "detail",
            acid: account_id
        },
        success: function(data) {
            var account = JSON.parse(data);
            var form = $("#updateAccountForm");
            form.find("input[name='acid']").val(account.id);
            form.find("input[name='username']").val(account.username);
            form.find("input[name='email']").val(account.email);
            form.find("select[name='role']").find("option[value='" + account.role + "']").attr("selected", "selected");
            form.find("input[name='status']").val(account.status);
            
            $("#exampleModal").modal("show");
            $(".modal-title").html("Account detail");
        }
    });
}

function deleteAccount(account_id) {
    var account_id = $(this).attr("soDienThoai");
    if(confirm("Xac nhan xoa")) {
        $.ajax({
            type: "POST",
            url: "admin.php",
            data: {
                controller: "account",
                action: "delete",
                acid: account_id
            },
            success: function(data) {
                data = JSON.parse(data);
                if (data.error) {
                    alert(data.error);
                } else {
                    var row = $("#account_table").find("tr[soDienThoai='" + account_id + "']");
                    row.remove();
                }
            }
        });
    }
}
//dung jquery de submit form ajax
$(document).ready(function(){
    $("#addAccountForm").submit(function(e){
        e.preventDefault();
        var form = $(this);
        var url = "admin.php";
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data){
                //cap nhat table
                data = JSON.parse(data);
                if (data.error) {
                    alert(data.error);
                } else {
                    var newAccount = data.newAccount;
                    var newRow = "<tr soDienThoai="+ newAccount.id +">";
                    newRow += "<td>" + newAccount.id + "</td>";
                    newRow += "<td>" + newAccount.username + "</td>";
                    newRow += "<td>" + newAccount.email + "</td>";
                    newRow += "<td>" + newAccount.role + "</td>";
                    newRow += "<td>" + newAccount.status + "</td>";
                    newRow += `
                    <td>
                        <button class=\"btn btn-success\" soDienThoai=\"<?= $account->id ?>\"><i class=\"fa-solid fa-pen-to-square\"></i></button>
                        <button class=\"btn btn-danger\" soDienThoai=\"<?= $account->id ?>\"><i class=\"fa-solid fa-trash\"></i></button>  
                    </td>
                    `;
                    newRow += "</tr>";
                    $("#account_table").append(newRow);
                }

            }
        });
    });

    $("#updateAccountForm").submit(function(e){
        e.preventDefault();
        $("#exampleModal").modal("hide");
        var form = $(this);
        var url = "admin.php";
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data){
                //cap nhat table
                data = JSON.parse(data);
                if (data.error) {
                    alert(data.error);
                } else {
                    
                    var account = data.account;
                    console.log(account);
                    var row = $("#account_table").find("tr[soDienThoai='" + account.id + "']");
                    row.find("td:eq(1)").html(account.username);
                    row.find("td:eq(2)").html(account.email);
                    row.find("td:eq(3)").html(account.role);
                    row.find("td:eq(4)").html(account.status);
                }
            }
        });
    });
    
});