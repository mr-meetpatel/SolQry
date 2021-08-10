<?php
$con= mysqli_connect("localhost", "root", "", "oms");
function count_unseen_msg($from,$to,$con)
{
   
    $q= mysqli_query($con, "select * from query_master where msg_to='{$to}' and msg_from='{$from}' and is_seen='{0}'");
    
    
    $nm="";
    $row= mysqli_fetch_array($q);
    $count= mysqli_num_rows($q);
    if($count)
    {
       $nm="<span class='badge badge-info'>$count</span>";
    }
    
    return $nm;
}

function fetch_typing_notification($userid,$id,$con)
{
    if($userid==2)
    {
        $type=mysqli_query($con, "select is_typing from faculty_master where f_id='{$id}'");
    while($typedata= mysqli_fetch_array($type))
    {
        if($typedata['is_typing']==1)
        {
            $display="Typing...";
        }
    }
    }
    else
    {
        $type=mysqli_query($con, "select is_typing from student_master where stu_id='{$id}'");
    while($typedata= mysqli_fetch_array($type))
    {
        if($typedata['is_typing']==1)
        {
            $display="Typing...";
        }
    }
    }
    return $display;
}
?>