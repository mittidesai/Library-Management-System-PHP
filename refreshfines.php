<?php
	include("connect.php");
	$query = "select Loan_id,Due_date,Date_in from book_loans";
    $result= $conn->query($query);
   // $rows = $result->fetch_assoc();
    while($row = $result->fetch_assoc()){
        //$dueDate = strtotime($row["Due_date"]);
        $dueDate = date_create($row["Due_date"]);
        //echo $row["Date_in"];
    	if(is_null($row["Date_in"])){
            $currentDate = date("Y-m-d");
            $currentDate = date_create($currentDate);
        }
    	else{
    		//$currentDate = strtotime($row["Date_in"]);
            $currentDate = date_create($row["Date_in"]);
        }
    	$diff = date_diff($currentDate, $dueDate);
        $diff = $diff->format("%a");
        //echo $diff;
    	$fine = 0;
    	if($diff>0)
    	{
    		$fine = 0.25*$diff;
    		$query = "select count(*) as total from fines where loan_id=$row[Loan_id]";
    		$r = $conn->query($query);
    		$rr = $r->fetch_assoc();
            if($rr["total"]==0){
                $query = "insert into fines(loan_id, fine_amt, paid) values($row[Loan_id], $fine, 0)";
                //echo $query;
                $r1 = $conn->query($query);   
            }
            else{
                $query = "update fines set fine_amt=$fine where loan_id=$row[Loan_id]";
                //echo $query;
                $r1 = $conn->query($query);
            }
    	}
    }
    $output = array();
    class Result{
        public $cno;
        public $fname;
        public $lname;
        public $fine;
    }
    $query = "select b.card_no as cno, b.first_name as fname, b.last_name as lname, sum(f.fine_amt) as fine from borrower as b, book_loans as bl, fines as f where b.card_no=bl.card_no and bl.Loan_id=f.loan_id group by b.card_no";
    $result= $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $rs = new Result();
        $rs->cno = $row["cno"];
        $rs->fname = $row["fname"];
        $rs->lname = $row["lname"];
        $rs->fine = $row["fine"];
        array_push($output, $rs);
    }
    echo json_encode($output);
?>
