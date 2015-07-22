<?php
include('config/config.php');
?>
<html>
<head>
	<title>Tickets</title>
	<style>
		* {
			font-size: 14px;
			font-family: arial;
		}
	</style>
</head>
<body>

<center>
<br/>
<br/>
<br/>
<?php

	$name = null;
	$noOfSeats = null;
	if (isset($_POST['seats']))
	{
	
		$name = $_POST['name'];
		$noOfSeats = $_POST['noseats'];
		$countTkt = 0;
		$ptkts = null;
		foreach($_POST['seats'] AS $seat) {
			$countTkt++;
			$ptkts .= $seat.",";
		}
		if($noOfSeats<$countTkt || $noOfSeats>$countTkt){
		header('Location:seats.php?error=selectionError&count='.$noOfSeats.'&name='.$name.'');
		}
		else{
		$ptkts = rtrim($ptkts,',');
		$insertUser = "insert into users (userName,ptickets) values('$name','$ptkts')";
		$isInserted = mysql_query($insertUser) or die('User Not Inserted');
		$count = 0;
		$updateQuery = "update seats set isbooked=1 where ( ";
		foreach($_POST['seats'] AS $seat) {
			if ($count > 0) {
				$updateQuery .= " || ";
			}
			$updateQuery .= " ( rowId = '" . substr($seat, 0, 1) . "'";
			$updateQuery .= " and columnId = " . substr($seat, 1) . " ) ";
			$count++;
		}
		$updateQuery .= " ) and isbooked = 0";
		$result = mysql_query($updateQuery) or die('Not Updated');
		
	}
	$userSql = "select * from users";
	$getUser = mysql_query($userSql) or die('Not able to get user');
	mysql_close();
	}
?>
<table border='1' cellpadding='8' cellspacing='8'>
<thead>
<th>Name</th>
<th>No. of Seats</th>
<th>Seats</th>
</thead>
<?php if(mysql_num_rows($getUser) > 0 ){ 
	while($row = mysql_fetch_assoc($getUser)){
		$name = $row['userName'];
		$ptickets = $row['ptickets'];
		$seats = explode(',',$ptickets);
		$noOfSeats =  count($seats) ;
	

?>
<tr>
<td><?php echo $name; ?></td>
<td><?php echo $noOfSeats;  ?></td>
<td><?php echo $ptickets; ?></td>
</tr>
<?php }  } ?>
</table>

</center>
</body>
</html>