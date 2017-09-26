<!DOCTYPE html>
<html>
<head>
	<title>welcome</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <h1 class="text-center">Thank you for Login</h1>
  <button type="button"  class="btn btn-info btn-sm">logout</button>
</body>
<script type="text/javascript">
	$(document).ready(function(){
       $('button').click(function(){
          window.location.href="login.php";
       });
	});
</script>
</html>