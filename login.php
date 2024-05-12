<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.84.0">
<title>Login - Admin</title>


<!-- Boostrap v5 -->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- link jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    html, body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }
</style>
</head>
<body class="text-center">

    <main class="form-signin">
        <img class="mb-4" src="Image/iconBookStore.png" alt="" height="160">
        <h1 class="h3 mb-3 fw-normal">Please sign in to use admin page</h1>
        <form id="frmDangnhap">
            <input type="hidden" name="controller" value="account">
            <input type="hidden" name="action" value="login">
            <div class="form-floating">
                <input type="text" class="form-control mb-3" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control mb-3" id="floatingPassword" placeholder="Password" name="pwd">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-3 mb-3 text-muted">&copy; SGU 2024</p>
        </form>
    </main>

    <script>
        $(document).ready(function(){
            $("#frmDangnhap").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "index.php",
                    type: "post",
                    data: $("#frmDangnhap").serialize(),
                    success: function(response){
                        console.log(response);
                        let data = JSON.parse(response);
                        
                        if (data.status == "success") {
                            if (data.allowedToAccessAdminPage == 1) {
                                window.location.href = "admin.php";
                            } 
                            else {
                                alert("Bạn không có quyền truy cập trang admin!");
                            }
                        } 
                        else {
                            alert(data.message);
                        }
                        
                    }
                });
            });
        });
    </script>
</body>
</html>
