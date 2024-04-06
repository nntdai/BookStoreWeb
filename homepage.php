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
</head>
<body>
    <!-- Header -->
    <?php   require("./homepage_pages/header.php"); ?>

    <!-- Body -->
    <?php require("./homepage_pages/body.php"); ?> 
    
    <!-- Footer -->
    <?php require("./homepage_pages/footer.php"); ?> 

    <?php 
        include("./taikhoan/frmdangnhap.php");
        include("./taikhoan/frmdangki.php");
        include("./taikhoan/statusModal.php"); 
    ?>
</body>
<script src="./js/homepage.js"></script>
</html>