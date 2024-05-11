<?php
    require("C:/xampp/htdocs/bookstoreweb/util/DatabaseConnection.php");
    if (isset($_POST["discount_page"])) {
        $ITEM_PER_PAGE = 8;
        $MAX_PAGINATOR_BTN = 5; 

        $conn = DatabaseConnection::getConnection();
        
        $sql = "SELECT * FROM sanpham";
        $result = $conn->query($sql);
        $last_page = $result->num_rows / $ITEM_PER_PAGE + ($result->num_rows % $ITEM_PER_PAGE != 0);

        $page = (int)$_POST["discount_page"];
        $sql = "SELECT * FROM sanpham LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ITEM_PER_PAGE, ($page-1)*$ITEM_PER_PAGE);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        DatabaseConnection::closeConnection($conn);

        $start_page = $page > 2 ? $page-2 : 1;
        $end_page = (int)min($start_page + $MAX_PAGINATOR_BTN-1, $last_page);

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