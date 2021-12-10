<?php

include "database.php";
 $msg=$pass_err='';
 
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['Email'];
    $pwd=$_POST['pwd'];
    $rpwd=$_POST['rpwd'];

    if($pwd !== $rpwd){
      $pass_err ="Password Mismatch";
    }else{
    $sql="INSERT INTO register(name,email,password)VALUES ('$name','$email','$pwd')";
    $run=mysqli_query($conn,$sql);
  
    if($run){
     $msg="<span class='text-success'>Registartion Successfully</span>";
     header("location:login.php");
    }
   }   
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"> </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="./css/style.css">

    <style>
    
    </style>

<script>

$(document).ready(function(){

 $("#Email").blur(function(){
var AEmail=$(this).val();

$.ajax({
                      url:"emailvalid.php",
                      method:"POST",
                    data:{Email:AEmail},
                  
                   success:function(dt){
					   if(dt !='0')
					   {
						$('#availability').html("<span class='text-danger'>Username Not Available</span>");
						$('#register').attr("disabled",true);
					   }
					   else{
						$('#availability').html("<span class='text-info'>Username  Available</span>");
						$('#register').attr("disabled",false);
					   }
                }
            });
 });
});
</script>
</head>
<body>
<div class="container">
<h2 class=" text-center pt-5">Registration Form</h2>
<div class="row">
<div class="col-md-5 m-auto " id="div1">
<form   method="POST">
  <div class="form-group">
  <label for="name"><b>User name</b></label><br>
  <input type="text" name="name" id="name" placeholder="Enter Your name"  Required>
  </div>
<div class="form-group">
  <label for="Email"><b> User Email</b></label><br>
  <input type="text" class="" name="Email" id="Email" placeholder="Enter Your Email" Required><br>
  <span id="availability"></span>
</div>
<div class="form-group">
  <label for="pwd"><b> Password</b></label><br>
  <input type="password" class="" name="pwd" id="pwd" placeholder="Enter Your password" Required>
  
</div>

<div class="form-group">
  <label for="rpwd"><b> Confirm Your Password</b></label><br>
  <input type="password" class="" name="rpwd" id="rpwd" placeholder="Enter Your password" Required><br>
  <span class="text-danger"><?php echo $pass_err ?></span>
</div>
<p class="text-center text-danger"><?php echo $msg;?></p>

     <div id="button">
    <a ><input type="Submit"  id="register"  name="submit" class="btn btn-primary" role="button"> </a>
  </div>
  </form>
  <div>
  Already Registered <a href="login.php">click here</a></div>

</div>
</div>
</div>
    
</body>
</html>