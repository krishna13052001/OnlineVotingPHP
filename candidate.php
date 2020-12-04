<?php
    session_start();

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; 
      include 'includes/connection.php';
?>
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
    <h2>Student Login</h2>
    <form method="POST" action="add_candidate.php">
      <div class="inputBox">
        <input type="text"  name="fname" required="" autocomplete="off">
      <label>Enter First Name</label>
        </div>
        <div class="inputBox">
          <input type="text"  name="lname" required="" autocomplete="off">
          <label>Enter Last Name</label>
        </div>
        <div class="inputBox">
          <input type="email"  name="email" required="" autocomplete="off">
          <label> College Gmail</label>
        </div>
        <div class="inputBox">
          <input type="password"  name="password" required="" autocomplete="off"><br>
          <label> Password</label>
        </div>
        <div class="inputBox">
        <input type="password"  name="cpassword" required="" autocomplete="off">
      <label>Confirm your Password</label>
    </div>
    <span style="color: white;"><label>Club name</label></span>
      <select  id="position" name="position" required>
          <option value="" selected >- select - </option>
          <?php 
            $sql="SELECT * FROM clubs";
            $query=$conn->query($sql);
            while($row=$query->fetch_assoc()){
              echo "<option  value='".$row['id']."'>".$row['club_name']."</option>";
            }
          ?>
          
    <span style="color: white;"><label>Choose you photo</label><br>
    <input type="file" for="photo" name="photo" required="" autocomplete="off"></span>

    <input type="submit" value="submit" name="Submit" class="sub">
    </form>
    <br>
      <p><a class="one" href="index_candidate.php" target="_blank">After Registration you can login here</a></p>
  </div>
    
</div>
  
<?php include 'includes/scripts.php' ?>
</body>

<footer>
</div>
</html>