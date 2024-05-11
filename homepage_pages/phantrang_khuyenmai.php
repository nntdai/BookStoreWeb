<?php

    require_once("../util/DatabaseConnection.php");
    if (isset($_POST["discount_page"])) {
        $ITEM_PER_PAGE = 8;
        $MAX_PAGINATOR_PER_PAGE = 5; 

        $page = (int)$_POST["discount_page"];
        
        $sql = "SELECT * FROM sanpham";
        $result = DatabaseConnection::getInstance()->query($sql);
        $last_page = $result->num_rows / $ITEM_PER_PAGE + ($result->num_rows % $ITEM_PER_PAGE != 0);

        $sql = "SELECT * FROM sanpham LIMIT $ITEM_PER_PAGE OFFSET ".($page-1)*$ITEM_PER_PAGE;
        $result = DatabaseConnection::getInstance()->query($sql);
        $start_page = $page > 2 ? $page-2 : 1;
        $end_page = (int)min($start_page + $MAX_PAGINATOR_PER_PAGE-1, $last_page);

        if ($result->num_rows > 0) {
            $products = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($products, $row);
            }
            $response = array();
            $response["products"] = (array)$products;
            $response["start_page"] = (int)$start_page;
            $response["end_page"] = (int)$end_page;
            $response["last_page"] = (int)$last_page;
            echo json_encode($response);
            
        }
        
    }
?>


