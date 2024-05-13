//retriction

 

date_default_timezone_set('Asia/Kolkata');


$queryres="select * from `leave`";
$res1=mysqli_query($con,$queryres);
while($rows=mysqli_fetch_assoc($res1)){
$appliedtime=$rows['leave_from'];
$currenttime=$rows['date'];   
    
$appliedtime1=date($appliedtime);
$currenttime1=date($currenttime);

if ($currenttime1 > $appliedtime1) {
$queryu="update `leave` set leave_status='3'";
   mysqli_query($con,$queryu);
}
}
         
                            
                           <h3 class="text-white text-center">Casual Leaves:<?=$days['casual_leave']?></h3> 
                           <h3  class="text-white text-center"> Sick Leaves:<?=$days['sick_leave']?></h3>
                            <h3  class="text-white text-center"> Winter:<?=$days['winter_vacation']?></h3>
                            <h3  class="text-white text-center"> Summer:<?=$days['summer_vacation']?></h3>
                     
                         </div>    
                            </div>
                        </div>
                    
                         <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                         <h3 class="text-white text-center"> Approved leaves:</h3>
                            <h3 class="text-white text-center"><?=$record['no_of_days']?></h3>
                         </div>    
                            </div>
                        </div>
                        
                        <div class="col sm-4">
                        <div class="card bg-primary text-white">
                        <div class="card-body">
                           <h3 class="text-white text-center"> Remaining Leaves:</h3>
                      <h3 class="text-white text-center"> CL:<?=$minu ?></h3>
                         <h3 class="text-white text-center">SL:<?=$minu1 ?></h3>
                             <h3 class="text-white text-center">WVL:<?=$minu2 ?></h3>
                             <h3 class="text-white text-center"> SVL:<?=$minu3 ?></h3>
                         </div>    
                            </div>
                        </div>
                </div>
                    
                    
                    
                    </div>