<?php
session_start();
include '../conn/conn.php';
$res="";
$res1="";
$sql=mysqli_query($con,"select * from query_master where   msg_from='{$_POST['faculty']}'  and msg_to='{$_POST['stu']}' or msg_from='{$_POST['stu']}'  and msg_to='{$_POST['faculty']}'");

$update= mysqli_query($con, "update query_master set is_seen='1' where msg_to='{$_SESSION['fid']}' and is_seen='0'");
//$sql1=mysqli_query($con,"select * from new_chat where msg_from='{}'") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0)
{
    while($row=mysqli_fetch_array($sql))
    {
      
      if($row['msg_to']==$_SESSION['fid'])
      {
         
          
        
       // $res=$res."<img src='' class='left' alt='Avatar' class='right' style='width:100%;'>";
         if($row['is_seen']==2)
         {
             $res=$res."<div class='container '>"; 
             $res=$res."<p>This Msg is Deleted</p>";
             $res=$res."</div>";
         }
      else{
          $res=$res."<div class='container '>"; 
          $res=$res."<p><b>Student</b>: $row[query]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>";//<a href='chat.php?id=$row[q_id]' class='left'>Delete</a>

        $res=$res."<span class='time-left'>$row[q_time]</span>";

        $res=$res."</div>";
      }
        
        
      }
       
      elseif($row['msg_from']==$_SESSION['fid']) {
          
      
        
      //  $res=$res."<img src='user.png' class='left' alt='Avatar' class='right' style='width:100%;'>";

       if($row['is_seen']==2)
       {
           $res=$res."<div class='container darker'>";
            $res=$res."<p>This Msg is Deleted</p>";
             $res=$res."</div>";
       }
       else{
          $res=$res."<div class='container darker'>"; 
        $res=$res."<p><b>You</b>: $row[query]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>";//<a href='chat.php?id=$row[q_id]' class='left'>Delete</a>

        $res=$res."<span class='time-left'>$row[q_time]</span>";

        $res=$res."</div>";
       }
  }
      
        
      
    } 
}

 


echo $res;



?>

