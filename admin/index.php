<?php
include_once("header.php");


if ( isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
    $query1="delete from department where id='$id'";
    mysqli_query($con,$query1);
}
$query="select * from department ";


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
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                                to Pro</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
 <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
              
                
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                           
                             <div class="row">
                                <div class="col-md-10">
                                    <h3 class="box-title mb-0">DEPARTMENT</h3>
                                </div>
                                <div class="col-md-2 text-md-right">
                                    <h6 class="btn btn-primary"> <a style="color: white;" href="adddepartment.php"><b>ADD DEPARTMENT</b></a></h6>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                    <tr class="text-center">
                                            <th class="border-top-0">Sr No.</th>
                                            <th class="border-top-0">Department ID</th>
                                            <th class="border-top-0">Department</th>
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    
                                    <?php
                                        $i=1;
                                            $result_set=mysqli_query($con,$query);
                                        while($row=mysqli_fetch_assoc($result_set)){
                                        
                                        ?>
                                        <tr class="text-center">
                                        <td><?php echo $i ?></td>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['department']?></td>
                                           <td><a class="btn btn-info" href="adddepartment.php?id=<?php echo $row['id']?>">Edit</a> <a class="btn btn-danger" href="index.php?id=<?php echo $row['id']?>">Delete</a></td>
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