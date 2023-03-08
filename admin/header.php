<?php
session_start();
?>

<style>
	.logo {
		font-size: 40px;
		display: grid;
		place-items: center;
		grid-template-columns: 37px auto;
		gap: 12px;
	}

	#logoimg {
		filter: drop-shadow(0px 0px 12.5px #49c5b6);
		margin-top: 5px;
	}

	.dropdown {
		float: left;
		overflow: hidden;
	}

	.dropdown .dropbtn {
		font-size: 20px;
		border: none;
		outline: none;
		color: white;
		transition: 0.3s;
		background-color: transparent;
		font-family: 'Quicksand';
		margin: 0;
		padding: 0;
	}

	.dropbtn:hover {
		color: #49c5b6;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
	}

	.dropdown-content a {
		/* font-size: 20px;
			font-family: 'Quicksand'; */
		float: none;
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}

	.dropdown-content a:hover {
		background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}

	nav ul li a {
		transition: 0.3s;
	}

	nav ul li a:hover {
		color: #49c5b6;
		/* filter: drop-shadow(0px 0px 15px #49c5b6); */
	}
</style>

<header>
	<div class="wrapper">
		<a href="main.php">
			<h1 class="logo">E-Scoot</h1>
		</a>
		<a href="#" class="hamburger"></a>
		<!-- <?php echo $_SESSION['email'] . $_SESSION['pass'] ?> -->
		<nav>
			<?php

			// if(!($_SESSION['email']) && (!($_SESSION['pass']))){
			if (isset($_SESSION['email']) || isset($_SESSION['pass'])) {
			?>
				<ul>
					<li><a href="main.php">Početna</a></li>
					<li><a href="editscooters.php">Skuteri</a></li>
					<li><a href="scootercat.php">Kategorije</a></li>
					<li><a href="editloc.php">Lokacije</a></li>
					<li><a href="showbill.php">Računi</a></li>
					<li><a href="showbook.php">Iznajmljivanja</a></li>
					<li><a href="contact.php">Poruke</a></li>
					<li><a href="logout.php">Odjava</a></li>
				</ul>

			<?php
			}
			?>
		</nav>
	</div>
</header>