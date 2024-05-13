<?php
include_once("header.php");


if ( isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $query1="delete from employee where id='$id'";
    mysqli_query($con,$query1);
}
$query="select * from employee where role=2 ";

?>
 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    
                     
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
                        <div class="row">
                            <div class="col-md-10">
                                    <h3 class="box-title mb-0">EMPLOYEE DETAILS</h3>
                                </div>
                                <div class="col-md-2 text-md-right">
                                    <h6 class="btn btn-primary"> <a style="color: white;" href="addemployee.php"><b>ADD Employee</b></a></h6>
                                </div>
                            </div>
                           
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="">Id</th>
                                            <th class="">Name</th>
                                            <th class="">Email</th>
                                            <th class="">Department</th>
                                            <th class="">Qualification</th>
                                            <th class="">Experience</th>
                                            <th class="">Address</th>
                                             <th class="">Birthday</th>
                                             <th class="">Action</th>
                                           
                                        </tr>
                                       
                                             <tr>
                                    <?php
                                        $i=1;
                                            $result_set=mysqli_query($con,$query);
                                        while($row=mysqli_fetch_assoc($result_set)){
                                        
                                        ?>
                                        
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['name']?></td>
                                                     <td><?php echo $row['email']?></td>
                                                     <td><?php echo $row['department_id']?></td>
                                                    <td><?php echo $row['qualification']?></td>
                                                 <td><?php echo $row['experience']?></td>
                                                     <td><?php echo $row['address']?></td>
                                                     <td><?php echo $row['birthday']?></td>
                                                 
                                               
                                          <td><a class="btn btn-info" href="addemployee.php?id=<?php echo $row['id']?>">Edit</a>  <a class="btn btn-danger" href="employee.php?id=<?php echo $row['id']?>">Delete</a></td>
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
<?php
include_once("footer.php");
?>