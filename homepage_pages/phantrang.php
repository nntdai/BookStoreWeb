<?php
    //phan trang co nhieu loai
    //phan trang theo khuyen mai, theo loai san pham, vv
    //can mot bien luu loai san pham, mot bien luu so trang, mot bien luu so san pham tren mot trang
    
    require_once("../util/DatabaseConnection.php");
    
    
    $ITEM_PER_PAGE = 8;
    $MAX_PAGINATOR_PER_PAGE = 5; 

    $page = $_POST["page"];

    $sub_query = "";
    if(isset($_POST["theloai"])) {
        //sp co idTheloai = $_POST["theloai"]
        // $idTheLoai = $_POST["theloai"];
        // $sub_query = "SELECT * FROM sach WHERE idTheLoai = $idTheLoai";
    }
    if(isset($_POST["chude"])) {
        //sp co idTheloai trong bang theloai ma co idChude = $_POST["chude"]
        $idChuDe = $_POST["chude"];
        $sub_query .= "and cd.id='$idChuDe' ";
    }
    if(isset($_POST["ngonngu"])) {
        //sp co idNgonNgu = $_POST["ngonngu"]
        $idNgonNgu = $_POST["ngonngu"];
        $sub_query .= "and s.idNgonNgu='$idNgonNgu' ";
    }
    
    if(isset($_POST["khuyenmai"])) {
        //sp co phanTramKhuyenMai > 0
        $sub_query .= "and s.phanTramKhuyenMai > 0 ";
    }

    $sql = "SELECT sach.* 
    FROM `sach` , (
        SELECT s.id as idSach, cd.id
        FROM `sach` s , `theloai` tl , `chude` cd 
        WHERE s.idTheLoai = tl.id and tl.idChuDe = cd.id $sub_query
    ) temp
    WHERE sach.id = temp.idSach";

    // $sql = "SELECT * FROM `sach` s , `theloai` tl , `chude` cd WHERE s.idTheLoai = tl.id and tl.idChuDe = cd.id ".$sub_query.";";
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


