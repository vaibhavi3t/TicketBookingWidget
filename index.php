<?php
$error = null;
if(isset($_GET['error'])){
	$error = trim($_GET['error']);
	$errorMsg = "Please enter less number of seats only".trim($_GET['available'])."seats available" ;	
}

?>

<html>
<title>Ticket Reservation</title>
<link rel="stylesheet" href="home.css" type="text/css" />
<body>
<?php if ($error != null && $errorMsg  != null) : ?>
<div  style="background-color:red;color:white;font-size:20px;width:50%;margin-left:300px;text-align:center"><?php echo $errorMsg; ?></div>
<?php endif;?>

<form action="seats.php" method="post">
<ul class="form-style" style="align:center;">
    <li>
        <label>Name</label>
		<input type="text" name ="name" id="name" required />
        
    </li>
	<li>
        <label>Number of Seats</label>
        <input type="text" name ="noseats" id="noseats" required/>
    </li>
   
    <li>
        <input type="submit" value="Start Selecting" name="submit"/>
    </li>
</ul>
</form>
</body>
</html>