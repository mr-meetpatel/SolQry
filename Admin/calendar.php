<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
date_default_timezone_set("Asia/Calcutta");
session_start();
if(!isset($_SESSION['aid'])){
    header("location:logout.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script>
        $(document).ready(function (){
            var calendar=$("#calendar").fullCalendar({
                editable:true,
                header:{
                    left:"prev,next today",
                    center:'title',
                    
                 },
                events:'load.php',//to load event data on calender
                selectable:true,
                selectHelper:true,
                    
                //insert event
                select: function(start, end, allDay)
                {
                 var title = prompt("Enter Event Title");
                 if(title)
                 {
                  var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                  var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                  $.ajax({
                   url:"insert.php",
                   type:"POST",
                   data:{title:title, start:start, end:end,fid:<?php echo $_SESSION['aid'];?>,bid:<?php echo $_SESSION['b_id'];?>},
                   success:function()
                   {
                    calendar.fullCalendar('refetchEvents');
                    alert("Added Successfully");
                    window.location='update.php';
                   }
                  })
                 }
                },
                
                
                        
                

                eventClick:function(event)
                {
                    swal({
                    title:"Are You Sure You Want To Delete?",
                    text:"Once Deleted You Cannot Restore It!",
                    icon:"warning",
                    buttons:true,
                    dangerMode: true,
                })
                .then((x)=>{
                   if(x){
                    
                  var id = event.id;
                  $.ajax({
                   url:"delete.php",
                   type:"POST",
                   data:{id:id},
                   success:function()
                   {
                    calendar.fullCalendar('refetchEvents');
                    swal("Event Deleted!!", {
                         icon: "success",
                       });
                   }
                  })
                   } 
                   else{
                    swal("Event Data is Safe!"); 
                   }
                });
                 
                
                 
                },

            });
        });
        </script>
        <script src="../assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
    </head>
    <body>
      <br />
      <h2 align="center"><a href="#">Calender</a></h2><br><center><a href="update.php">Edit</a> || <a href="index.php">Go to home</a>  </center>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
    </body>
</html>
