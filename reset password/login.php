
<?php

include "database.php";
$msg='';

if(isset($_POST['login'])){
    $email=$_POST['Email'];
    $password=$_POST['pwd'];
    $sql="SELECT * FROM register WHERE email='$email' and password='$password'";
    $run=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($run);
    if($row){
        echo "<script>window.open('home.php?')</script>";
    }
    else{
        $msg="<span class='text-danger'>incorrect password</span>";
    }
}

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"> </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="./css/style.css">



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
						$('#availability').html("<span class='text-info'>Email Available</span>");
						$('#login').attr("disabled",false);
					   }
					   else{
						$('#availability').html("<span class='text-danger'>Email Does Not Exist</span>");
						$('#login').attr("disabled",true);
					   }
                }
            });
 });
});
</script>

    
</head>
<body>

<div class="container">
<h2 class=" text-center pt-5">Login Form</h2>
<div class="row" >
<div class="col-md-5 m-auto " id="div1">
<form   method="POST">
  
<div class="form-group">
  <label for="Email"><b> User Email</b></label><br>
  <input type="text" class="" name="Email" id="Email" placeholder="Enter Your Email" Required><br>
  <span id="availability"></span>
</div>
<div class="form-group">
  <label for="pwd"><b> Password</b></label><br>
  <input type="password" class="" name="pwd" id="pwd" placeholder="Enter Your password" Required>
  
</div>
<p class="text-center text-danger"><?php echo $msg;?></p>


     <div id="button">
    <a ><input type="Submit" value="Login" id="login"  name="login" class="btn btn-primary" role="button"> </a>
  </div>
  </form>

  <Div>
  Not Registered <a href="signup.php">click here</a>
  </Div>
  <div style="padding-left:110px padding-top:10px;">
  <a href="resetpass.php">Forgot Pasword</a></div>

</div>
</div>
</div>
</body>
</html>