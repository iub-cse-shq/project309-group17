<?php session_start(); ?>
<?php
	if(count($_SESSION)>0){
		header('Location: display.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/finalstyle.css?v=<?php echo time(); ?>">
	<style>
		body {
		  margin: 0;
		  padding: 0;
		  background-color: #17a2b8;
		  height: 100vh;
		}
		#login .container #login-row #login-column #login-box {
		  margin-top: 120px;
		  max-width: 600px;
		  height: 320px;
		  border: 1px solid #9C9C9C;
		  background-color: #EAEAEA;
		}
		#login .container #login-row #login-column #login-box #login-form {
		  padding: 20px;
		}
		#login .container #login-row #login-column #login-box #login-form #register-link {
		  margin-top: -85px;
		}
	</style>

</head>
<body>
	<div id="login">
		<div class="container">
	        <div id="login-row" class="row justify-content-center align-items-center">
	            <div id="login-column" class="col-md-6">
	                <div id="login-box" class="col-md-12">
	                    <form action="login.php" method="post" class="form-control">
	                        <h3 class="text-center text-info">Login</h3>
	                        <?php if (isset($_GET['error'])) { ?>
				     			<p class="error"><?php echo $_GET['error']; ?></p>
				     		<?php } ?>
	                        <div class="form-group">
	                            <label for="uname" class="text-info">Username:</label><br>
	                            <input type="text" name="uname" id="uname" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <label for="password" class="text-info">Password:</label><br>
	                            <input type="password" name="password" id="password" class="form-control">
	                        </div>
	                        <div class="form-group">
	                            <input type="submit" class="btn btn-info btn-md" value="Login">
	                        </div>
	                        <div id="register-link" class="text-right">
	                            <a href="index.php" class="text-info">Go to Home</a>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	

</body>
</html>