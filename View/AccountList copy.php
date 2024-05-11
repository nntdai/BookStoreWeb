<?php
    include_once("Model/M_Role.php");
    $roleList = (new Model_Role())->getRoleList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- boostrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/84ceef1c7f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>

    <h2>Danh sach hoc sinh</h2>
    <!-- form add account -->
    <form method="post" id="addAccountForm">
        <input type="hidden" name="controller" value="account">
        <input type="hidden" name="action" value="add">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="role" placeholder="Role">
        <input type="text" name="status" placeholder="Status">
        <input type="submit" value="Add">
    </form>
    <br>
    <table id="account_table" class="table table-hover container ms-0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($accountList as $account): ?>
                <tr matk="<?= $account->id ?>">
                    <td><?= $account->id ?></td>
                    <td><?= $account->username ?></td>
                    <td><?= $account->email ?></td>
                    <td><?= $account->role ?></td>
                    <td><?= $account->status ?></td>
                    <td>
                        <button class="btn btn-success" matk="<?= $account->id ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger" matk="<?= $account->id ?>"><i class="fa-solid fa-trash"></i></button>  
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    

    <br>
    <p><a href="index.php">Home page</a></p>
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="updateAccountForm" class="w-100">
                <input type="hidden" name="controller" value="account">
                <input type="hidden" name="action" value="update">
                <label class="form-label fw-bold"> Id: </label>
                <input type="text" name="acid" class="form-control" readonly>
                <label class="form-label fw-bold"> Username: </label>
                <input type="text" name="username" class="form-control">
                <label class="form-label fw-bold"> Email: </label>
                <input type="text" name="email" class="form-control">
                <label class="form-label fw-bold"> Role: </label>
                <select class="form-select" name="role">
                    <?php foreach($roleList as $role): ?>
                        <option value="<?= $role->id ?>"><?= $role->name ?></option>
                    <?php endforeach; ?>
                </select>

                <label class="form-label fw-bold"> Status: </label>
                <input type="text" name="status" class="form-control">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" onsubmit="return confirm('Xac nhan sua');" value="Save changes" form="updateAccountForm">
      </div>
    </div>
  </div>
</div>

    
    <script>
        function setAccountModal(account_id) {
            //truy xuat ajax de lay thong tin chi tiet cua account
            $.ajax({
                type: "POST",
                url: "index.php",
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
    //dung jquery de submit form ajax
    $(document).ready(function(){
        $("#addAccountForm").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url = "index.php";
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
                        var newRow = "<tr matk="+ newAccount.id +">";
                        newRow += "<td>" + newAccount.id + "</td>";
                        newRow += "<td>" + newAccount.username + "</td>";
                        newRow += "<td>" + newAccount.email + "</td>";
                        newRow += "<td>" + newAccount.role + "</td>";
                        newRow += "<td>" + newAccount.status + "</td>";
                        newRow += `
                        <td>
                            <button class=\"btn btn-success\" matk=\"<?= $account->id ?>\"><i class=\"fa-solid fa-pen-to-square\"></i></button>
                            <button class=\"btn btn-danger\" matk=\"<?= $account->id ?>\"><i class=\"fa-solid fa-trash\"></i></button>  
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
            var url = "index.php";
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
                        var row = $("#account_table").find("tr[matk='" + account.id + "']");
                        row.find("td:eq(1)").html(account.username);
                        row.find("td:eq(2)").html(account.email);
                        row.find("td:eq(3)").html(account.role);
                        row.find("td:eq(4)").html(account.status);
                    }
                }
            });
        });

        $("#account_table").on("click", ".btn-danger", function(){
            var account_id = $(this).attr("matk");
            if(confirm("Xac nhan xoa")) {
                $.ajax({
                    type: "POST",
                    url: "index.php",
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
                            var row = $("#account_table").find("tr[matk='" + account_id + "']");
                            row.remove();
                        }
                    }
                });
            }
        });

        $("#account_table").on("click", ".btn-success", function(){
            var account_id = $(this).attr("matk");
            setAccountModal(account_id);
            $("#exampleModal").modal("show");
        });
    });
</script>
</body>

</html>
