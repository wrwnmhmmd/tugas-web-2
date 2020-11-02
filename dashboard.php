<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/style-dashboard.css">
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
			<h2>Menu</h2>
			<ul>
				<li><a href="dashboard.php">Home</a></li>
				<li><a href="dashboard.php?data=nasabah/home-nasabah.php">Nasabah</a></li>
				<li><a href="dashboard.php?data=teller/home-teller.php">Teller</a></li>
				<li><a href="dashboard.php?data=teller/home-cso.php">Customer Service</a></li>
				<li><a href="#">Transaksi</a></li>
				<ul>
					<li><a href="dashboard.php?data=transaksi_teller/home-transaksi-teller.php">Teller</a></li>
					<li><a href="dashboard.php?data=transaksi_cso/home-transaksi-cso.php">Customer Service</a></li>
				</ul>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="main"><?php include"konten.php"; ?></div>
</body>
</html>
