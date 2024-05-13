<?php

include_once("header.php");
 $id='';

 if(isset($_POST) && $_POST['employeeList']!='' ){

    $query = "SELECT
                L.one_word_sentiment,
                COUNT(DISTINCT L.id) AS distinct_count,
                E.name,
                L.overall_sentiment
            FROM
                `leave` L
            LEFT JOIN employee E ON
                E.id = L.employee_id
            WHERE
                L.`date` BETWEEN '".$_POST['start_date']." 00:00:00'  AND '".$_POST['end_date']." 23:59:59'
                AND employee_id = '".$_POST['employeeList']."'
            GROUP BY
                L.one_word_sentiment,
            E.name,
                L.overall_sentiment
            ORDER BY
                L.one_word_sentiment ASC";
}else{
    $query = "SELECT
   DISTINCT(E.name),
    COUNT(DISTINCT L.id) AS distinct_count,
    L.overall_sentiment,
    L.one_word_sentiment
    FROM
    `leave` L
    LEFT JOIN employee E ON
    E.id = L.employee_id GROUP BY 1,3,4 ";
}

    $employeeListQuery = "SELECT DISTINCT
                        (L.employee_id),
                        E.name,
                        E.email
                        FROM
                        `leave` L
                        LEFT JOIN employee E ON
                        E.id = L.employee_id ";
     $employeeListRes = mysqli_query($con, $employeeListQuery);                


?>


            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== 
              <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
                        
                    </div>
             <!-- ss -->
     


     
     
                 
                  
            

                        <?php
 
             $eid=$_SESSION['USER_ID'];
    
   
  ?>                  
                    
                    
                <!-- /.col-lg-12 -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts 
                <!-- ============================================================== -->
              
                
                                  
            <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid -->
            <!-- ==============================================================-->
                
            <div class="container-fluid">
                
                
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                 <?php if($_SESSION['ROLE']==2){ ?>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total No of Leaves:</h3>
                             <h3 class="box-title">asual Leaves:<span class="counter text-purple"></span></h3>
                             <h3 class="box-title">Sick Leaves:<span class="counter text-purple"></span> </h3>
                             <h3 class="box-title">Winter Vacation Leaves:<span class="counter text-purple"></span> </h3>
                             <h3 class="box-title">Summer Vacation Leaves:<span class="counter text-purple"></span> </h3>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Approved Leaves : <span class="counter text-purple"><?=$record['no_of_days']?></span></h3>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Remaining Leaves:</h3>
                            <h3 class="box-title">Casual Leaves: <span class="counter text-info"><?=$minu ?></span></h3>
                              <h3 class="box-title">Sick Leaves: <span class="counter text-info"><?=$minu1 ?></span></h3>
                              <h3 class="box-title">Winter Vacation Leaves: <span class="counter text-info"><?=$minu2 ?></span></h3>
                              <h3 class="box-title">Summer Vacation Leaves: <span class="counter text-info"><?=$minu3 ?></span></h3>
                         
                        </div>
                    </div>
                </div>
          <?php } ?>

            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
    
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
                        

                
                
                
                <!-- ============================================================== -->
                <!-- DEPARTMENT  -->
                <!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title mb-0">SENTIMENT</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-material" action=""  id="myForm" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-4 start-end-date">
                                    <label class="col-md-4 p-0">Start Date</label>
                                    <div class="col-md-8 border-bottom p-0">
                                    <!-- value="<?php if(isset($_POST['start_date']) && $_POST['start_date']!=''){ echo $_POST['start_date'];}else{ echo '';} ?> -->
                                        <input type="date" name="start_date" required class="form-control p-0 border-0" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-4 start-end-date">
                                    <label class="col-md-4 p-0">End Date</label>
                                    <div class="col-md-8 border-bottom p-0">
                                        <input type="date" name="end_date" required class="form-control p-0 border-0" >
                                    </div>
                                </div>
                            </div>
                           

                            <div class="col-md-4 employee-sent-div">
                                <div class="form-group mb-4">
                                    <label >Select Employee</label>
                                    <div class="col-md-8 border-bottom p-0">
                                        <select class="form-control p-0 border-0" required name="employeeList">
                                        <option value="">--Select--</option>
                                        <?php
                                        foreach($employeeListRes as $empList){
                                            ?>
                                                <option value="<?php echo $empList['employee_id']  ?>"><?php echo $empList['name'].'-'.$empList['email'] ?></option>
                                            <?php
                                            }    
                                        ?>
                                        
                                        </select> 
                                        <!-- <input type="date" name="end_date" required class="form-control p-0 border-0"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 sent-submit-div">
                                <div class="form-group mb-4">
                                    <input type="submit" class="btn btn-success">
                                    <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-md-flex mb-3">
                <!-- Your PHP code goes here -->
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr class="text-center">
                            <th class="">sr no</th>
                            <th class="">Employee Name</th>
                            <th class="">Overall Sentiment</th>
                            <th class="">One Word Reason</th>
                            <th class="">Reason Count</th>
                            <th class="">Suggestion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['overall_sentiment'] ?></td>
                                <td><?php echo $row['one_word_sentiment'] ?></td>
                                <td><?php echo $row['distinct_count'] ?></td>
                                <!-- <td><button type="button" class="btn btn-primary" id="resetButton">Get Analysis</button></td> -->
                                <td><button type="button" class="btn btn-primary getAnalysis"  data-sentiment="<?php echo $row['one_word_sentiment'] ?>" data-count="<?php echo $row['distinct_count'] ?>" data-status="<?php echo $row['overall_sentiment'] ?>">Get Suggestion</button></td>

                            </tr>
                        <?php
                            $i++;
                        } ?>
                    </tbody>
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


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>

$(document).ready(function() {
        // Reset button click event
        $('#resetButton').click(function() {
            // Reset the form
            document.getElementById("myForm").reset();
            // window.location.reload();
            window.location.href = "sentiment_dashboard.php";
            // Optionally, prevent the default form submission behavior
            // return false;
        });


        $('.getAnalysis').click(function(event) {
            const sentiment = $(this).data('sentiment');
            const sentimentStatus = $(this).data('status');
            const count = $(this).data('count');
            
            // window.location.reload();
            window.location.href = `analysisReport.php?sentiment=${sentiment}&sentimentStatus=${sentimentStatus}&count=${count}`;
            return;
            console.log('employeeId',sentimentStatus,sentiment,count)
            // Make an AJAX request using jQuery
            $.ajax({
            url: 'analysisReport.php',
            type: 'POST',
            data: { sentiment: sentiment,
                sentimentStatus : sentimentStatus,
                sentimentCount : count
            },
            dataType: 'json',
            success: function(analysisData) {
                // Process the analysis data received from your server
                console.log('Analysis Data:', analysisData);
                // You can display the analysis data in a modal, popup, or any other way you prefer
            },
            error: function(error) {
                console.error('Error fetching analysis:', error);
                // Handle any errors that might occur during the AJAX request
            }
            });
        });





        
    });
     function update_leave_status(id,select_value)
    {
       window.location.href='leave.php?id='+id+'&type=update&status='+select_value
    }
     
     
     </script>



<?php
include_once("footer.php");
?>