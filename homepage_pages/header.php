
<?php
    require("./homepage_pages/database.php");
?>
<?php
    echo '
    <header>
    <div class="left_header">
        <div class="logo">
            <a href="index.php"><img src="./Image/iconBookStore.png" alt=""></a>
        </div>
        <div class="menu_dropdown">
            <img src="./Image/books.png" alt="" id="books">
            <img src="./Image/angle-small-down.png" alt="" id="angle_down">
            <div class="dropdown_content" id="dropdown_content">
                <div class="categories">
                    <ul class="list_categories">';
?>
<!-- Lấy data và đổ lên phần danh mục -->
<?php
     $Danhmuc_query = "SELECT danhmuc.id, danhmuc.tenDanhMuc FROM danhmuc;";
     $Danhmuc_result = mysqli_query($con, $Danhmuc_query);
 
     if (mysqli_num_rows($Danhmuc_result) > 0) {
        while ($row_danhmuc = mysqli_fetch_assoc($Danhmuc_result)) {
            echo'
                        <li class="category"><a href="#">' . $row_danhmuc['tenDanhMuc'] . '</a><img src="./Image/angle-right.png" alt=""></li>
            ';
        }
     }
     echo '
                    </ul>
                </div>
     ';
?>
<!-- Lấy data và đổ lên phần chủ đề và thể loại theo danh mục -->
<?php
    $Danhmuc_query = "SELECT danhmuc.id, danhmuc.tenDanhMuc FROM danhmuc;";
    $Danhmuc_result = mysqli_query($con, $Danhmuc_query);

    if (mysqli_num_rows($Danhmuc_result) > 0) {
        while ($row_danhmuc = mysqli_fetch_assoc($Danhmuc_result)) {
            $Chude_query = "SELECT chude.id, chude.tenChuDe, chude.idDanhMuc FROM `chude` WHERE chude.idDanhMuc = " . $row_danhmuc['id'];
            $Chude_result = mysqli_query($con, $Chude_query);

            // Tạo một mảng để lưu trữ thông tin về các cột chủ đề và thể loại
            $columns = array();

            if (mysqli_num_rows($Chude_result) > 0) {
                while ($row_chude = mysqli_fetch_assoc($Chude_result)) {
                    $theloais = array();

                    $Theloai_query = "SELECT theloai.tenTheLoai 
                                    FROM theloai 
                                    WHERE theloai.idChuDe = " . $row_chude['id'];
                    $Theloai_result = mysqli_query($con, $Theloai_query);

                    if (mysqli_num_rows($Theloai_result) > 0) {
                        while ($row_theloai = mysqli_fetch_assoc($Theloai_result)) {
                            $theloais[] = $row_theloai['tenTheLoai'];
                        }
                    }

                    $columns[] = array(
                        'tenChuDe' => $row_chude['tenChuDe'],
                        'theloais' => $theloais
                    );
                }
            }
            echo'             
                    <div class="content">
                        <table>';
            // Hiển thị các cột chủ đề
            echo '          <tr>';
            foreach ($columns as $column) {
                echo '<th>' . $column['tenChuDe'] . '</th>';
            }
            echo '          </tr>';

            // Hiển thị các thể loại theo từng cột chủ đề
            for ($i = 0; $i < count($columns[0]['theloais']); $i++) {
                echo '      <tr>';
                foreach ($columns as $column) {
                    if (isset($column['theloais'][$i])) {
                        echo '<td><a href="#" data-theloai="' . $column['theloais'][$i] . '">' . $column['theloais'][$i] . '</a></td>';
                    } else {
                        echo '<td></td>';
                    }
                }
                echo '      </tr>';
            }
            echo '
                        </table>
                    </div>';
        }
    }
?>
<?php
    echo'
            </div>
        </div>
    </div>';
?>  

    <div class="dropdowmn col-6 d-flex justify-content-end">
        <button id="btn_search" data-bs-toggle="dropdown" style="border: 0;">
            <img src="./Image/search.png" alt="" style="width: 40px;">
        </button>
        <div class="dropdown-menu">
           <form id="searchForm" class="row align-items-start w-100">
                <div class="col-md-12 mb-1 " > <!-- Thêm lớp mb-3 để tạo khoảng cách dưới -->
                    <input type="text" placeholder="Tìm kiếm" style="padding: 10px" class="position-relative form-control" name="tenSach">
                </div>
                <div class="col-md-6"> 
                    <select name="theloai" class="form-select">
                        <option value="" selected>Chọn thể loại</option>
                        <?php
                        $sql = "SELECT * FROM theloai"; // Thay thế "theloai" bằng tên bảng chứa các thể loại trong cơ sở dữ liệu của bạn
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $theloai = $row['tenTheLoai'];
                                echo '<option value="' . $row["id"] . '">' . $theloai . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6"> <!-- Thêm lớp mb-3 để tạo khoảng cách dưới -->
                    <select name="price_range" class="form-select">
                        <option value="">Chọn khoảng giá</option>
                        <option value="0-100000">Dưới 100,000đ</option>
                        <option value="100000-500000">100,000đ - 500,000đ</option>
                    </select>
                </div>
                
                <div class="mb-2"></div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div id="searchResults"></div>

    
    <div id="pagination"></div>
    <div class="right_header">
        <div class="cart">
            <img src="./Image/shopping-cart.png" alt="">
            <div class="quantity"><span>0</span></div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./Image/user.png" style="margin-left: 0px;">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <?php 
                if (isset($_SESSION["user"])) { ?>
                    <div>Hello, <?php echo $_SESSION["user"]->hoTen; ?></div>
                    <li><button type='button' class='mb-1 dropdown-item' id='btn_DangXuat'>
                        Đăng xuất 
                    </button></li>
                <?php } 
                else { ?>
                    <li><button type='button' class='mb-1 dropdown-item' data-bs-toggle='modal' data-bs-target='#frmDangnhapModal' id='frmDangnhap-btn'>
                        Đăng nhập 
                    </button></li>
                    <li><button type='button' class='mb-1 dropdown-item' data-bs-toggle='modal' data-bs-target='#frmDangkiModal' id='frmDangki-btn'>
                        Đăng kí 
                    </button></li>
                <?php } ?>
            </ul>
            </div>
        </div>
</header>
