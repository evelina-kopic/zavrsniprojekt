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

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</head>

<body>

	<section class="">
		<?php
        include 'config.php';
        include 'header.php';
		
        $scooter = "SELECT * FROM booking_details";
        $scooter1 = $conn->query($scooter);
        ?>
        <div class="cal">
        <table class="invc">
            <tr>
            <td><h3>ID IZNAJMLJIVANJA</h3></td>
            <td><h3>OD DATUMA</h3></td>
            <td><h3>DATUM VRAĆANJA</h3></td>
            <td><h3>CIJENA PO DANU</h3></td>
            <td><h3>STATUS IZNAJMLJIVANJA</h3></td>
            <td><h3>LOKACIJA PREUZIMANJA</h3></td>
            <td><h3>LOKACIJA VRAĆANJA</h3></td>
            <td><h3>REG BROJ</h3></td>
            <td><h3>BROJ VOZACKE DOZVOLE</h3></td>
            </tr>
        
        <?php
        while($scooterw1=$scooter1->fetch_assoc())
        { 
            ?>

            <tr>
            <td><?php echo $scooterw1['BOOKING_ID'] ?></td>
            <td><?php echo $scooterw1['FROM_DT_TIME'] ?></td>
            <td><?php echo $scooterw1['RET_DT_TIME'] ?></td>
            <td><?php echo $scooterw1['AMOUNT'] ?></td>
            <td><?php echo $scooterw1['BOOKING_STATUS'] ?></td>
            <td><?php echo $scooterw1['PICKUP_LOC'] ?></td>
            <td><?php echo $scooterw1['DROP_LOC'] ?></td>
            <td><?php echo $scooterw1['REG_NUM'] ?></td>
            <td><?php echo $scooterw1['DL_NUM'] ?></td>
            </tr>
        
        <?php }
        ?>
		
	</section><!--  end search section  -->

	<?php
	// include 'footer.php';
	?><!--  end footer  -->

</body>
</html>