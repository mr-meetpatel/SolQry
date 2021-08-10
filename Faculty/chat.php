<?php
session_start();
include '../conn/conn.php';
if(isset($_GET['id']))
{
    mysqli_query($con,"update query_master set is_seen='2' where q_id='{$_GET['id']}'");
    echo "<script>window.location='chat.php';</script>";
}
if(!isset($_GET['sid']))
{
    header("location:student-list.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="bootstrap.css">

        
        <script src="bootstrap.min.js" type="text/javascript"></script>
        
        <script src="bootstrap.js" type="text/javascript"></script>
        <script src="ajax.js" type="text/javascript"></script>
        <script src="jquery-3.4.1.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}





.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass
{
    height: 350px;
    overflow-y: scroll;
}

.chat-with{
  
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;

}
</style>
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="bootstrap.css">
       
        <script src="bootstrap.min.js" type="text/javascript"></script>
        
        <script src="bootstrap.js" type="text/javascript"></script>
        <script src="ajax.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="jquery-3.4.1.js"></script>
        <script src="jquery.form.js" type="text/javascript"></script>
        
</head>

<body class="container">

    <h2 class="text-center chat-with"><?php
    $fname= mysqli_query($con,"select stu_name from student_master where stu_id='{$_GET['sid']}'");
    $fnamedata= mysqli_fetch_array($fname);
    echo $fnamedata['stu_name'];
    ?></h2>
<center><a href="student-list.php">back</a></center>


<div class="anyClass">

</div>

<form method="post">
    <textarea class="form-control" placeholder="Enter Chat" name="txt"  id="txt1" required=""></textarea><br>
    
    
    <input type="submit" class="btn btn-primary"  name="send" value="send">
</form>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="ajax.js"></script>-->

<script>
    //check for new msg
    
    setInterval(function checkMsg()
    {
       
        $.post("checkmsg.php",{
          faculty:"<?php echo $_SESSION['fid']?>",
          stu:"<?php echo $_GET['sid']?>"
        },
        function (data,status)
        {
         
            document.getElementsByClassName('anyClass')[0].innerHTML=data;
      });
                 
    
    },1500);
    
    
   
$("#btn").click(function(){
    var usermsg=$("#txt1").val();
    
    /*$.post("chatmsg.php",{msg:usermsg,
          room:"<?php //echo $_SESSION['room_name']?>"
        },
        function (data,status)
        {
            
            document.getElementsByClassName('anyClass')[0].innerHTML=data;
      });*/
   
   $("#txt1").val("");
   
    return false;
});


$("#txt1").focus(function(){
    
    var is_typing=1;
    $.ajax({
            url:"update_typing_status.php",
            method:"POST",
            data:{is_typing:is_typing},
            success:function()
            {
                
            }
            
        });
  });
$("#txt1").blur(function(){
    
    var is_typing=0;
    $.ajax({
            url:"update_typing_status.php",
            method:"POST",
            data:{is_typing:is_typing},
            success:function()
            {
                
            }
            
        });
});
</script>
<?php

if(isset($_POST['send']))
{
  $from=$_SESSION['fid'];
  $to=$_GET['sid'];
 
  $msg=$_POST['txt'];
  //$room=$_SESSION['room_name'];
  $sql=mysqli_query($con,"INSERT INTO `query_master` ( `from_u_id`, `msg_from`, `to_u_id`, `msg_to`, `query`) VALUES ( '2', '{$from}', '3', '{$to}', '{$msg}');") or die(mysqli_error($con));
}

?>
</body>
</html>
