<?php
$name=mysqli_query($con,"select * from admin_master where admin_id='{$_SESSION['aid']}'") or die("error");
$namedata= mysqli_fetch_array($name);
?>
<div id="sidebar-wrapper" class="bg-theme bg-theme1" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo" style="color:white;font-size: 24px;letter-spacing:0.15em;text-shadow:2px 2px 4px #000000">
         <b> SolQry</b>
         <!-- <img src="../assets/images/logo-final.png" class="logo-icon" alt="logo icon" style="width: 50px;"> -->
       
     
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar">
          <?php if($namedata['admin_img'])
          {
              echo "<img class='mr-3 side-user-img' src='$namedata[admin_img]'></div>";
          }
          else
          {
              echo "<img class='mr-3 side-user-img' src='../assets/images/user.png'></div>";
          }
              ?>
          
       <div class="media-body">
       <h6 class="side-user-name"><?php echo $namedata['admin_name'];?></h6>
      </div>
       </div>
        
        
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="profile.php"><i class="icon-user"></i>  My Profile</a></li>
            
            <li><a href="logout.php"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard fa fa-dashboard"></i> <span>Dashboard</span><i class="fa fa-angle-left pull-right "></i>
        </a>
		<ul class="sidebar-submenu" >
		  <li><a href="index.php"><i class="zmdi zmdi-long-arrow-right "></i> Index</a></li>
          
		</ul>
      </li>
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-calendar"></i>
          <span>Calender</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="calendar.php"><i class="zmdi zmdi-long-arrow-right"></i>Calender</a></li>
          <li><a href="dis-event.php"><i class="zmdi zmdi-long-arrow-right"></i> Display Events</a></li>
          <li><a href="update.php"><i class="zmdi zmdi-long-arrow-right"></i> Update Events</a></li>
         
        </ul>
      </li>
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-calendar-check-o"></i>
          <span>Appointments</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="dis-appointments.php"><i class="zmdi zmdi-long-arrow-right"></i> Display Appointments</a></li>
          
        </ul>
      </li>
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-laptop"></i>
          <span>Faculty</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
           <li><a href="add-faculty.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Faculty</a></li>
          <li><a href="dis-faculty.php"><i class="zmdi zmdi-long-arrow-right"></i> View Faculty</a></li>
         <li><a href="dis-deleted-faculty.php"><i class="zmdi zmdi-long-arrow-right"></i> Deleted  Faculty</a></li> 
        </ul>
      </li>
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-child"></i>
          <span>Student</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="stu-reg.php"><i class="zmdi zmdi-long-arrow-right"></i>Add Student</a></li>
          <li><a href="dis-student.php"><i class="zmdi zmdi-long-arrow-right"></i>View Student</a></li>
          <li><a href="dis-deleted-student.php"><i class="zmdi zmdi-long-arrow-right"></i>View Deleted Student</a></li>
          <!-- <li><a href="display-timetable.php"><i class="zmdi zmdi-long-arrow-right"></i>Student Grade History</a></li> -->
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-table"></i>
          <span>Subject</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
       
          <li><a href="add-subject.php"><i class="zmdi zmdi-long-arrow-right"></i>Add Subject</a></li>
          <li><a href="dis-subject.php"><i class="zmdi zmdi-long-arrow-right"></i>View Subject</a></li>
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-table"></i>
          <span>Subject Allocation</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
       
          <li><a href="add-sub-allocation.php"><i class="zmdi zmdi-long-arrow-right"></i>Add Allocation</a></li>
          <li><a href="dis-sub-allocation.php"><i class="zmdi zmdi-long-arrow-right"></i>View Allocation</a></li>
        </ul>
      </li>
     <!-- <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-table"></i>
          <span>Timetable</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
       
          <li><a href="add-timetable.php"><i class="zmdi zmdi-long-arrow-right"></i>Add Timetable</a></li>
          <li><a href="view-documents.php"><i class="zmdi zmdi-long-arrow-right"></i>View Timetable</a></li>
        </ul>
      </li>-->
      
      
      
    <!--  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-bar-chart"></i>
          <span>Attendances</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="take-attendances.php"><i class="zmdi zmdi-long-arrow-right"></i> Take Attendances</a></li>
          <li><a href="view-attendances.php"><i class="zmdi zmdi-long-arrow-right"></i> View Attendances</a></li>
        </ul>
      </li>
      
     <li>-->
       <!-- <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-folder-open-o"></i>
          <span>Documents</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="documents-uploads.php"><i class="zmdi zmdi-long-arrow-right"></i> Upload Documents</a></li>
          <li><a href="view-documents.php"><i class="zmdi zmdi-long-arrow-right"></i> View Documents</a></li>
        </ul>
      </li>-->
      
      <li>
      <!--  <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-exam"></i>
          <span>Exam</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         <li><a href="add-query.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Timetable</a></li>
          <li><a href="discussion.php"><i class="zmdi zmdi-long-arrow-right"></i> View Timetable</a></li>
         
        </ul>
      </li>
      <li>-->
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-newspaper-o"></i>
          <span>News Section</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         <li><a href="add-news.php"><i class="zmdi zmdi-long-arrow-right"></i>Add News</a></li>
          
          
         
        </ul>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-bell"></i>
          <span>Notification</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          
         <li><a href="dis-notifications.php"><i class="zmdi zmdi-long-arrow-right"></i>Display Notification</a></li>   
         
          
         
        </ul>
      </li>
      
     <!-- <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-commenting"></i>
          <span>Comments</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="add-comment.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Comments for Students</a></li>
         
        </ul>
      </li>-->
      
     <!-- <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-comment"></i>
          <span>Discussion Forum</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="add-query.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Query</a></li>
          <li><a href="discussion.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Comments</a></li>
         
        </ul>
      </li>-->
      
    <!--  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-comments"></i>
          <span>Chat</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="chat-people.php"><i class="zmdi zmdi-long-arrow-right"></i> list</a></li>
         
        </ul>
      </li>-->
      
     <!--  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-share"></i>
          <span>References</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
             <li><a href="add-references.php"><i class="zmdi zmdi-long-arrow-right"></i>Add references</a></li>
         <li><a href="display-references.php"><i class="zmdi zmdi-long-arrow-right"></i>Display references</a></li>
          
         
        </ul>
      </li>-->
      
      
    </ul>
   
   </div>