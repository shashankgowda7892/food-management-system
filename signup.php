<?php

session_start();
include 'database/db.php';
if(isset($_POST['submit'])) {


  $username = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];


  $check_username= mysqli_query($conn, "SELECT username FROM user where username = '".$username."' ");
	$check_email = mysqli_query($conn, "SELECT email FROM user where email = '".$email."' ");
		
	if($password != $cpassword){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
     else{
       
	 
      $mql = "INSERT INTO user (username,fname,lname,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."')";
      mysqli_query($conn, $mql);
      
         header("refresh:0.1;url=login.php");
        }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      display: flex;
      justify-content: cenTer;
      align-items: center;
      margin-top: 50px;
      background-color: beig;
      background-image: url("images/maker1.jpg");
      background-size: cover;
    }

    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      max-width: 400px;
      padding: 20px;
      border-radius: 20px;
      position: relative;
      background-color: #1a1a1a;
      color: #fff;
      border: 1px solid #333;
    }

    .title {
      font-size: 28px;
      font-weight: 600;
      letter-spacing: -1px;
      position: relative;
      display: flex;
      align-items: center;
      padding-left: 30px;
      color: #00bfff;
    }

    .title::before {
      width: 18px;
      height: 18px;
    }

    .title::after {
      width: 18px;
      height: 18px;
      animation: pulse 1s linear infinite;
    }

    .title::before,
    .title::after {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      border-radius: 50%;
      left: 0px;
      background-color: #00bfff;
    }

    .message,
    .signin {
      font-size: 14.5px;
      color: rgba(255, 255, 255, 0.7);
    }

    .signin {
      text-align: center;
    }

    .signin a:hover {
      text-decoration: underline royalblue;
    }

    .signin a {
      color: #00bfff;
    }

    .flex {
      display: flex;
      width: 100%;
      gap: 6px;
    }

    .form label {
      position: relative;
    }

    .form label .input {
      background-color: #333;
      color: #fff;
      width: 100%;
      padding: 20px 05px 05px 10px;
      outline: 0;
      border: 1px solid rgba(105, 105, 105, 0.397);
      border-radius: 10px;
    }

    .form label .input+span {
      color: rgba(255, 255, 255, 0.5);
      position: absolute;
      left: 10px;
      top: 0px;
      font-size: 0.9em;
      cursor: text;
      transition: 0.3s ease;
    }

    .form label .input:placeholder-shown+span {
      top: 12.5px;
      font-size: 0.9em;
    }

    .form label .input:focus+span,
    .form label .input:valid+span {
      color: #00bfff;
      top: 0px;
      font-size: 0.7em;
      font-weight: 600;
    }

    .input {
      font-size: medium;
    }

    .submit {
      border: none;
      outline: none;
      text-decoration: none;
      padding: 10px;
      border-radius: 10px;
      color: #fff;
      font-size: 16px;
      transform: .3s ease;
      background-color: #00bfff;
    }

    .submit:hover {
      background-color: #00bfff96;
    }

    @keyframes pulse {
      from {
        transform: scale(0.9);
        opacity: 1;
      }

      to {
        transform: scale(1.8);
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <form class="form" method="post">
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
    <div class="flex">
      <label>
        <input class="input" name="fname" type="text" required>
        <span>Firstname</span>
      </label>

      <label>
        <input class="input" name="lname" type="text" required>
        <span>Lastname</span>
      </label>
    </div>

    <label>
      <input class="input" name="username" type="text" required>
      <span>Username</span>
    </label>
    <label>
      <input class="input" name="phone" type="text" required>
      <span>Phone </span>
    </label>
    <label>
      <input class="input" name="email" type="email" required>
      <span>Email</span>
    </label>
    <label>
      <input class="input" name="password" type="password" required>
      <span>Password</span>
    </label>
    <label>
      <input class="input" name="cpassword" type="password" required>
      <span>Confirm Password</span>
    </label>
    <label>
      <input class="input" name="address" type="text " required>
      <span>Address</span>
    </label>
    <button class="submit" type="submit" name="submit">Submit</button>
    <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
  </form>
</body>

</html>