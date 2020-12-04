<?php
session_start();
include "includes/connection.php";

if(isset($_POST['Submit'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $semester=$_POST['sno'];
    $roll=$_POST['rno'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $str=explode('@',$email);
    if($str[1]==="iiitkottayam.ac.in"){
        $s=substr($str[0],-4,-1).substr($str[0],-1);
        if($s=="8bcs" || $s=="2019" || $s=="2016"  ){
            if($pass==$cpass){
                $sql="SELECT * FROM voters where mail='$email'";
                $query = $conn->query($sql);
                if($query->num_rows < 1){
                    $sql="INSERT INTO voters (fname,lname,mail,password,semester,rollno,photo) values('$fname','$lname','$email','$pass','$semester','$roll','p_name')";
                    if($conn->query($sql)){
                        $_SESSION['success']="Sucessfully registed";
                        header('location: register.php');                    
                    } else{
                        $_SESSION['error'] = $conn->error;
                        header('location: index.php');
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
  header('location: register.php');
?>