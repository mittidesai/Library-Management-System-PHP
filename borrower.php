<html>
<body>
<?php 
include("connect.php"); 

$ssn = "SELECT COUNT(*) as totals from borrower where ssn='{$_POST[brossn]}'";
$ssn1 = $conn->query($ssn);
$ssn2 = $ssn1->fetch_assoc();
    echo $ssn2["totals"];
if($ssn2["totals"]>=1){
	echo 'qwer';
	echo 'You have already registered.';
}
else{
	$sql="INSERT into borrower(card_no,ssn,first_name,last_name,email,address,city,state,Phone) Values('{$_POST[brocardno]}','{$_POST[brossn]}','{$_POST[brofname]}','{$_POST[brolname]}','{$_POST[broemail]}','{$_POST[broaddress]}','{$_POST[brocity]}','{$_POST[brostate]}','{$_POST[brono]}')";
    $sql1=$conn->query($sql);
    $sql2=$sql1->fetch_assoc();
 
    echo 'Successfully added borrowwer.';


}

 $conn->close(); 
?>
</body>
</html>