<?php
include '../conn/conn.php';
session_start();
if(isset($_POST['eventid']) && isset($_POST['stime']) && isset($_POST['etime'])){
    $q=mysqli_query($con,"update events set start_event_time='{$_POST['stime']}', end_event_time='{$_POST['etime']}' where id='{$_POST['eventid']}'");

    if($q){
        echo "Your Event Time Updated!";
    }
    else{
        echo "Something Went Wrong!";
        
        
    }
}
?>