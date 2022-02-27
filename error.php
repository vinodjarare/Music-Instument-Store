<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?> 
<style>
.navigation {
  background-color: #222;
}
.product-info img{
  width: 150px;
  height: 100px;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>
<!-- main wrapper -->
<div class="main-wrapper">

	<section class="page-404 section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="index.html">
						<!-- <img src="images/logo.png" alt="site logo" /> -->
						<h2>INSTRUMENTALS</h2>
					</a>
					<h1>404</h1>
					<h2>Page Not Found</h2>
					<a href="index.php" class="btn btn-primary mt-4"><i class="ti-angle-double-left"></i> Go Home</a>
					<p class="copyright-text">© 2021 Instrumentals All Rights Reserved</p>
				</div>
			</div>
		</div>
	</section>

</div>
<?php include 'includes/footer.php'; ?>
</div>
</body>
<?php include 'includes/scripts.php'; ?>