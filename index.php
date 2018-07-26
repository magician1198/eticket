<?php
require('textlocal.class.php');

$textlocal = new Textlocal('jay01011998@gmail.com', '452850578c94ad24a372a9e2fbb305df4855bca77f5a251cb10de5a3ea738997');

if (isset($_POST['btnCreate'])) {
    $sName = $_POST['name'];
	$sBoarding = $_POST['boarding'];
	$sDestination = $_POST['destination'];
	$nFare = $_POST['fare'];
	$nETicket = $sBoarding.uniqid(rand(), false);
	
    $numbers = array($_POST['mobile_no']);
	$sender = 'TXTLCL';
	$message = "Hi $sName <br> Your e-Ticket is : $nETicket <br> Boarding : $sBoarding <br> Destination : $sDestination <br> Total Fare : $nFare";

	try {
	    $result = $textlocal->sendSms($numbers, $message, $sender);
	    // print_r($result);
	    $sStatus = 'e-Ticket successfully send!!';
	} catch (Exception $e) {
		$sStatus = $e->getMessage();
	    // die('Error: ' . $e->getMessage());
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>e-Ticket System</title>
</head>

<body>
<div id="main">
    <form action="index.php" method="post">
    	<?php
    		if(isset($sStatus)){
		?>
			<div style="color: green; text-align: center;">
				<?php echo $sStatus; ?>
	    	</div>
    	<?php		
    		}
    	?>
    	
        <fieldset style="text-align: center;">
            <legend>Create e-Ticket</legend>

            <div class="fieldRow">
                <label>Name</label>
                <input type="text" name="name">
            </div>

            <div class="fieldRow">
                <label for="rgMethodNumbers">Boarding</label>
                <input type="text" name="boarding" />
            </div>
            <div class="fieldRow">
                <label for="rgMethodNumbers">Destination</label>
                <input type="text" name="destination" />
            </div>

            <div class="fieldRow" id="divNumbers">
                <label>FARE</label>
                <input name="fare" type="text" />
            </div>
            <div class="fieldRow" id="divNumbers">
                <label>Mobile Number</label>
                <input name="mobile_no" type="text" />
            </div>

            <div class="fieldRow">
                <label>&nbsp;</label>
                <input type="submit" name="btnCreate"/>
            </div>
        </fieldset>
    </form>
</div>

</body>
</html>