<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="./Public/Admin/Pages/Home/home.css">
</head>
<body>
    <!-- Header -->
   
    <div class="admin">
       
        <div id="vertical_menu"  >  
            <ul>  
                <li>MENU</li>    
                <li><a href="#">Thống kê</a></li>
                <li><a href="#">Tài khoản</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="?controller=role">Phân Quyền</a></li>
                <li><a href="?controller=Book">Sản phẩm</a></li>
            </ul>
        </div>
        <div id="right_container">
           <div id="taskbar">
            ADMIN
            </div>
            <div id="main_container">
                        <?php
                
                if (isset($_GET['controller'])) {
                    $controller = $_GET['controller'];
                    
                } else {
                    $controller = '';
                }

                switch ($controller) {
                    case 'Book':
                        require("Controller/Admin/addBook.php");
                        require("Controller/Admin/listBook.php");
                        break;
                    
                    
                }
             ?>   
                
   
            </div>
        </div>
        
    </div>
 
   
</body>

</html>