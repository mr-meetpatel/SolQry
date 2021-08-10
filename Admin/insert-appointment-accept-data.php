<?php
include '../conn/conn.php';
session_start();
if(isset($_POST['status']) && $_POST['status']==1){
    if(isset($_POST['date']))
    {
        
        $appdate= mysqli_real_escape_string($con,$_POST['date']);
        $apptime= mysqli_real_escape_string($con,$_POST['time']);
        $q= mysqli_query($con, "update appointment_master set app_status=1,app_date='{$appdate}',app_time='{$apptime}' where app_id='{$_POST['aaid']}'");
         
        $notificationq=mysqli_query($con,"INSERT INTO `notification_master` ( `n_from`, `n_to`,`b_id`,`id`,`notification`, `status`) VALUES ( '1', 'Student','{$_SESSION['b_id']}','{$_POST['sid']}','Appointment Accepted', '1');");
        if($q)
        {
             echo "Appointment Accept.";
        }
     
         
    }
}
else if(isset($_POST['status']) && $_POST['status']==0){
    if(isset($_POST['msg'])){
        $reject=mysqli_real_escape_string($con,$_POST['msg']);
        $q= mysqli_query($con, "update appointment_master set app_status=0,msg='{$reject}' where app_id='{$_POST['raid']}'");
      $notificationq=mysqli_query($con,"INSERT INTO `notification_master` ( `n_from`, `n_to`,`b_id`,`id`,`notification`, `status`) VALUES ( '1', 'Student','{$_SESSION['b_id']}','{$_POST['sid']}','Appointment Rejected', '1');");
      if($q)
      {
          echo "Appointment Rejected.";
      }
    }
    
}

?>