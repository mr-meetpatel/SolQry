<?php

include '../conn/conn.php';
session_start();


date_default_timezone_set("Asia/Calcutta");
$date= date('h:i:sa');

//$row= mysqli_fetch_array($student);
$faculty= mysqli_query($con, "select * from faculty_master where b_id='{$_SESSION['sbid']}'");
while($row= mysqli_fetch_array($faculty))
{
    $student= mysqli_query($con,"select * from events where f_id='{$row['f_id']}'") or die(mysqli_error($con)); 
    $eventdata= mysqli_fetch_array($student);
   
    if(strtotime($date) < strtotime($eventdata['start_event_time']) || strtotime($date) > strtotime($eventdata['end_event_time']))
    {
        
        mysqli_query($con,"update faculty_master set is_busy='0' where f_id='{$eventdata['f_id']}'");
        $status="Available";
    }
 else {
       
       mysqli_query($con,"update faculty_master set is_busy='1' where f_id='{$eventdata['f_id']}'");
         $status="Busy";
    }
   
    echo "<tr>";
    echo "<td>{$row['f_name']}</td>";
   
    if($status=="Busy"){
        echo "<td>{$status} [{$eventdata['start_event_time']} - {$eventdata['end_event_time']}]</td>";
    }
    else{
        echo "<td>{$status}</td>";
    }
   
    echo "</tr>";
}

$i=1;
                        
                                
                            
                            
                            //echo "<td><a href='appointment-accept.php?aaid={$row['app_id']}' onclick='return confirm_accept()'>Accept</a> || <a href='appointment-reject.php?raid={$row['app_id']}' onclick='return confirm_reject()'>Reject</a></td>";
                            
                            
                            
                                
                            
                            
                        
?>

