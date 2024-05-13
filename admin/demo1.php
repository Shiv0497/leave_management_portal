<?php
include_once("connection.php");
/*$start = new DateTime('2022-02-18');
$end = new DateTime('2022-02-23');
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$days = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$sql="select * from holiday_dates";
$res=mysqli_query($con,$sql);
$datas=array(); 
while($row=mysqli_fetch_assoc($res))
{
$holidays[] = $row['holiday'];
}
print_r($holidays);





foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sun') {
        $days--;
    }

    // (optional) for the updated question
    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
        $days--;
    }
}


#echo $days; // 4*/


$today = date("Y-m-d");
$expire=date("2022-02-25");
//$expire = $row->expireDate; //from database
echo $today;
echo "<br>";
echo $expire;
$today_time = strtotime($today);
$expire_time = strtotime($expire);

if ($expire_time < $today_time) {
echo "hii";
}

echo "<br>";

 /*$date_now = new DateTime('Y-m-d H:i:s');
 $date2    = new DateTime("01/02/2016 11:30:00");
echo $date_now;
echo "<br>";
echo $date2;

if ($date_now < $date2) {
    echo 'less than';
}else{
    echo 'greater than';
}


 $date_now = new DateTime();
 $date2    = new DateTime("01/02/2016");
if ($date_now > $date2) {
    echo 'greater than';
}else{
    echo 'less than';
}
$theDate1    = new DateTime();
$theDate    = new DateTime('2020-03-08 11:30:00');
echo $stringDate = $theDate->format('Y-m-d H:i:s');
echo "<br>";
echo $stringDate1 = $theDate1->format('Y-m-d H:i:s');

echo "<br>";
  $currentDateTime = date('Y-m-d H:i:s');
    echo $currentDateTime;
//output: 2020-03-08 00:00:00

echo "<br>";
date_default_timezone_set('Asia/Kolkata');
*/

//$currentTime = date( 'd-m-Y 12:00:00 ' );
//echo $currentTime;

$date2='';
$query="select * from `leave`";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$appliedtime=$row['leave_from'];
$currenttime=$row['date'];

$appliedtime1=date($appliedtime);
$currenttime1=date($currenttime);
echo $appliedtime1;
echo "<br>";
echo $currenttime1;
echo "<br>";
//$currentTime = date( 'd-m-Y');
//echo $currentTime;
//$previous=date('Y-m-d 12:00:00',strtotime("-1 day",strtotime($date3)));

//echo $previous;

/*if ( $currenttime1 > $appliedtime1 ) {
$query1="update `leave` set leave_status='3'";
   mysqli_query($con,$query1);
    
    echo "greater than";
}else{
    echo 'less than';
}*/
$date2='';
$query="select * from `leave`";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);
$timepickup=$row['leave_from'];
$timereturn=$row['leave_to'];

$timepickup1=strtotime($timepickup);
$timereturn1=strtotime($timereturn);




    
$timediff = ($timereturn1 - $timepickup1) / 3600;

$days = floor($timediff / 8);
$halfday = ($timediff - $days * 8) / 3.5;
echo $halfday;
$days += $halfday < 1 ? 0.5: 1;
    echo $days;
?>