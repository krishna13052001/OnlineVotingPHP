<header class="main-header">
  <nav class="navbar navbar-static-top" >
    <div class="container" >
      <div class="navbar-header">
        <img src="images/logo.jpg" class="navbar-brand" width="100px;" height="100px">
        <a href="https://iiitkottayam.ac.in/#!/home" target="_blank" class="navbar-brand"><b>IIIT Kottayam</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="user user-menu" >
            <a href="">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" class="user-image" alt="User Image" style="color: black;">
              <span class="hidden-xs" style="color: black;"><?php echo $voter['fname'].' '.$voter['lname']; ?></span>
            </a>
          </li>
          <li ><a href="logout.php" style="color: black;"><i class="fa fa-sign-out"></i> LOGOUT</a></li>  
        </ul>
      </div>
    </div>
  </nav>
</header>