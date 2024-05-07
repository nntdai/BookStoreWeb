<link rel="stylesheet" href="./Public/Admin/Pages/Home/addBook.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div id="container-addBook">
    <h1> Thêm sách </h1>
    <div id="addBook-form">
            <form method="post">
                <div class="card-body">
                    <?php  
                        if (isset($alert['success'])) {?>
                            <div class="form-group alert alert-primary">
                                <?=$alert['success']?>
                            </div>
                        <?php }
                    ?>
                    <div class="form-addBook">
                    <label>Mã sách</label>
                        <input type="text" name="name" class="form-control" placeholder="Mã sách">
                        <br>
                        <label>Tên chuyên mục</label>
                        <input type="text" name="name" class="form-control" placeholder="Tên Sách">
                        <br>
                        <label>Tác giả</label>
                        <input type="text" name="tacGia" list="listTacGia" class="form-control">
                                <datalist id="listTacGia">
                                    <?php
                                    $tacgiasach =$tacGiaModel->ListTacGia();
                                    foreach ($tacgiasach as $tacgia)
                                    {
                                        
                                      echo '<option value="'.$tacgia['hoTen'].'"></option>';
		                              }
                                    ?>
                                </datalist>
                        <br>
                        <label>Thể loại</label>
                        <input type="text" name="theloai" list="listTheLoai" class="form-control">
                                <datalist id="listTheLoai">
                                    <?php
                                    $theloaisach =$theloaiModel->ListTheLoai();
                                    foreach ($theloaisach as $theloai)
                                    {
                                        
                                      echo '<option value="'.$theloai['tenTheLoai'].'"></option>';
		                              }
                                    ?>
                                </datalist>
                        <br>
                        <label>Nhà Xuất Bản</label>
                        <input type="text" name="NXB" list="listNhaXuatBan" class="form-control" >
                        <datalist id="listNhaXuatBan">
                                    <?php
                                    $nxbsach =$nxbModel->ListNXB();
                                    foreach ($nxbsach as $nxb)
                                    {
                                        
                                      echo '<option value="'.$nxb['tenNXB'].'"></option>';
		                              }
                                    ?>
                                </datalist> 
                        <br>
                        <label>Ngôn Ngữ</label>
                        <input type="text" name="NXB" list="listNhaXuatBan" class="form-control" >
                        <datalist id="listNhaXuatBan">
                                    <?php
                                    $nxbsach =$nxbModel->ListNXB();
                                    foreach ($nxbsach as $nxb)
                                    {
                                        
                                      echo '<option value="'.$nxb['tenNXB'].'"></option>';
		                              }
                                    ?>
                                </datalist> 
                        <br>
                        <label>Hình thức</label>
                        <input type="text" name="NXB" list="listNhaXuatBan" class="form-control" >
                        <datalist id="listNhaXuatBan">
                                    <?php
                                    $nxbsach =$nxbModel->ListNXB();
                                    foreach ($nxbsach as $nxb)
                                    {
                                        
                                      echo '<option value="'.$nxb['tenNXB'].'"></option>';
		                              }
                                    ?>
                                </datalist> 
                        <br>
                        
                    </div>
                    <button type="submit" name="addBook" class="btn btn-primary">Thêm Sách</button>
                    <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                </div>
            </form>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>