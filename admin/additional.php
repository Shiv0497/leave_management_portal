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
                    <!-- ss -->
                    <?php if($_SESSION['ROLE']==2){ ?>
                    <div class="container">
                        <?php
  
             $eid=$_SESSION['USER_ID'];
                        
              
               
                                    
                                           
                             
                    $query3="select SUM(no_of_days) AS no_of_days from `leave` where employee_id='$eid'and leave_status='2'";
                             
                        $result=mysqli_query($con,$query3);
                        $record=mysqli_fetch_array($result);
                              $cl=23;
                            $leave_no1=$record['no_of_days'];
                            $minu=$cl-$leave_no1;
                      
                          
   
                     $sql="insert into leave_data (employee_id, applied_leave,remaining_leave) values ('$eid','$leave_no1','$minu')"; 
                         mysqli_query($con,$sql);   
                      
                        ?>
                    
                    <div class="row my-5">
                        <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                            casual leaves:18
                            sick leaves:5
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
                    <?php } ?>
                    
                    <!--ss-->
                    
                    
                    
                    
                <!-- /.col-lg-12 -->
            </div>