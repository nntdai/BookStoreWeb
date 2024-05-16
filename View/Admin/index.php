<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/AdminBookStore/Public/Admin/Pages/Home/TaiKhoan.css">
    <script src="/AdminBookStore/Public/Admin/Pages/Home/js/TaiKhoan/TaiKhoan.js"></script>
    <style>
        #container-addBook
{
    float: left;
    
    margin: 0px;
    padding :20px;
    width: 100%;
}
.title_addbook
{
    
    border-color:rgb(34,40,49) ;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    color: black;
    padding: 5px;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  
  /* Modal Content/Box */
  #modal_addbook {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 0px;
    border: 1px solid #888;
    width: 90%; /* Could be more or less, depending on screen size */
    border-color:whitesmoke ;
    border-radius: 10px;
  }
  #addBook-form
  {
    padding:20px;
  }
  #editBook-form
  {
    padding:20px;
  }
  
  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    padding-right: 20px;
    font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  input[type="file"] {
    display: block;
  }
  .imageThumb {
    width:100px;
    height:120px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
  }
  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }
  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }
  .remove:hover {
    background: white;
    color: black;
  }
        .admin{
    margin: 0 auto;
    width: 95%;
    height:max-content; 
    height:auto;
    border-style:ridge;
    border-color:whitesmoke ;
    border-radius: 50px;
    text-align: center;
    background-color: aliceblue;
    display:flex
    
}

#vertical_menu{
    width: 10%;
   
    margin: 0px;
    border-color:whitesmoke ;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    text-align: center;
    font-family:sans-serif;
    font-weight:500;
    
    background-color:rgb(33, 53, 85);
    color:white;
   
}
#vertical_menu ul{
    margin: 0;
    padding: 0; 
    font-size: larger;
}

#vertical_menu ul li:first-child
{
    font-size:x-large;
    height: 70px;
    display: flex;
    justify-content: center; /* Align horizontal */
    align-items: center;
    border-top-left-radius: 50px;
    background-color:rgb(34,40,49);

}
#vertical_menu ul li
{ 
    list-style-type: none;
    margin: 0px;
    padding: 0px;
    text-align: left;

   
}

#vertical_menu li a:focus
{
    border: 4px;
    border-radius: 50px;
    background-color: rgb(79, 112, 156);
   
}
#vertical_menu li a
{
   text-decoration: none;
   display: block;
   color:white;
   padding: 20px;
   margin:0px;
}
#right_container {
    width: 90%;
    display:block;
    
    height:auto;
    background-color:aliceblue;
    border-color:whitesmoke ;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;

}
#taskbar{
    height: 70px;
    width: 100%;
    border-top-right-radius: 50px;
    background-color:rgb(34,40,49);
    color:white;
}
#product{
    width: 100%;
    height: fit-content;
    border-color:black ;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;


}
table, th, td {
    border: 1px solid;
}
table {
    width: 100%;
    border-collapse: collapse;
}

    </style>
</head>
<body>
    <!-- Header -->
   
    <div class="admin">
       
        <div id="vertical_menu"  >  
            <ul>  
                <li>MENU</li>    
                <li><a href="#">Thống kê</a></li>
                <li><a href="?controller=account">Tài khoản</a></li>
                <li><a href="?controller=order">Đơn hàng</a></li>
                <li><a href="?controller=role">Phân Quyền</a></li>
                <li><a href="?controller=Book">Sản phẩm</a></li>
            </ul>
        </div>
        <div id="right_container">
           <div id="taskbar">
            ADMIN
            <div style="padding-right:30px;padding-top:10px;float:right">
           <button class="btn btn-danger">
            <ion-icon name="log-out-outline" size="large"></ion-icon>
            </button>
            </div>
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
                        require "C:/xampp/htdocs/AdminBookStore/Controller/Admin/addBook.php";
                        require "C:/xampp/htdocs/AdminBookStore/Controller/Admin/listBook.php";
                        break;
                    case 'role':
                        require ('C:/xampp/htdocs/AdminBookStore/Controller/Admin/listChucVu.php');
                        break;
                    case 'account':
                        require('C:/xampp/htdocs/AdminBookStore/View/Admin/Pages/TaiKhoan/TaiKhoan.php');
                        break;
                    case 'order' :
                        require('C:/xampp/htdocs/AdminBookStore/View/Admin/Pages/DonHang/DonHang.php');
                        break;
                    
                }
             ?>   
                
   
            </div>
        </div>
        
    </div>
                
    <script>
        alert("<?php var_dump($_SESSION['user']); ?>");
    </script>
   
</body>

</html>