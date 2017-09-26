<?php
 
 $username ="";
 $password ="";
 if(isset($_POST['submit']))
 {
 	$username=$_POST['username'];
 	$password=$_POST['password'];
  if($username == 'admin' && $password == 'admin')
  {
      session_start();
      $_SESSION['user'] =1;
     if($_SESSION['user'] == 1)
     {
        header("location:data.php");
     }
     else
     {
       header("location:index.php");
     }
  }
 }  	
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <style type="text/css">
 	 body {
    background-image: url("green.jpg");
   } 
   .col-lg-12
   {
   	margin-top:10%;
   }
   .panel
   {
   	padding:50px 25px 50px 25px;
   	border-radius: 0 !important;
   }
   .btn
   {
   	border-radius: 0 !important;
   	padding-top: 8px !important;
   	padding-bottom: 8px !important;
   }
   #head
   {
   	 font-style: italic;

   }
   .border
   {
    border-color: green !important;
   }
   .green
   {
   	color:green;
   }
 </style>
</head>
<body>
   <div class="col-lg-12">
   	 <div class="col-lg-4">
   	 </div>
   	 <div class="col-lg-4">
   	    <div class="panel">
   	       <h3 id='head' class="text-center">Login</h3>
            <form action="<?php  echo $_SERVER['PHP_SELF'];?>" method="POST">
	            <div class="form-group">
                   <label for='username'></label>   
                   <input type="text" class="form-control" name="username" id='username' placeholder="Enter username" />      
	               <p id="nameerror"></p>
	            </div>
	            <div class="form-group">
                   <label for='password'></label> 
	               <input type="password" class="form-control" name="password" id='password' placeholder="Enter Password" />
	               <p id="passerror"></p>
	            </div>
	            <div class="form-group">
                   <input type="submit"  class="btn btn-success btn-block" id="submit" name="submit" value="login"/> 
	            </div>
            </form>
   	    </div>
   	 </div>
   	 <div class="col-lg-4">
   	 </div> 
   </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
  	 $("#submit").click(function(){
  	    var user =$("#username").val();
  	    var pass =$("#password").val();
  	    // var nameReg  = new RegExp(/^[A-Z]+[a-zA-Z]*$/);
        var lastnamereg = new RegExp(/^[A-Za-z]+$/);
         admin = 'admin';
         adminpass ='admin';
        if(user == "") 
        {
          
             $("#nameerror").html("please enter username");
             $("#nameerror").addClass('green');
             $("#username").addClass('border');
             return false;

        }
        else if(!lastnamereg.test(user))
        {

        	   $("#nameerror").html("please enter valid username");
             $("#nameerror").addClass('green');
             $("#username").addClass('border');
             return false;
        }
        else if(user != 'admin')
        {
              $("#nameerror").html("please enter valid username");
             $("#nameerror").addClass('green');
             $("#username").addClass('border');
             return false;
        }
        else 
        {    
             $("#nameerror").html('');
             $("#username").removeClass('border'); 

        }	
        
        if(pass == "")
        {
             $("#passerror").html("please enter password");
             $("#passerror").addClass('green');
             $("#password").addClass('border');
             return false;
        }
        else if(!lastnamereg.test(pass))
        {
        	   $("#passerror").html("please enter valid password");
        	   $("#passerror").addClass('green');
             $("#password").addClass('border');
        	   return false;
        }
        else if(pass != 'admin')
        {
             $("#passerror").html("please enter valid password");
             $("#passerror").addClass('green');
             $("#password").addClass('border');
             return false;

        }
        else
        {
           $("#passerror").html(''); 
           $("#password").removeClass('border');
           
        }
         // if(user !="" && user == "admin" && pass != "" && pass =="admin")
         // {
         //    window.location.replace="data.php";
         // } 
         // else
         // {
         //   return false;
         // }
  });

});
</script>
</html>