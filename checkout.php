<html>
<head>
</head>
<body>
<?php 
include("connect.php");
$noofcopies = "SELECT SUM(no_of_copies) as mysum FROM book_copies WHERE book_id='{$_POST[bookid]}'";
    echo 'after noofcopies query';
    $noofcopies1= $conn->query($noofcopies);
    $noofcopies2 = $noofcopies1->fetch_assoc();
    echo $noofcopies2["mysum"];
    echo 'query printed?';

$noofbooksalreadyloaned = "SELECT COUNT(*) as notloaned FROM book_loans WHERE isbn10='{$_POST[bookid]}' AND Date_in IS NULL";
    echo 'after already loaned query';
    $noofbooksalreadyloaned1= $conn->query($noofbooksalreadyloaned);
    $noofbooksalreadyloaned2 = $noofbooksalreadyloaned1->fetch_assoc();
    echo $noofbooksalreadyloaned2["notloaned"];
if($noofcopies2["mysum"]>$noofbooksalreadyloaned2["notloaned"]){



$noofbookstobeloaned= "SELECT COUNT(loan_id) as mytotal FROM book_loans WHERE card_no='{$_POST['cardno']}' AND Date_in IS NULL";
    $im= $conn->query($noofbookstobeloaned);
    $img = $im->fetch_assoc();
if(intval($img["mytotal"])<=3)
{
   $sql= "INSERT into book_loans(isbn10, branch_id, card_no, Date_out, Due_date, Date_in) Values('{$_POST[bookid]}','{$_POST[branchid]}','{$_POST[cardno]}',CURDATE(),DATE_ADD(CURDATE(),INTERVAL 14 DAY),NULL)";
   $answer= $conn->query($sql);
   $ans = $answer->fetch_assoc();
   echo 'Congratulations you have successfully loaned the book!';
}
else
{
	echo 'You cannot loan more than 3 books at a time.';
}
}
else{
	echo 'There are no copies of this book available currently. All of them have been loaned';
}
 $conn->close(); 
 /*$result =$conn->query($sql);      
if ($result->num_rows > 0) 
	{      // output data of each row     
	while($row = $result->fetch_assoc())          
		{ echo 'I am in while';?>             
	<table border="1">
	<tr><th>ISBN</th><th>Book Title</th><th>Due Date</th></tr>                 
	<tr><td><?php echo $row["isbn10"]."<br>"?></td>
		<td><?php echo $row["title"]."<br>"?></td>
        <td><?php echo $row["Due_date"]."<br>";?></td>
        <?php ;     
     } 
 } 
 else 
 {
	echo "0 results"; 
 }*/?>
</tr>
</table>


</body>
</html>