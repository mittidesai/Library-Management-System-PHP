<?php 

	if(isset($_GET['loan']))
	{
		include('connect.php');
		$checkin="UPDATE book_loans SET Date_in=CURDATE() WHERE Loan_id={$_GET[loan]} AND Date_in IS NULL";
		$checkin1=$conn->query($checkin);
		echo 1;
	}
?>