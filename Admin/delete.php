<?php
$con= mysqli_connect("localhost", "root", "", "oms");

if(isset($_POST['id']))
{
    mysqli_query($con,"delete from events where  id='{$_POST['id']}'");
}
