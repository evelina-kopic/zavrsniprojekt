<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Scoot | Račun</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<style>
		h2 {
			font-size: 30px;
		}

		h3 {
			font-size: 20px;
			margin: 17px;
		}
	</style>
</head>

<body>

	<section>
		<?php
		include 'header.php';
		include 'includes/config.php';

		

		$email = $_SESSION['email'];
		$sel = "SELECT * FROM customer_details WHERE DL_NUMBER IN (SELECT DL_NUM FROM booking_details WHERE REG_NUM = '$_GET[id]') AND EMAIL_ID = '$email'";
		$rs = $conn->query($sel);
		$rws = $rs->fetch_assoc();

		$sel1 = "SELECT * FROM scooter WHERE REGISTRATION_NUMBER = '$_GET[id]'";
		$rs1 = $conn->query($sel1);
		$rws1 = $rs1->fetch_assoc();

		$sel2 = "SELECT * FROM booking_details WHERE REG_NUM = '$_GET[id]' AND BOOKING_ID = (SELECT MAX(BOOKING_ID) FROM booking_details)";
		$rs2 = $conn->query($sel2);
		$rws2 = $rs2->fetch_assoc();

		// $selpick = "SELECT * FROM location_details WHERE LOCATION_ID IN (SELECT PICKUP_LOC FROM booking_details WHERE REG_NUM = '$_GET[id]')";
		// $seldrop = "SELECT * FROM location_details WHERE LOCATION_ID IN (SELECT DROP_LOC FROM booking_details WHERE REG_NUM = '$_GET[id]')";

		$pickid = $rws2['PICKUP_LOC'];
		$dropid = $rws2['DROP_LOC'];

		$selpick = "SELECT * FROM location_details WHERE LOCATION_ID = '$pickid'";
		$rspick = $conn->query($selpick);
		$rwspick = $rspick->fetch_assoc();
		$seldrop = "SELECT * FROM location_details WHERE LOCATION_ID = '$dropid'";
		// // $sel = "SELECT * FROM customer_details";
		// $sel1 = "SELECT * from booking_details";
		// $rs = $conn->query($sel);
		$rsdrop = $conn->query($seldrop);
		$rwsdrop = $rsdrop->fetch_assoc();

		$fromDate = $rws2['FROM_DT_TIME'];
		$toDate = $rws2['RET_DT_TIME'];
		$model = $rws1['MODEL_NAME'];
		$pickloc = $rwspick['LOCATION_NAME'];
		$droploc = $rwsdrop['LOCATION_NAME'];
		$cpd = $rws1['COST_PER_DAY'];
		$dlnum = $rws['DL_NUMBER'];



		// Convert the dates to timestamps
		$fromTimestamp = strtotime($fromDate);
		$toTimestamp = strtotime($toDate);

		// Calculate the difference in seconds between the two timestamps
		$difference = $toTimestamp - $fromTimestamp;

		// Convert the difference to days by dividing it by the number of seconds in a day (86400)
		$numDays = floor($difference / 86400) + 1;
		$billdate = date('Y-m-d');


		$total = $rws1['COST_PER_DAY'] * $numDays;
		$name = $rws['FNAME'] . ' ' . $rws['MNAME'] . ' ' . $rws['LNAME'];
		$bookid = $rws2['BOOKING_ID'];
		$ftotal = $total * 1.12;
		?>

		<section class="caption" style="margin-top: 100px;">
			<h1 style="text-align: center; font-size:xxx-large;"><span style="font-weight: 100;">Pronajdite najbolji  </span>Skuter za SEBE!</h1>
		</section>
		<section class="wrapper">


			<!-- <h1><?php echo $rws['FNAME'] . ' ' . $rws['MNAME'] . ' ' . $rws['LNAME'] ?></h1> -->
			<h2> <?php echo $name ?></h2>


			<h3><?php echo 'ID rezervacije: #' . $rws2['BOOKING_ID'] ?></h3>

			<h3><?php echo 'Datum izdavanja računa: ' . $billdate  ?></h3>

			<!-- 
			<h1><?php echo $rws1['MODEL_NAME'] ?></h1>
			<h1><?php echo 'Od: ' . $rws2['FROM_DT_TIME'] ?></h1>
			<h1><?php echo 'Do: ' . $rws2['RET_DT_TIME'] ?></h1>
			<h1><?php echo 'Od: ' . $rwspick['LOCATION_NAME'] ?></h1>
			<h1><?php echo 'Do: ' . $rwsdrop['LOCATION_NAME'] ?></h1>
			<h1><?php echo 'Broj dana: ' . $numDays ?></h1>
			<h1><?php echo 'Ukupno bruto: ' . $total ?></h1>
			<h1><?php echo 'Ukupni iznos: ' . $total * 1.17 ?></h1> -->

			<div class="cal">


				<table class="invc">
					<tr>
						<th>Model</th>
						<th>Od datuma</th>
						<th>Do datuma</th>
						<th>Ukupno dana</th>
						<th>Cijena po danu</th>
						<!-- <th>Gross Total</th> -->
					</tr>
					<tr>
						<td><?php echo $rws1['MODEL_NAME'] ?></td>
						<td><?php echo '' . $rws2['FROM_DT_TIME'] ?></td>
						<td><?php echo '' . $rws2['RET_DT_TIME'] ?></td>
						<td><?php echo '' . $numDays ?></td>
						<td><?php echo '' . $rws1['COST_PER_DAY'] ?></td>
						<!-- <td></td> -->
					</tr>
					<tr>
						<th colspan="4" style="text-align:center;">Lokacija preuzimanja:</th>
						<!-- <th>Gross Total</th> -->
						<td><?php echo '' . $pickloc ?></td>
					</tr>
					<tr>
						<th colspan="4" style="text-align:center;">Mjesto povratka:</th>
						<!-- <th></th> -->
						<td><?php echo '' . $droploc ?></td>
					</tr>
					<tr>
						<th colspan="5" style="text-align:center;"> DOSTAVNICA</th>
						<!-- <th></th> -->
						<!-- <th><?php echo '' . $total ?></th> -->
					</tr>
					<tr>
						<th colspan="4" style="text-align:center;">Ukupno bruto</th>
						<!-- <th>Gross Total</th> -->
						<th><?php echo '' . $total ?></th>
					</tr>
					<tr>
						<th colspan="4" style="text-align:center;">Ukupni iznos(PDV-17%)</th>
						<!-- <th></th> -->
						<th><?php echo '' . $total * 1.17 ?></th>
					</tr>
					<!-- <tr>
						<th colspan="4" style="text-align:center;"> Grand Total</th>
						<th>600</th>
					</tr> -->
				</table>
			</div>
			<form method="post" action="/ev/bill.php?id=<?php echo $rws1['REGISTRATION_NUMBER'] ?>">
				<input class="but" type="submit" value="Plati" name="pay" id="idpay" onclick="func()" style="width: 100px; color: #ededed; background: #49d645;">
			</form>


			<?php

if (isset($_POST['pay'])) {
    $bill = "INSERT INTO billing_details (DL_NUM, `NAME`, BOOKING_ID, BILL_DATE, MODEL_NAME, FROM_DATE, TO_DATE, NO_OF_DAYS, CPD, PICK_LOC, DROP_LOC, GROSS_TOTAL, TOTAL_AMOUNT) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($bill);
    
    if (!$stmt) {
        echo "Error: " . $conn->error;
    }
    
    $stmt->bind_param("sssssssssssss", $dlnum, $name, $bookid, $billdate, $model, $fromDate, $toDate, $numDays, $cpd, $pickloc, $droploc, $total, $ftotal);
    
    if ($stmt->execute()) {
        echo '<div class="flash-message">Plaćanje uspješno</div>';
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
		</section>
	</section> <!--  end listing section  -->



	<?php
	include 'footer.php';
	?>

	<h1><?php echo '' . $dlnum ?></h1>
</body> 

<script>
	window.onbeforeunload = function() {
		// Make an AJAX call to a server-side script that runs the SQL trigger
		$.ajax({
			type: "POST",
			url: "runtrigger.php",
			data: {
				// any data you need to pass to the server-side script
			}
		});
	};
</script>

</html>