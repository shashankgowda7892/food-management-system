<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include 'database/db.php';
?>
<?php
    if(empty($_SESSION["user_id"]))
{
	header('location:index.php');
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .welcome h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .welcome p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }

        .profile-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #logout-btn  {
            background-color: #dc3545;
            margin-left: auto;
            
            & a{
                text-decoration: none;
                color: #fff;
            }
        }

        .button-group {
            margin-top: 20px;
        }

        #edit-btn {
            background-color: #ffc107;
        }
    </style>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editBtn = document.getElementById('edit-btn');
            var saveBtn = document.getElementById('save-btn');
            var cancelBtn = document.getElementById('cancel-btn');
            var originalValues = {};

            saveBtn.style.display = 'none';
            cancelBtn.style.display = 'none';

            editBtn.addEventListener('click', function (e) {
                e.preventDefault();
                var inputs = document.querySelectorAll('.input-group input');
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].removeAttribute('disabled');
                    originalValues[inputs[i].id] = inputs[i].value;
                }
                editBtn.style.display = 'none';
                saveBtn.style.display = 'inline-block';
                cancelBtn.style.display = 'inline-block';
            });

            cancelBtn.addEventListener('click', function (e) {
                e.preventDefault();
                var inputs = document.querySelectorAll('.input-group input');
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].setAttribute('disabled', 'disabled');
                    inputs[i].value = originalValues[inputs[i].id];
                }
                saveBtn.style.display = 'none';
                cancelBtn.style.display = 'none';
                editBtn.style.display = 'inline-block';
            });
        });
    </script>
</body>
</html>
</head>

<body>
<?php
           $query_res = mysqli_query($conn, "select * from user where u_id = $_SESSION[user_id]");
           $user = mysqli_fetch_array($query_res);

        ?>
    <div class="container">
        <div class="header">
            <img src="images/logo.jpg" alt="Loginer Image">
            <div class="welcome">
                <h1>Welcome, <span id="username"><?php echo $user['username']  ?></span></h1>
                <p>Email: <span id="useremail"><?php echo $user['email']  ?></span></p>
            </div>
        </div>
        

        <form action="profile_update.php" method="post" class="profile-info">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" value="<?php echo $user['username']  ?>" disabled>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your address" value="<?php echo $user['address']  ?>" disabled>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $user['phone']  ?>" disabled>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo $user['password']  ?>" disabled>
            </div>
            <div>

                <button id="edit-btn">Edit</button>
                <button id="save-btn" submit='save' name="save" >Save</button>
                <button id="cancel-btn"  >Cancel</button>
                <button id="logout-btn"><a href="logout.php">Logout</a></button>
            </div>
        </form>

    </div>
    
    
    
</body>

</html>