<?php
session_start();
// session_destroy();
include 'database/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['order'])){
        
        $query1= " INSERT INTO `payment`(`u_id`, `amount`, `pay_method`,  `trans_id`) VALUES ('$_SESSION[user_id]','$_POST[f_total]','$_POST[pay_method]','$_POST[trans_id]')";

       if( mysqli_query($conn,$query1)){
        $pay_id = mysqli_insert_id($conn);
        $query2 = "INSERT INTO `user_orders`( `u_id`,`d_id`,`pay_id`, `title`, `quantity`, `price`, `status` ) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn,$query2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,'iiisiis',$user_id,$d_id,$pay_id,$itemname,$quantity,$price,$status);
            foreach($_SESSION['cart'] as $key => $value){
                $user_id = $_SESSION['user_id'];
                $itemname = $value['item_name'];
                $d_id = $value['d_id'];
                $quantity = $value['Quantity'];
                $price = $value['Price'];
                $status = "";
                mysqli_execute($stmt);

            }
            unset($_SESSION['cart']);
            echo "
            <script>
            alert('Order Placed Successfully ! !');
            window.location.href='index.php';
            </script>
            " ;
        }
        

       }

    }


}