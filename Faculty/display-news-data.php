<?php

 include '../conn/conn.php';
 session_start();
 $data="";
 $from=mysqli_query($con,"SELECT
    `news_master`.`news_id`
    , `user_type_master`.`u_name`
    , `admin_master`.`admin_name`
    , `admin_master`.`admin_img`
    , `news_master`.`u_id`
    , `news_master`.`b_id`
    , `news_master`.`news`
    , `news_master`.`news_expire_date`
    , `news_master`.`status`
FROM
    `news_master`
    INNER JOIN `admin_master` 
        ON (`news_master`.`from_id` = `admin_master`.`admin_id`)
    INNER JOIN `user_type_master` 
        ON (`news_master`.`from_u_id` = `user_type_master`.`u_id`) where `news_master`.`b_id`='{$_SESSION['fb_id']}' and `news_master`.`u_id`='2' ");
 $i=1;
        while($fromdata= mysqli_fetch_array($from))
 {
  if(strtotime(date("Y-m-d"))>strtotime($fromdata['news_expire_date']))
  {
      mysqli_query($con, "update news_master set status=0 where news_id='{$fromdata['news_id']}'");
  }
    if($fromdata['status']==1)
    {
            $data.= "<li class='media my-4'>";
         if($fromdata['admin_img'])
         {
             $data.="<img class='mr-3 rounded' src='../admin/$fromdata[admin_img]' alt='user avatar' width='100px' hieght='100px'/>";
         }
 else {
     $data.="<img class='mr-3 rounded' src='../assets/images/user.png' alt='user avatar' width='100px' hieght='100px'/>";
 }
     $data.="<div class='media-body'>";
     $data.="<h5 class='mt-0 mb-1'>=>From:{$fromdata['admin_name']}[HOD]</h5>";
     $data.="<span class='text-success'>{$fromdata['news']}</span>";
     $data.="</div>";
     $data.="</li>";
 }

 echo $data;
 }

 ?>

