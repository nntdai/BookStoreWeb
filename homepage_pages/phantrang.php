<?php
    //phan trang co nhieu loai
    //phan trang theo khuyen mai, theo loai san pham, vv
    //can mot bien luu loai san pham, mot bien luu so trang, mot bien luu so san pham tren mot trang
    
    require_once("../util/DatabaseConnection.php");
    
    
    $ITEM_PER_PAGE = 8;
    $MAX_PAGINATOR_PER_PAGE = 5; 

    $page = $_POST["page"];

    $sub_query = "";
    if(isset($_POST["tenSach"]) && $_POST["tenSach"] != "") {
        $tenSach = $_POST["tenSach"];
        $sub_query .= "and s.ten like '%$tenSach%' ";
    }
    if (isset($_POST["price_range"]) && $_POST["price_range"] != "") {
        $range = $_POST["price_range"];
        $range = explode("-", $range);
        $min = (int)$range[0];
        $max = (int)$range[1];
        $sub_query .= "and s.giagoc >= $min and s.giagoc <= $max ";
    }
    if(isset($_POST["idDanhMuc"]) && $_POST["idDanhMuc"] != "") {
        //sp co idTheLoai trong bang theloai = $_POST["idDanhMuc"]
        $idDanhMuc = $_POST["idDanhMuc"];
        $sub_query .= "and cd.idDanhMuc='$idDanhMuc' ";
    }
    if(isset($_POST["idTheLoai"]) && $_POST["idTheLoai"] != "") {
        //sp co idTheloai = $_POST["theloai"]
        $idTheLoai = $_POST["idTheLoai"];
        $sub_query .= "and tl.id='$idTheLoai'";
    }
    if(isset($_POST["idChuDe"])) {
        //sp co idTheloai trong bang theloai ma co idChude = $_POST["idChuDe"]
        $idChuDe = $_POST["idChuDe"];
        $sub_query .= "and cd.id='$idChuDe' ";
    }
    if(isset($_POST["idNgonNgu"])) {
        //sp co idNgonNgu = $_POST["idNgonNgu"]
        $idNgonNgu = $_POST["idNgonNgu"];
        $sub_query .= "and s.idNgonNgu='$idNgonNgu' ";
    }
    
    if(isset($_POST["khuyenmai"])) {
        //sp co phanTramKhuyenMai > 0
        $sub_query .= "and s.phanTramKhuyenMai > 0 ";
    }

    $sql = "SELECT *
        FROM `sach` s , `theloai` tl , `chude` cd , `danhmuc` dm, `nhaxuatban` nxb, `hinhanhsach` hinh
        WHERE s.idTheLoai = tl.id and tl.idChuDe = cd.id and s.idNXB = nxb.id and s.id = hinh.idSach $sub_query
    ";

    $result = DatabaseConnection::getInstance()->query($sql);//dung de tinh last_page
    $last_page = $result->num_rows / $ITEM_PER_PAGE + ($result->num_rows % $ITEM_PER_PAGE != 0);

    $sql .= " LIMIT $ITEM_PER_PAGE OFFSET ".($page-1)*$ITEM_PER_PAGE;
    $result = DatabaseConnection::getInstance()->query($sql);
    $start_page = $page > 2 ? $page-2 : 1;//gia tri so dau cua paginator
    $end_page = (int)min($start_page + $MAX_PAGINATOR_PER_PAGE-1, $last_page);//gia tri so cuoi cua paginator

    $products = array();
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //bo cot
            array_push($products, $row);
        }
        
    }
    //lay anh cho moi product
    foreach($products as $key => $product) {
        $sql = "SELECT * FROM hinhanhsach WHERE idSach = ".$product["id"];
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $products[$key]["hinhAnh"] = $row["url"];
        }
    }


    $response = array();
    $response["products"] = (array)$products;
    $response["start_page"] = (int)$start_page;
    $response["end_page"] = (int)$end_page;
    $response["last_page"] = (int)$last_page;
    echo json_encode($response);

?>


