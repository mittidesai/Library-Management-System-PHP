<html>
<head>

	<link rel="stylesheet" href="bootstrap.min.css"/>
	<script src="jquery-1.7.1.min.js" type="text/javascript"></script>
	<script>
		//function checkin(){

			$(document).ready(function(){

			$(".checkin").on('click', function() {
				//alert("Handler for .click() called.");
				var id=$(this).attr('id');
				console.log(id);
				$.ajax({
					url: "onclickcheckin.php",
					data: {loan: id},
					type: 'GET',
					success: function(output){
						$('#t').html("<strong>Successfully checked In!</strong>");	
					},
					error: function(x, y, z){
						console.log(x, y, z);
					}
				});
			});
		});
		//}
	</script>
</head>
<body>
	<?php
		include('connect.php'); 
		echo 'I am in checkin function;';
		//$checkin="UPDATE book_loans SET Date_in=CURDATE() WHERE ISBN10='{$_POST[isbn]}'";
		//$checkin1=$conn->query($checkin);
		//$CheckIn2=$checkin1->fetch_assoc();
		$sql = "SELECT * FROM book_loans WHERE ISBN10='{$_POST[isbn]}' AND Date_in IS NULL";
		$sql1=$conn->query($sql);
		$sql2=$sql1->fetch_assoc();
		$count = "SELECT COUNT(*) as noofrec FROM book_loans WHERE ISBN10='{$_POST[isbn]}' AND Date_in IS NULL";
		$count1=$conn->query($count);
		$count2=$count1->fetch_assoc();
	?>

		<?php
			if($count2["noofrec"]==0)
				echo "No book to check in!";
			else{
				?>
				<table id="t" class="table">
					<tr>
						<th>Book_id</th>
						<th>Branch_id</th>
						<th>card_no</th>
						<th>Date_out</th>
						<th>Action</th>
					</tr>
				<?php
					for($i=0;$i<$count2["noofrec"];$i++)
					{?>
					<tr>
						<td><?php echo $sql2["ISBN10"];?></td>
						<td><?php echo $sql2["branch_id"];?></td>
						<td><?php echo $sql2["card_no"];?></td>
						<td><?php echo $sql2["Date_out"];?></td>
						<td>
							<div class="checkin btn btn-info" id=<?php echo $sql2["Loan_id"];?>>CheckIn</div>
						</td>
					</tr>
				<?php } ?>
				</table>
				<?php } ?>
</body>
</html>