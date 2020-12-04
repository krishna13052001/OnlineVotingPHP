<?php
    session_start();

    if(isset($_SESSION['candidate'])){
      header('location: candidate_home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="dist/css/form.css">
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
      <b>IIIT Kottayam Online Voting System</b>
    </div>
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center mt20' style='padding-left:5px;'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
    <div class="box">
    <h2>Candidate Login</h2>
    <form method="POST" action="login.php">
          <div class="inputBox">
          <input type="email"  name="email" required="" autocomplete="off">
        <label> College Gmail</label>
      </div>
      <div class="inputBox">
          <input type="password"  name="password" required="" autocomplete="off"><br>
        <label> Password</label>
      </div>
      <input type="submit" value="Login" name="login" class="sub">
      <br><br>
      <p><a class="one" href="candidate.php" target="_blank">New Candidate..Register here</a></p>
    </form>
  </div>
    
</div>
  
<?php include 'includes/scripts.php' ?>
</body>

<footer>
</div>
</html>