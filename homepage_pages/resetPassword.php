<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Reset Password</title>

    
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

	<main>
        <img class="mb-4" src="../Image/iconBookStore.png" alt="" height="160">
		<form>
            <input type="password" class="form-control" name="password" placeholder="New password" required>
            <input type="password" class="form-control" name="repassword" placeholder="Re-enter new password" required>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
		</form>
        <p class="mt-3 mb-3 text-muted">&copy; SGU 2024</p>
	</main>

	<script>
		$(document).ready(function(){
			$("form").submit(function(e){
                e.preventDefault();
                var password = $("input[name='password']").val();
                var repassword = $("input[name='repassword']").val();
                if (password != repassword) {
                    alert("Password and re-enter password do not match");
                    return;
                }
                $.ajax({
                    url: "resetPassword.php",
                    type: "POST",
                    data: {
                        password: password,
                        repassword: repassword
                    },
                    success: function(data) {
                        if (data == "success") {
                            alert("Reset password successfully");
                            window.location.href = "login.html";
                        } else {
                            alert("Reset password failed");
                        }
                    }
                });
            });
		});
	</script>
</body>
</html>