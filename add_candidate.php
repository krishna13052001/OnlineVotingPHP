<?php
session_start();
include "includes/connection.php";

if(isset($_POST['Submit'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $p_id=$_POST['position'];
    $str=explode('@',$email);
    if($str[1]==="iiitkottayam.ac.in"){
        $s=substr($str[0],-4,-1).substr($str[0],-1);
        if($s=="8bcs"){
            if($pass==$cpass){
                $sql="SELECT * FROM candidates where mail='$email'";
                $query = $conn->query($sql);
                if($query->num_rows < 1){
                    $sql="INSERT INTO candidates (position_id,firstname,lastname,email,password,photo) values('$p_id','$fname','$lname','$email','$pass','p_name')";
                    if($conn->query($sql)){
                        $_SESSION['success']="Sucessfully registed";
                    } else{
                        $_SESSION['error'] = $conn->error;
                    }
                }
                else {
                    $_SESSION['error'] = 'You can register only once';
                }
            } else{
                $_SESSION['error']="Password and current should be same";
            }
        } else{
            echo $s."<br>";
            echo $str[0];
            $_SESSION['error']=$str[0];
        }
    } else {
        $_SESSION['error']=$str[1];
    }
}
  header('location: index_candidate.php');
?>