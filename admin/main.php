<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Scoot</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="ev/admin/css/responsive.css">
	<!-- C:\xampp\htdocs\ev\admin\css\responsive.css -->

	<style>
		
		.logo {
			font-size: 40px;
			display: grid;
			place-items: center;
			grid-template-columns: 37px auto;
			gap: 5px;
		}

		#logoimg {
			filter: drop-shadow(0px 0px 12.5px #49c5b6);
			margin-top: 5px;
		}

		header {
			width: 100%;
			height: 100px;
			/* background: rgba(71, 71, 71, 0.502); */
			background: linear-gradient(180deg, rgba(132, 132, 132, 0.502) -50%, rgba(255, 255, 255, 0) 100%);
			backdrop-filter: blur(5px);
			position: fixed;
			top: 0;
			z-index: 10;
		}

		.listing {
			margin-top: 30px;
		}

		ul {
			display: flex;
			flex-direction: column;

		}

		.anchors {
			border-radius: 10px;
			width: 300px;
			height: 35px;
			background: rgba(186, 186, 186, 0.502);
			margin: 20px auto;
			display: grid;
			place-items: center;
		}

		a {
			font-family: 'Quicksand';
			color: #ededed;
			font-size: 22px;
			text-decoration: none;
			font-weight: bold;
		}

		a {
			transition: 0.3s;
		}

		a:hover {
			color: #49c5b6;
			text-shadow: 0px 0px 15px rgba(73, 197, 182, 1);
			/* filter: drop-shadow(0px 0px 15px #49c5b6); */
		}
	</style>
</head>

<body>


	<section classs="cntform">
		<div class="wrapper" style="width: 400px">
		
			<h1 class="logo" style="color: #ededed;"><img id="logoimg"
					src="/ev/assets/favicon_io/android-chrome-512x512.png" alt="logo" width="37" height="37"> E-Scoot
			</h1>
			<br>
		</div>
		<?php
		include 'config.php';
		$gross = "SELECT SUM(GROSS_TOTAL) as GROSS_TOTAL,SUM(TOTAL_AMOUNT) as TOTAL_AMOUNT FROM billing_details";
		$grossconn = $conn->query($gross);
		$grosstot = $grossconn->fetch_assoc();
		?>
		<div class="wrapper listing">
			<!-- <?php echo $_SESSION['email'] . $_SESSION['pass'] ?> -->
			<nav>
				<?php

				//if (isset($_SESSION['email']) || isset($_SESSION['pass'])) {
				if(!($_SESSION['email']) && (!($_SESSION['pass']))){
					?>
					<ul>
						<div class="anchors"><a href="main.php">Početna</a></div>
						<div class="anchors"><a href="editscooters.php">Skuteri</a></div>
						<div class="anchors"><a href="scootercat.php">Katergorije</a></div>
						<div class="anchors"><a href="editloc.php">Lokacije</a></div>
						<div class="anchors"><a href="showbill.php">Računi</a></div>
						<div class="anchors"><a href="showbook.php">Iznajmljivanja</a></div>
						<div class="anchors"><a href="contact.php">Poruke</a></div>
						<div class="anchors"><a href="logout.php">Odjava</a></div>

					</ul>
				</nav>
			</div>
			<div class="wrapper listing">
				<nav>
					<ul>
						<div class="anchors">Ukupno bruto:
							<?php echo $grosstot['GROSS_TOTAL']; ?>
						</div>
						<div class="anchors">Ukupan iznos:
							<?php echo $grosstot['TOTAL_AMOUNT']; ?>
						</div>
					</ul>
				</nav>
			</div>

			<?php
				}
				// include 'header.php';
				include 'config.php';
				echo 'Zdravo';

				?>

		

	</section>

</body>

</html>