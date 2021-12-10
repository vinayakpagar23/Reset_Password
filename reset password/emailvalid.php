<?php
include "database.php";



if(isset($_POST['Email']))
{
    $sql_query= "SELECT * FROM register WHERE email='".$_POST['Email']."'";
    $result=mysqli_query($conn,$sql_query);
        
      echo  mysqli_num_rows($result);
        
}

?>