<?php
require("database.php");

function limitString($string, $limit) {
    if (strlen($string) > $limit) {
        $string = substr($string, 0, $limit) . '...';
    }
    return $string;
}

echo '<div class="container-xl bg-light pb-3" id="khuyenmai">';
$itemsPerPage = 6; // Number of items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $itemsPerPage; // Offset for SQL query

if (isset($_GET['keyword']) || isset($_GET['theloai']) || isset($_GET['price_range'])) {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $theloai = isset($_GET['theloai']) ? $_GET['theloai'] : '';
    $minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : null;
    $maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : null;

    $baseSql = "FROM sach
                INNER JOIN hinhanhsach ON sach.id = hinhanhsach.idSach
                INNER JOIN theloai ON sach.idTheLoai = theloai.id
                WHERE 1=1"; // Basic condition to allow adding further conditions with AND

    if (!empty($keyword)) {
        $baseSql .= " AND sach.ten LIKE '%$keyword%'";
    }

    if (!empty($theloai)) {
        $baseSql .= " AND theloai.tenTheLoai = '$theloai'";
    }

    if ($minPrice !== null && $maxPrice !== null) {
        if ($minPrice !== '') {
            $baseSql .= " AND sach.giagoc >= $minPrice";
        }
        if ($maxPrice !== '') {
            $baseSql .= " AND sach.giagoc <= $maxPrice";
        }
    }

    $sql = "SELECT sach.*, hinhanhsach.url $baseSql GROUP BY sach.id LIMIT $itemsPerPage OFFSET $offset";
    $result = mysqli_query($con, $sql);

    $totalResultsSql = "SELECT COUNT(DISTINCT sach.id) AS total $baseSql"; // Query to get total results
    $totalResults = mysqli_query($con, $totalResultsSql);
    $totalRows = mysqli_fetch_assoc($totalResults)['total'];
    $totalPages = ceil($totalRows / $itemsPerPage);

    echo '<div class="products-grid mb-3 w-100">';

    if (mysqli_num_rows($result) > 0) {
        $displayedProducts = array();
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['id'];
            $Discount_price = $row['giagoc'] - ($row['phanTramKhuyenMai'] * $row['giagoc'] / 100);
            $tenSach = limitString($row['ten'], 22);

            if (!in_array($productId, $displayedProducts)) {
                if ($i % 3 == 0) {
                    if ($i > 0) {
                        echo '</div>'; // Close previous row
                    }
                    echo '<div class="row mb-3">'; // Add margin-bottom to row
                }

                echo '<div class="col-md-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="img-wrapper">
                                <img src="' . $row['url'] . '" class="card-img-top" alt="">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">' . $tenSach . '</h5>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text">' . number_format($Discount_price, 0, '', '.') . ' đ</p>
                                    <p class="card-text text-decoration-line-through" style="color: red">' . number_format($row['giagoc'], 0, '', '.') . 'đ</p>    
                                </div>
                                <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                            </div>
                        </div>
                      </div>';

                $i++;
                $displayedProducts[] = $productId;
            }
        }
        if ($i % 3 != 0) {
            echo '</div>'; // close last row
        }

        echo '</div>'; // close products-grid

        // Pagination controls
        echo '<nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">';

        for ($i = 1; $i <= $totalPages; $i++) {
            $active = $i == $page ? 'active' : '';
            echo '<li class="page-item ' . $active . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
        }

        echo '  </ul>
              </nav>';
    } else {
        echo '<div class="product w-100 justify-content-center">
                <p>Không tìm thấy sách phù hợp.</p>
              </div>';
    }
}
echo '</div>';
?>
