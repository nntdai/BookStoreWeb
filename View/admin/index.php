<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    
    <!-- icon -->
    <script src="https://kit.fontawesome.com/84ceef1c7f.js" crossorigin="anonymous"></script>
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <link rel="stylesheet" href="dashboard_template/dashboard.css">
    <style>
        
    </style>

  </head>
<body>
	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">My Shop</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control w-100" type="text" placeholder="Search" aria-label="Search">
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
			<a class="nav-link px-3" href="#" id="btn-signout">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
				<li class="nav-item">
					<a id="navHome" class="nav-link" aria-current="page" href="admin.php" >
					<span data-feather="home"></span>
					Home
					</a>
				</li>
				<li class="nav-item">
					<a id="navAccount" class="nav-link" href="admin.php?controller=account">
					<span data-feather="file"></span>
					Accounts
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="shopping-cart"></span>
					Products
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="users"></span>
					Customers
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="bar-chart-2"></span>
					Reports
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="layers"></span>
					Integrations
					</a>
				</li>
				</ul>

				<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
				<span>Saved reports</span>
				<a class="link-secondary" href="#" aria-label="Add a new report">
					<span data-feather="plus-circle"></span>
				</a>
				</h6>
				<ul class="nav flex-column mb-2">
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Current month
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Last quarter
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Social engagement
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
					<span data-feather="file-text"></span>
					Year-end sale
					</a>
				</li>
				</ul>
			</div>
			</nav>
				
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<?php
					$controller->get();
				?>
			</main>
		</div>
	</div>
    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- do thi va icon -->
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
	<script> feather.replace({ 'aria-hidden': 'true' }) //su dung icon feather </script>
    <?php $controller->script(); ?>
	<script>
      $(document).ready(function(){
         //sau khi nhan sign out thi chan chuyen den xuly/xulydangxuat.php
          $("#btn-signout").click(function(){
            console.log("click");
              $.ajax({
                  url: "xuly/xulydangxuat.php",
                  type: "post",
                  success: function(response){
                      location.reload();
                  }
              });
          });
      });
    </script>
</body>
</html>