<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>IIIT Kottayam Online Voting System</b>
  	</div>
  
  	<div class="box">
    <h2>Admin Login</h2>
    <form method="POST" action="login.php">
          <div class="inputBox">
          <input type="text"  name="username" required="" autocomplete="off">
        <label>User Name</label>
      </div>
      <div class="inputBox">
          <input type="password"  name="password" required="" autocomplete="off"><br>
        <label> Password</label>
      </div>
      <input type="submit" value="Login" name="login" class="sub">

    </form>
  </div>

  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>