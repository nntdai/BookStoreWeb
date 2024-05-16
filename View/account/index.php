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
            <tr soDienThoai="<?= $account->soDienThoai ?>">
                <td><?= $account->soDienThoai ?></td>
                <td><?= $account->email ?></td>
                <td><?= $account->idChucVu  ?></td>
                <td><?= $account->status  ?></td>
                <td>
                    <button class="btn btn-success" onclick="setAccountModal(<?= $account->soDienThoai  ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger" onclick="deleteAccount(<?= $account->soDienThoai  ?>)"><i class="fa-solid fa-trash"></i></button>  
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
                        <option value="1">Admin</option>
                        <option value="2">User</option>
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