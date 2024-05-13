<?php

include_once("header.php");


 if (isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
       
                                       
$query1="select * from `leave` where employee_id='$id'";
     mysqli_query($con,$query1);
    }


 $minu1=$_SESSION['sick'];

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
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                           
                            </a>      
                    </div>
                </div>
        
                    
                    
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
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
               
                                <!-- Comment Row -->
                            </div>








<?php
include_once("footer.php");
?>