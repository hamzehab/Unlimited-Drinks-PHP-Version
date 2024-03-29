<?php
	if(!isset($_SESSION)) session_start();
	include('../bootstrap.php'); 
	include('../model/db_connect.php');
	include('../model/category_db.php');
?>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<img style="width: 3%;" src="../images/logo.png" alt="Company Logo">&nbsp; &nbsp;

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="../index.php">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php 
							$categories = get_categories();
							foreach ($categories as $category): ?>
								<li><a class="dropdown-item" href="../view_products.php?category_id=<?php
								echo $category['categoryID']; ?>">
								<?php echo $category['categoryName']; ?>                        
								</a></li>
						<?php endforeach; ?>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				</ul>
				<ul class="navbar-nav">
				<?php if (!isset($_SESSION['email'])){ ?>
					<li class="nav-item">
					<a href="../Login/Login.php" class="nav-link" style="font-size: 1.2rem;">Login</a>
					</li>
					<li class="nav-item">
					<a href="../Login/Register.php" class="nav-link" style="font-size: 1.2rem;">Register</a>
					</li>
					<?php } else { ?>
					<li class="nav-item mx-3">
					<a href="../Login/Logout.php" class="nav-link"><i style="font-size: 1.5rem;" class="bi bi-box-arrow-right"></i></a>
					</li>
				<?php } ?>

				<?php if (!isset($_SESSION['adminID'])){ ?>
					<li class="nav-item">
						<form action="../Cart/actions.php" method="POST">
							<input type="hidden" name="action" value="view_cart">               
							<button style="font-size: 1.5rem;" class="nav-link bi bi-cart btn btn-dark"></button>
						</form> 
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</header>