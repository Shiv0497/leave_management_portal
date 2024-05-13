<?php
include_once("connection.php");

#$date1= strtotime("19-1-2022");
#$date2= strtotime("20-1-2022");
#$interl= $date2-$date1;
#echo floor($interl/(60*60*24));
#$query="select SUM(no_of_days) as `sumdays` from `leave`";
#$res=mysqli_query($con,$query);
#$data=mysqli_fetch_array($res);
#$data1= $data['sumdays'];
#echo $data1;
 /*$eid=$_SESSION['USER_ID'];
     $queries="select SUM(no_of_days) AS no_of_days, leaves_no from employee oi JOIN `leave` p ON oi.id=p.employee_id;";
    $result=mysqli_query($con,$queries);
        $row=mysqli_fetch_assoc($result);

        $cl=$row['leaves_no'];
         $days=$row['no_of_days'];
echo $cl;
                            
          $minu=$cl-$days;
echo "printing";
echo $minu;



$queries="select SUM(no_of_days) AS no_of_days, sick_leave from employee oi JOIN `leave` p ON oi.id=p.employee_id where leave_status='2' and leave_id='5'";
    $result=mysqli_query($con,$queries);
        $row=mysqli_fetch_assoc($result);

        $sl=$row['sick_leave'];
         $days=$row['no_of_days'];

                            
          $minu1=$sl-0;
echo "sick:";
    echo $minu1;




$start_date ='2022-02-18' ;
$end_date = '2022-02-22';

$count = abs(strtotime($start_date) - strtotime($end_date));
$day   = $count+86400;
$total = floor($day/(60*60*24));

echo $total;


$start = new DateTime($start_date);
$end = new DateTime($end_date);
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$days = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$holidays = array('2022-02-19','2022-02-15');

foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
        $days--;
    }

    
 // (optional) for the updated question
    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
        $days--;
    }
}

echo "hrello";
echo $days; // 4

*/

/*$sql="select * from holiday_dates";
$result=mysqli_query($con,$sql);
    $datas=array();
    if(mysqli_num_rows($result)>0){
        while($row= mysqli_fetch_assoc($result)){
            $datas[]=$row;
            
        }
    }
        
foreach($datas as $data){
    echo $data['holiday'];
}

*/

$sql="select * from holiday_dates";
$result=mysqli_query($con,$sql);
    $datas=array();
    if(mysqli_num_rows($result) > 0){
        while($row= mysqli_fetch_assoc($result)){
            $datas[]=$row;

        }
    }
foreach($datas as $data) {
$data1=array($data['holiday']);
   print_r($data1); 
}

$holidays = array($data1);
    print_r($holidays);
echo "<br>";


?>
<html>
    

<body>
    
    
    <div class="btn btn-danger">
 
        
     </div>
    </body>


</html>