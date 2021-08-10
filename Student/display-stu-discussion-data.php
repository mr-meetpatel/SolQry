<?php

include '../conn/conn.php';
session_start();
if(!isset($_SESSION['sid']))
{
    header("location:logout.php");
}
if(!isset($_POST['disid'])){
    echo "No Post Data";
}
else{


$diss1=mysqli_query($con,"select * from discussion_master where diss_id='{$_POST['disid']}'");
  $num=mysqli_num_rows($diss1);
  
  if(mysqli_num_rows($diss1)>0){
    
    while($row1 =mysqli_fetch_array($diss1)){
        
        

?>

        <div class="row">
        <div class="col-12 col-lg-12">
         <div class="card">
             <div class="card-body">
                 <?php
                 if($row1['stu_id']!=0){
                    $sname=mysqli_query($con,"select stu_name from student_master where stu_id='{$row1['stu_id']}'");
                    $snamedata=mysqli_fetch_array($sname);
                    echo "<h6>By $snamedata[stu_name]</h6>";
                }else{
                    $fname1=mysqli_query($con,"select f_id from discussion_forum_master where diss_id='{$_POST['disid']}'");
                    $fnamedata1=mysqli_fetch_array($fname1);
                    $sname=mysqli_query($con,"select f_name from faculty_master where f_id='{$fnamedata1['f_id']}'");
                    $snamedata=mysqli_fetch_array($sname);
                    echo "<h6>By $snamedata[f_name]</h6>";
                }
                 ?>
                 
                 <p><?php echo $row1['dis_msg'];?></p>
                 <p><?php echo $row1['dis_date']?></p>
                 <!-- <div class="card-footer">
               <a href="javascript:void();" class="card-link">Add Comment</a>
               <a href="javascript:void();" class="card-link">Reply</a>
            </div> -->
             </div>
         </div>
        </div>
    </div>
        <?php
      }}}
      ?>
