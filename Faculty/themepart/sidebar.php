<?php
$name=mysqli_query($con,"select * from faculty_master where f_id='{$_SESSION['fid']}'") or die("error");
$namedata= mysqli_fetch_array($name);
?>
<div id="sidebar-wrapper" class="bg-theme bg-theme1" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo" style="color:white;font-size: 24px;letter-spacing:0.15em;text-shadow:2px 2px 4px #000000">
      <b>SolQry</b>
         <!-- <img src="../assets/images/logo-final.PNG" class="logo-icon" alt="logo icon" style="width: 50px;"> -->
       
     
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><?php
      if($namedata['f_img'])
      {
          echo '<img class="mr-3 side-user-img" src="$namedata[f_img]" alt="user avatar">';
      }
      else
      {
         echo '<img class="mr-3 side-user-img" src="../assets/images/user.png" alt="user avatar">';
      }
      
      ?></div>
        
       <div class="media-body">
       <h6 class="side-user-name"><?php echo $namedata['f_name'];?></h6>
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
         
            <li><a href="./calendar.php"><i class="zmdi zmdi-long-arrow-right"></i>Calender</a></li>
          <li><a href="update.php"><i class="zmdi zmdi-long-arrow-right"></i> Update Events</a></li>
          <li><a href="display.php"><i class="zmdi zmdi-long-arrow-right"></i> Display All Events</a></li>
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
          <i class="zmdi zmdi-card-travel fa fa-child"></i>
          <span>Student</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="dis-student.php"><i class="zmdi zmdi-long-arrow-right"></i>View Student</a></li>
        <!--  <li><a href="display-timetable.php"><i class="zmdi zmdi-long-arrow-right"></i>Student Grade History</a></li>-->
        </ul>
      </li>
      
    <!--  <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-tasks"></i>
          <span>Timetable</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="display-timetable.php"><i class="zmdi zmdi-long-arrow-right"></i> Display Timetable</a></li>
          
        </ul>
      </li>-->
      
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-folder-open-o"></i>
          <span>Documents</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="upload-document.php"><i class="zmdi zmdi-long-arrow-right"></i> Upload Documents</a></li>
          <li><a href="dis-file.php"><i class="zmdi zmdi-long-arrow-right"></i> View Documents</a></li>
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
         <li><a href="dis-deleted-notification.php"><i class="zmdi zmdi-long-arrow-right"></i>Display Deleted Notification</a></li>   
         
         
        </ul>
      </li>
      
     <!-- <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-file-code-o"></i>
          <span>Online Exams</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="exam.php"><i class="zmdi zmdi-long-arrow-right"></i> prepare Question</a></li>
          <li><a href="check-exam.php"><i class="zmdi zmdi-long-arrow-right"></i> check exam</a></li>
          <li><a href="view-marks.php"><i class="zmdi zmdi-long-arrow-right"></i> View Marks</a></li>
        </ul>
      </li>-->
      
      <!--<li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-percent"></i>
          <span>Marks</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="upload-document.php"><i class="zmdi zmdi-long-arrow-right"></i> Upload Documents</a></li>
          <li><a href="view-documents.php"><i class="zmdi zmdi-long-arrow-right"></i> View Documents</a></li>
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
      </li>-->
      
      <!--<li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-commenting"></i>
          <span>Comments</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="add-comment.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Comments for Students</a></li>
         
        </ul>
      </li>-->
      
     <!--<li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel fa fa-comment"></i>
          <span>Discussion Forum</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="add-query.php"><i class="zmdi zmdi-long-arrow-right"></i> Add Query</a></li>
          <li><a href="dis-query.php"><i class="zmdi zmdi-long-arrow-right"></i>Display Query</a></li>
         
        </ul>
      </li>-->
      <li>
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
          <i class="zmdi zmdi-card-travel fa fa-comments"></i>
          <span>Chat</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
         
          <li><a href="student-list.php"><i class="zmdi zmdi-long-arrow-right"></i> Student list</a></li>
         
        </ul>
      </li>
      
       <!--<li>
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