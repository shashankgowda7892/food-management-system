<?php
session_start();
// session_destroy();
include 'database/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['save'])){
        $userUpdate = "UPDATE `user` SET `username`='$_POST[username]',`phone`='$_POST[phone]',`password`='$_POST[password]',`address`='$_POST[address]' WHERE `u_id`=$_SESSION[user_id]";
         mysqli_query($conn, $userUpdate);
         echo "
            <script>
            alert('Updated Successfully ! !');
            window.location.href='profile.php';
            </script>
            " ;
    }
}
else{

}
