<?php
include_once("connection.php");


$name='';
$email='';
$id='';
$departmentid='';
$address='';
  $qualification='';
$experience='';
$birthday='';
$role='';
if(isset($_GET['id'])){
     $id=mysqli_real_escape_string($con,$_GET['id']);
    
    if ($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
        die('access denied');
    }
 $query="select * from employee where id='$id' ";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);
    $name=$row['name'];
 $email=$row['email'];
    $departmentid=$row['department_id'];
    $address=$row['address'];
    $qualification=$row['qualification'];
    $experience=$row['experience'];
    $birthday=$row['birthday'];
    $role=$row['role'];
}
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($con,$_POST['uname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $departmentid=mysqli_real_escape_string($con,$_POST['departmentid']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
     $qualification=mysqli_real_escape_string($con,$_POST['qualification']);
    $birthday=mysqli_real_escape_string($con,$_POST['birthday']);

   if($id>0){
        $query="update employee set name='$name',email='$email',department_id='$departmentid',address='$address',qualificaion='$qualification',experience='$experience',birthday='$birthday',role='$role' where id='$id'";
    }
    else{
       $query="insert into employee (name, email, department_id,address,qualification,experience,birthday,role,casual_leave,sick_leave,winter_vacation,summer_vacation,casual,sick,winter,summer,approved_leave) values ('$name','$email','$departmentid','$address','$qualification','$experience','$birthday','2','5','18','5','5','0','0','0','0','0')"; 
    }

 mysqli_query($con,$query);
    header('location:employee.php');
    die();
        
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/leave_logo.PNG" style="width: 217px;height: 70px;" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <!-- <img src="plugins/images/logo-text.png" alt="homepage" /> -->
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                   
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><a href="logout.php"> <span class="text-white font-medium">Log out</span></a></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php
        include_once("nav.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">ADD EMPLOYEE FORM</h4>
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
       
               
                  <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                            <form class="form-horizontal form-material" method="post">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0"> Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Enter your Name" name="uname"
                                               value="<?php echo $name ?>"  class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="Enter your Email" name="email"
                                                class="form-control p-0 border-0" value="<?php echo $email ?>" 
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Department</label>
                                        <div class="col-md-12 border-bottom p-0">
                                    <select name="departmentid" required   class="form-control p-0 border-0" >
                                            <option value="">Select Department</option>
                                        <?php
                                            $query1="select * from department";
                                          $res=mysqli_query($con,$query1);
                                                   while($row=mysqli_fetch_assoc($res)){
                                                       if($departmentid==$row['id'])
                                                       {
                                                           echo "<option selected='selected' value=".$row['id'].">".$row['department']."</option>"; 
                                                       }else{
                                        echo "<option value=".$row['id'].">".$row['department']."</option>";
                                                   }
                                                   }
                                        ?>
                                            </select>
                                           
                                        </div>
                                    </div>
                                                
                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Qualification</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"placeholder="Enter your Qualification"
                                               value="<?php echo $qualification ?>"  name="qualification" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                                 
                                  <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Experience</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"placeholder="Enter your Experience"
                                               value="<?php echo $experience ?>"  name="experience" class="form-control p-0 border-0">
                                        </div>
                                                </div>
                                   
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"placeholder="Enter your Address"
                                               value="<?php echo $address ?>"  name="address" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Birthday</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" placeholder="Enter your Birthdate"
                                             name="birthday"  value="<?php echo $birthday ?>"  class="form-control p-0 border-0">
                                        </div>
                                         
                                    </div>
                                   
                                    
                                 
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <?php if($_SESSION['ROLE']==1){ ?>
                                            <button type="submit" name="submit" class="btn btn-success"> Submit</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                
                                
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
  
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>