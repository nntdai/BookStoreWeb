<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/homepage.css">
    <!-- Boostrap v5 -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./css/carousel.css">
</head>
<body>
    <!-- Header -->
    <?php  require("./homepage_pages/header.php"); ?>

    <!-- Body -->
    <?php require("./homepage_pages/body.php"); ?> 
    
    <!-- Footer -->
    <?php require("./homepage_pages/footer.php"); ?> 

    <?php 
        include("View/account/frmdangnhap.php");
        include("View/account/frmdangki.php");
        include("View/account/statusModal.php");
    ?>
</body>
    <script src="./js/homepage.js"></script>
    <script src="./js/authentication.js"></script>
    <script src="./js/carousel.js"></script>
    <script src="./js/phantrangSanPham.js"></script>
<script>
  // function filterBooksVie(chude) {
  //   // Tạo đối tượng XMLHttpRequest
  //   var xhr = new XMLHttpRequest();

  //   // Xử lý phản hồi từ máy chủ
  //   xhr.onreadystatechange = function(e) {
  //     // e.preventDefault();
  //     if (xhr.readyState === XMLHttpRequest.DONE) {
  //       if (xhr.status === 200) {
  //         // Cập nhật nội dung trang với danh sách sách đã được lọc
  //         document.getElementById("list_vie").innerHTML = xhr.responseText;
  //       } else {
  //         // Xử lý lỗi nếu có
  //         console.error(xhr.status);
  //       }
  //     }
  //   };
  //   // Gửi yêu cầu AJAX
  //   xhr.open("GET", "./homepage_pages/Loctheochude.php?chude=" + encodeURIComponent(chude), true);
  //   xhr.send();
  // }
  // function filterBooksEng(chude) {
  //   // Tạo đối tượng XMLHttpRequest
  //   var xhr = new XMLHttpRequest();

  //   // Xử lý phản hồi từ máy chủ
  //   xhr.onreadystatechange = function(e) {
  //     // e.preventDefault();
  //     if (xhr.readyState === XMLHttpRequest.DONE) {
  //       if (xhr.status === 200) {
  //         // Cập nhật nội dung trang với danh sách sách đã được lọc
  //         document.getElementById("list_eng").innerHTML = xhr.responseText;
  //       } else {
  //         // Xử lý lỗi nếu có
  //         console.error(xhr.status);
  //       }
  //     }
  //   };
  //   // Gửi yêu cầu AJAX
  //   xhr.open("GET", "./homepage_pages/Loctheochude.php?chude=" + encodeURIComponent(chude), true);
  //   xhr.send();
  // }
  
</script>
</html>