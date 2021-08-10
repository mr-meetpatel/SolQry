
<?php

session_start();

if(isset($_SESSION['aid']))
{
    session_destroy();
}


    header("location:../login.php");

?>

  
