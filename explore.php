<!DOCTYPE html>
<html>
        <body>
			
			<?php
			include("connect.php");    
$sql = "SELECT  b.isbn10,b.title,b.author,l.address,l.branch_id,l.branch_name FROM books b INNER JOIN book_copies c ON
b.isbn10 = c.book_id INNER JOIN library_branch l ON c.branch_id = l.branch_id WHERE b.isbn10 =
'{$_POST[isbn]}' OR  b.title = '{$_POST[btitle]}' OR b.author ='{$_POST[aname]}'";   
//$subsplittedstring = explode("", $sql);

//if($subsplittedstring==$_POST[btitle] || $subsplittedstring==$_POST[aname] || $subsplittedstring==$_POST[isbn]){
  // $subsplittedstring===$sql;
//}   
$result =$conn->query($sql);      
if ($result->num_rows > 0) 
{      // output data of each row     
	while($row = $result->fetch_assoc())          
		{?>             
	<table border="1">
	<tr><th>ISBN</th><th>Book Title</th><th>Author</th><th>Branch ID</th><th>Branch
    Name</th><th>Address</th></tr>                 
	<tr><td><?php echo $row["isbn10"]."<br>"?></td>
		<td><?php echo $row["title"]."<br>"?></td>
        <td><?php echo $row["author"]."<br>";?></td>
        <td><?php echo $row["branch_id"]."<br>";?></td>
        <td><?php echo $row["branch_ame"]."<br>";?></td>
        <td><?php echo $row["address"]."<br>";?></td>
        <?php ;     
     } 
 } 
 else 
 {
	echo "0 results"; 
 }?>
 <?php 
 $conn->close(); ?>
</tr>
</table>
</body> 
</html>
