<?php
    require("C:/xampp/htdocs/bookstoreweb/taikhoan/DatabaseConnection.php");
    if (isset($_POST["sp_page"])) {
        $page = (int)$_POST["sp_page"];
        $ITEM_PER_PAGE = 8;
        $MAX_PAGINATOR_PER_PAGE = 5; 
        //get max page
        $sql = "SELECT * FROM sanpham";
        $result = DatabaseConnection::getInstance()->query($sql);
        $max_page = $result->num_rows / $ITEM_PER_PAGE + ($result->num_rows % $ITEM_PER_PAGE != 0);
        //lay data cua trang duoc yeu cau
        $sql = "SELECT * FROM sanpham LIMIT $ITEM_PER_PAGE OFFSET ".($page-1)*$ITEM_PER_PAGE;
        $result = DatabaseConnection::getInstance()->query($sql);

        if ($result->num_rows > 0) {

            $start_page = $page > 2 ? $page-2 : 1;
            $end_page = $start_page + $MAX_PAGINATOR_PER_PAGE;
            $next_disabled = $page == $end_page-1 ? "disabled" : "";
            $prev_disabled = $page == 1 ? "disabled" : "";

            echo "
            <nav aria-label=\"Page navigation\" class=\"w-100 d-flex justify-content-center mb-3\">
                <ul class=\"pagination\">
                    <li class=\"page-item {$prev_disabled}\">
                        <a class=\"page-link\" aria-label=\"Previous\">
                            <span aria-hidden=\"true\">&laquo;</span>
                        </a>
                    </li>
            ";
            for($i= $start_page; $i < $end_page && $i <= $max_page; $i++) {
                if ($i == $page) echo "
                    <li class=\"page-item page-index active\"><a class=\"page-link\">$i</a></li>
                ";
                else echo "
                    <li class=\"page-item page-index\"><a class=\"page-link\">$i</a></li>
                ";
            }
            echo "
                    <li class=\"page-item next-btn\">
                        <a class=\"page-link {$next_disabled}\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <div class=\"col col-sm-6 col-md-4 col-lg-3\">
                    <div class=\"card\">
                        <div class=\"img-wrapper\">
                            <img src=\"./Image/image_180222.jpg\" alt=\"\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\" style='overflow: hidden;'>{$row["tensp"]}</h5>
                            <p class=\"card-text\">
                                <span class=\"fw-bold\">{$row["dongia"]}</span><br>
                                <span>{$row["soluong"]}</span>
                            </p>
                            <a href=\"#\" class=\"btn btn-primary\">Go somewhere</a>
                        </div>
                    </div>
                </div>
                ";
            }
            
            
        } else {
            echo "0 results";
        }
    }
?>


