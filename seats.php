<html>
<head>
<?php
include('config/config.php');
$userName = null;
$noOfSeats = null;  
$errorMsg = null;
 $error = null;
if(isset($_GET['error'])){
 $error = trim($_GET['error']);
 $userName = trim($_GET['name']);
 $noOfSeats = trim($_GET['count']);
 $errorMsg = "Please select correct no of Seats";
}
else{
		if(isset($_POST['submit'])){
		$userName = $_POST['name'];
		$noOfSeats = $_POST['noseats'];
		$seatCountSql = "Select * from seats where isbooked = 0";
		$getcount = mysql_query($seatCountSql) or die('Not able to get seat count');
		$availableSeat = mysql_num_rows($getcount);
		if($noOfSeats>$availableSeat){
			header('Location:index.php?error=lessSeats&available='.$availableSeat.'');
		}
	}
	else{
		header('Location:index.php');
	}
}
?>
	<title>Tickets</title>
	<style>
		* {
			font-size: 11px;
			font-family: arial;
		}
	</style>
	
	
	
	<script>
	
		//To confirm the selection
		function confirmSeats() {			
			var selectedSeats = getSelectedSeat('Confirm Reservation');
			
			if (selectedSeats) {
				if (confirm('Do you want to confirm reserved seats ' + selectedSeats + '?')) {
					document.forms[0].action='confirmseats.php';
					document.forms[0].submit();
				} else {
					clearSelection();
				}
			}
		}


		function getSelectedSeat(actionSelected) {
			
			// get selected list
			var obj = document.forms[0].elements;
			var selectedSeats = '';
			for (var i = 0; i < obj.length; i++) {
				if (obj[i].checked && obj[i].name == 'seats[]') {
					selectedSeats += obj[i].value + ', ';
				}
			}
			
			// no selection error
			if (selectedSeats == '') {
				alert('Please select a seat before clicking ' + actionSelected);
				return false;
			} else {
				return selectedSeats;
			}
		}
		
		function clearSelection() {
			var obj = document.forms[0].elements;
			for (var i = 0; i < obj.length; i++) {
				if (obj[i].checked) {
					obj[i].checked = false;
				}
			}
		}

	</script>
</head>
<link rel="stylesheet" href="home.css" type="text/css" />
<body>
<table align="center">

<?php if ($error != null && $errorMsg  != null) : ?>
<tr><td width="100%" align="center" style="background-color:red;color:white;font-size:20px;"><?php echo $errorMsg; ?></td>
<?php endif;?>

<tr><td width="100%" align="center">
<form action="" method="post">

<input type="hidden" name="name" value="<?php echo $userName; ?>" />
<input type="hidden" name="noseats" value="<?php echo $noOfSeats; ?>" />
  
</td></tr>
<tr>
<td style="width:100%;height:30px;text-align:center;color:white;background-color:blue;font-size:20px;">Screen </td>
</tr>
<tr><td width="100%" align="center">
<?php

/* Create and execute query. */
$query = "SELECT * from seats ";
$result = mysql_query($query);
$prevRowId = null;
$seatColor = null;
$tableRow = false;

//To show the seats
echo "<table width='100%' border='0' cellpadding='3' cellspacing='3'>";
while (list($rowId, $columnId, $isbooked) = mysql_fetch_row($result))
{
	if ($prevRowId != $rowId) {
		if ($rowId != 'A') {
			echo "</tr></table></td>";
			echo "\n</tr>";
		}
		$prevRowId = $rowId;
		echo "\n<tr><td align='center'><table border='1' cellpadding='8' cellspacing='8'><tr>";
	} else {
		$tableRow = false;
	}
	if ($isbooked == 0) {
		$seatColor = "white";
	} else if ($isbooked == 1) {
		$seatColor = "red";
	}
	else{
	$seatColor = "red";
	}
	

	echo "\n<td bgcolor='$seatColor' align='center'>";
	echo "$rowId$columnId";
	if ($isbooked == 0 ) {
		echo "<input type='checkbox' name='seats[]' value='$rowId$columnId'></checkbox>";
	}
	echo "</td>";
		if (($rowId == 'A' && $columnId == 6) 
			|| ($rowId == 'B' && $columnId == 6) 
			|| ($rowId == 'C' && $columnId == 6) 
			|| ($rowId == 'D' && $columnId == 6) 
			|| ($rowId == 'E' && $columnId == 6) 
			|| ($rowId == 'F' && $columnId == 6) 
			|| ($rowId == 'G' && $columnId == 6) 
			|| ($rowId == 'H' && $columnId == 6) 
			|| ($rowId == 'I' && $columnId == 6) 
			|| ($rowId == 'J' && $columnId == 6)) {
			// This fragment is for adding a blank cell which represent the "center aisle"
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		}
}

echo "</tr></table></td>";
echo "</tr>";
echo "</table>";

/* Close connection to database server. */
mysql_close();
?>
</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td width="100%" align="center">
<table width='100%' border='0'>
	<tr><td align='center'>
		&nbsp;<input type='button' value='Confirm Reservation' onclick='confirmSeats()'  />
	</td></tr>
</table>
</td></tr>
<tr><td width="100%" align="center">
	<table border="1" cellspacing="8" cellpadding="8">
		<tr>
			<td bgcolor='white'>Available</td>
			<td bgcolor='red'>Reserved Seats</td>
			<td bgcolor='lightgreen'>Selected Seats</td>
		</tr>
	</table>
</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
</form>
</body>
</html>