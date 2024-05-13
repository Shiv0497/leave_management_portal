<?php

include_once("header.php");
 $id='';
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) ){
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $query1="delete from `leave` where id='$id'";
    mysqli_query($con,$query1);
}

if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id']) )
{
     $id=mysqli_real_escape_string($con,$_GET['id']);
        $status=mysqli_real_escape_string($con,$_GET['status']);  
    $query2="update `leave` set leave_status='$status' where id= '$id'";
     mysqli_query($con,$query2);
}


if($_SESSION['ROLE']==1){
      $query="select `leave`.*, employee.name ,employee.id as eid from `leave`,employee where `leave`.employee_id=employee.id order by id desc"; 

}
else{
    $eid=$_SESSION['USER_ID'];
   $query="select `leave`.*, employee.name ,employee.id as eid from `leave`,employee where `leave`.employee_id='$eid' and `leave`.employee_id=employee.id"; 
}

mysqli_query($con,$query);


?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
              <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
                        
                    </div>
                    <!-- ss -->
                    <?php if($_SESSION['ROLE']==2){ ?>
                    <div class="container">
                        <?php
  
             $eid=$_SESSION['USER_ID'];
                        
                  $queries="select SUM(no_of_days) AS no_of_days, leaves_no from employee oi JOIN `leave` p ON oi.id=p.employee_id where  employee_id='$eid'and leave_status='2' and leave_id='6'";
    $result=mysqli_query($con,$queries);
        $row=mysqli_fetch_assoc($result);

        $cl=$row['leaves_no'];
         $days=$row['no_of_days'];

                            
          $minu=$cl-$days;
    
    
    $queries1="select SUM(no_of_days) AS no_of_days, sick_leave from employee oi JOIN `leave` p ON oi.id=p.employee_id where  employee_id='$eid' and leave_status='2' and leave_id='5'";
    $result1=mysqli_query($con,$queries1);
        $row1=mysqli_fetch_assoc($result1);

        $sl=$row1['sick_leave'];
         $days1=$row1['no_of_days'];

                            
          $minu1=$sl-$days1;
    
    
     $queries2="select SUM(no_of_days) AS no_of_days, winter_vacation from employee oi JOIN `leave` p ON oi.id=p.employee_id where  employee_id='$eid' and leave_status='2' and leave_id='5'";
   $result2=mysqli_query($con,$queries2);
        $row2=mysqli_fetch_assoc($result2);

        $wl=$row2['winter_vacation'];
         $days2=$row2['no_of_days'];

                            
          $minu2=$wl-$days2;
    
    $queries3="select SUM(no_of_days) AS no_of_days, summer_vacation from employee oi JOIN `leave` p ON oi.id=p.employee_id where  employee_id='$eid' and leave_status='2' and leave_id='8'";
   $result3=mysqli_query($con,$queries3);
        $row3=mysqli_fetch_assoc($result3);

        $summerl=$row3['summer_vacation'];
         $days3=$row3['no_of_days'];

                            
          $minu3=$summerl-$days3;
    
  
    
    
          
 $query3="select SUM(no_of_days) AS no_of_days from `leave` where employee_id='$eid'and leave_status='2'";
                             
                        $result2=mysqli_query($con,$query3);
                        $record=mysqli_fetch_array($result2);
                   
                            #$leave_no1=$record['no_of_days'];
                            
                           # $minu=$cl-$leave_no1;
                                           
                             
                  
                      
                          
   
                     $sql="insert into leave_data (employee_id, applied_leave,remaining_leave) values ('$eid','$days','$minu')"; 
                         mysqli_query($con,$sql);   
                      
                        ?>
                        
       
                     <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Casual Leaves : <?=$days['casual_leave']?></h3>
                            <h3 class="box-title">Sick Leaves : <?=$days['sick_leave']?></h3>
                            <h3 class="box-title">Winter Leaves : <?=$days['winter_vacation']?></h3>
                            <h3 class="box-title">Summer Leaves : <?=$days['summer_vacation']?></h3>
                            
                        
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Approved Leaves : <?=$record['no_of_days']?> </h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Remaining Leaves</h3>
                            <h3 class="box-title">Casual Leaves : <?=$minu ?>  </h3>
                            <h3 class="box-title">Sick Leaves :  <?=$minu1 ?> </h3>
                            <h3 class="box-title">Winter Leaves : <?=$minu2 ?> </h3>
                            <h3 class="box-title">Summer Leaves : <?=$minu3 ?> </h3>
                        </div>
                    </div>
                </div>
        
                    <?php } ?>
                    
                    <!--ss-->
                    
                    
                    
                    
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
              
                
                <!-- ============================================================== -->
                <!-- DEPARTMENT  -->
                <!-- ============================================================== -->
     <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">LEAVE</h3></div>
                                  <?php if($_SESSION['ROLE']==2){ ?>
                            <div class="d-md-flex mb-3">
                                <h6 class="box_title_link mb-0"> <a href="addleave.php">ADD LEAVE</a></h6>
                             </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                    <tr>
                                            <th class="border-top-0">sr no</th>
                                            <th class="border-top-0">id</th>
                                         <th class="border-top-0">Employee Name</th>
                                         <th class="border-top-0">Leave From</th>
                                        <th class="border-top-0">Leave To</th>
                                        <th class="border-top-0">Leave Type</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">no.of days </th>
                                        <th class="border-top-0">Time </th>
                                        <th class="border-top-0">Status</th>
                                       
                                        </tr>
                                    <tr>
                                   <?php
                                        $i=1;
                                        $result=mysqli_query($con,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                        
                                        ?>
                                        <td><?php echo $i ?></td>
                                            <td><?php echo $row['id']?></td>
                                             <td><?php echo $row['name'].'('.$row['eid'].')'?></td>
                                            <td><?php echo $row['leave_from']?></td>
                                        <td><?php echo $row['leave_to']?></td>
                                         <td><?php $leave_type=$row['leave_id'];
                                            if($leave_type==5)
                                            {
                                                echo"sick";
                                            }
                                             elseif($leave_type==6)
                                            {
                                                echo "casual";
                                            }
                                            
                                            elseif($leave_type==7)
                                            {
                                                echo "winter vacation";
                                            }
                                            
                                            elseif($leave_type==8)
                                            {
                                                echo "summer vacation";
                                            }
                                            
                                             
                                             ?></td>
                                           
                                          <td><?php echo $row['leave_description']?></td>
                                         <td><?php echo $row['no_of_days']?></td>
                                         <td><?php echo $row['date']?></td>
                                         
                                      <td>
                                        <?php
                                            if($row['leave_status']==1){
                                                echo "Applied";
                                            }
                                            if($row['leave_status']==2){
                                                echo "Approved";
                                            }
                                            if($row['leave_status']==3){
                                                echo "rejected";
                                            }
                                            
                                            ?>
                                              <?php if($_SESSION['ROLE']==1){ ?>
                                            <select class="form-control" onchange="update_leave_status('<?php echo $row['id'] ?>',this.options[this.selectedIndex].value)">
                                                <option value="">Update Status</option>
                                                <option value="2">Approved</option>
                                                <option value="3">Rejected</option>
                                            
                                            
                                            </select>
                                        </td>
                                    
                                        <?php } ?>
                                        
                                           <td> 
                                               <?php
                                             if($row['leave_status']==1){ ?>
                                               <a href="leave.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
                                                   <?php } ?> 
                                               </td>
                                        <td> 
                                               <?php
                                             if($_SESSION['ROLE']==1){ ?>
                                            <a href="view1.php?id=<?php echo  $row['employee_id']?>">View</a>
                                                   <?php } ?> 
                                               </td>
                                         
                                        </tr>
                                        <?php
                                            $i++;
                                        }    ?>
                                    </thead>
                                    
                                </table>
                            </div>
                         
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
               
                                <!-- Comment Row -->
                            </div>

                    





      
<script>
     function update_leave_status(id,select_value)
    {
       window.location.href='leave.php?id='+id+'&type=update&status='+select_value
    }
     
     
     </script>



<?php
include_once("footer.php");
?>