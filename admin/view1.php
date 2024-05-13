<?php

include_once("header.php");


 if (isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
       
                                       
$query1="select * from `leave` where employee_id='$id'";
     mysqli_query($con,$query1);
    }
$query="select * from employee where id='$id'";
mysqli_query($con,$query);


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
                            <?php
                            $result=mysqli_query($con,$query);
                                        while($row=mysqli_fetch_assoc($result)){
                                            ?>
                      <h3 class="box-title">Casual Leaves :<span class="counter text-purple"> <?php echo $row['casual_leave']?> </span></h3>
                            <h3 class="box-title">Sick Leaves : <span class="counter text-purple"><?php echo $row['sick_leave']?></span> </h3>
                            <h3 class="box-title">Winter Leaves : <span class="counter text-purple"><?php echo $row['winter_vacation']?></span> </h3>
                            <h3 class="box-title">Summer Leaves : <span class="counter text-purple"><?php echo $row['summer_vacation']?></span> </h3>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Approved Leaves:<span class="counter text-purple"> <?php echo $row['approved_leave']?></span></h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Remaining Leaves</h3>
                            <h3 class="box-title">Casual Leaves : <span class="counter text-purple"><?php echo $row['casual']?></span></h3>
                            <h3 class="box-title">Sick Leaves : <span class="counter text-purple"><?php echo $row['sick']?></span></h3>
                            <h3 class="box-title">Winter Leaves : <span class="counter text-purple"><?php echo $row['winter']?></span> </h3>
                            <h3 class="box-title">Summer Leaves : <span class="counter text-purple"> <?php echo $row['summer']?></span></h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
                                          
                                         <th class="border-top-0">Employee Id</th>
                                  
                                         <th class="border-top-0">Leave From</th>
                                        <th class="border-top-0">Leave To</th>
                             <th class="border-top-0">Leave Type</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">no.of days </th>
                                        <th class="border-top-0">Status</th>
                                       
                                        </tr>
                                    <tr>
                                    <?php 
                                        $i=1;
                                         $result=mysqli_query($con,$query1); 
                                          while($row=mysqli_fetch_assoc($result)){
                                              
                                      
                                         
                                         
                                        ?>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['employee_id']?></td>
                                     
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
                                      <td><?php $leave_status=$row['leave_status'];
                                          if($leave_status==2)
                                          {
                                              echo "Approved";
                                          }
                                         elseif($leave_status==3)
                                         {
                                             echo "Rejected";
                                         }
                                          ?></td>
                                        
                                        <?php  ?>
                                          
                                         
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
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>




<?php
include_once("footer.php");


?>