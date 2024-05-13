<?php

include_once("header.php");

    if (isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
       
                                       
$query1="select * from `leave` where employee_id='$id'";
     mysqli_query($con,$query1);
    }

    
?>
 
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
              
                    <div class="container">
                        <?php
             $eid=$_SESSION['USER_ID'];
                        
                
                                    
                                           
                             
                    $query3="select SUM(no_of_days) AS no_of_days from `leave` where employee_id='$eid'and leave_status='2'";
                             
                        $result=mysqli_query($con,$query3);
                        $record=mysqli_fetch_array($result);
                            $leave_no=18;
                            $leave_no1=$record['no_of_days'];
                            $minu=$leave_no-$leave_no1;
                        
                        ?>
                    
                    <div class="row my-5">
                        <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                            No of leaves:18
                         </div>    
                            </div>
                        </div>
                    
                         <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                          Approved leaves:<?=$record['no_of_days']?>
                         </div>    
                            </div>
                        </div>
                        
                        <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                            remaining Leaves:<?=$minu ?>
                         </div>    
                            </div>
                        </div>
                </div>
                    
                    
                    
                    </div>
                        
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
                                        <th class="border-top-0">Employee Id</th>
                                         <th class="border-top-0">Leave From</th>
                                        <th class="border-top-0">Leave To</th>
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
                                    
                                        <td><?php echo $i?></td>
                                      
                                             <td><?php echo $row['employee_id']?></td>
                                            <td><?php echo $row['leave_from']?></td>
                                        <td><?php echo $row['leave_to']?></td>
                                          <td><?php echo $row['leave_description']?></td>
                                         <td><?php echo $row['no_of_days']?></td>
                                          <td><?php echo $row['leave_status']?></td>
                                       
                                        
                                      
                                         
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




                </div>
</div>


      

     
<?php
include_once("footer.php");
?>