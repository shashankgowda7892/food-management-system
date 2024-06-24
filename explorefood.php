<!DOCTYPE html>
<html lang="en">
<?php

session_start();
// session_destroy();


include 'database/db.php';
// $_SESSION['r_id'] = $_GET['r_id'];
// $r_id = $_SESSION['r_id'];
// echo var_dump($_SESSION['cart']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/explorefood.css">
    <title>Explore Foods</title>

</head>

<body>

<?php
    if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
?>


    <div class="navbar">
        <div class="logo">
            <img src="images/logo.jpg" alt="">
        </div>
        <div class="navlist">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="index.php#foods">FOODS</a></li>
                <?php
                // echo $_SESSION["user_id"];
                if (empty($_SESSION["user_id"])) // if user is not login
                {
                    echo '<li><button class="nav-btn"><a href="login.php"><i>o</i>LOGIN</a></button></li>';
                    echo '<li>
          
          <button class="nav-btn"><a href="signup.php">REGISTER</a></button>
          </li>';
                } else {


                    echo '<li><a href="cart.php">MY CART</a></li>';
                    echo '<li><a href="myorders.php">YOUR ORDERS</a></li>';
                    echo '<li><button class="nav-btn-logout"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>   Logout</a></button></li>';
                }

                ?>
            </ul>

        </div>
    </div>



    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['explorefood'])) {
            $r_id = $_POST['r_id'];
            // echo $r_id;
            $_SESSION['r_id'] = $r_id;
            // echo $r_id;
        }
    }
    // print_r($_SESSION['cart']);
    ?>
    <div class="home-info">


        <?php

        $query_hd = mysqli_query($conn, "SELECT * FROM special_user WHERE r_id = {$_SESSION['r_id']} ");
        while ($hd = mysqli_fetch_array($query_hd)) {

            echo '
    
    <div class="home-image">
    <img src="images/'.$hd['image'].'.jpg" alt="">
</div>
<div class="home-desc">
    <h1>' . $hd['title'] . '</h1>

    <h2>' . $hd['address'] . '</h2>

    <h3>Open time :    ' . $hd['o_hour'] . '</h3>
    <h3>close time :. ' . $hd['c_hour'] . '</h3>

    <h2>PHONE NUMBER : ' . $hd['phone'] . '</h2>

    <h3>FOOD TYPE : ' . $hd['category'] . '</h3>
</div> 
';

        }


        ?>

    </div>



    <div class="heading">

        <h1>MORNING </h1>
    </div>
    <div class="rows">


        <?php
        $query_bf = mysqli_query($conn, "SELECT * FROM dishes WHERE r_id = {$_SESSION['r_id']} AND timings = 'breakfast'");
        while ($r = mysqli_fetch_array($query_bf)) {

            echo '
<form action="manage_cart.php" method="post">

<div class="card">
<div class="image">
    <img src="images/' . $r['image'] . '.jpg" alt="">
    <input type="hidden" name="image" value="' . $r['image'] . '">

</div>
<div class="summary">
    <div class="summary-1">

        <h2>' . $r['title'] . '</h2>
        <h3>$' . $r['price'] . '</h3>
        <p>' . $r['description'] . '</p>
        <input type="hidden" name="itemname" value="' . $r['title'] . '">
        <input type="hidden" name="price" value="' . $r['price'] . '">
        <input type="hidden" name="d_id" value="' . $r['d_id'] . '">
    </div>
    <div class="cart-btn">
        <button name="add_to_cart" type="submit">Add to Cart</button>
    </div>
</div>

</div>
</form>';
        }

        ?>



    </div>
    <div class="heading">

        <h1>LUNCH </h1>
    </div>
    <div class="rows">


        <?php
        $query_lu = mysqli_query($conn, "SELECT * FROM dishes WHERE r_id = {$_SESSION['r_id']} AND timings = 'lunch'");
        while ($r = mysqli_fetch_array($query_lu)) {


            echo '
    <form action="manage_cart.php" method="post">
    
    <div class="card">
    <div class="image">
        <img src="images/' . $r['image'] . '.jpg" alt="">
        <input type="hidden" name="image" value="' . $r['image'] . '">
    </div>
    <div class="summary">
        <div class="summary-1">
    
            <h2>' . $r['title'] . '</h2>
            <h3>$' . $r['price'] . '</h3>
            <p>' . $r['description'] . '</p>
            <input type="hidden" name="itemname" value="' . $r['title'] . '">
            <input type="hidden" name="price" value="' . $r['price'] . '">
            <input type="hidden" name="d_id" value="' . $r['d_id'] . '">
        </div>
        <div class="cart-btn">
            <button name="add_to_cart" type="submit">Add to Cart</button>
        </div>
    </div>
    
    </div>
    </form>';
        }

        ?>




    </div>
    <div class="heading">

        <h1>DINNER </h1>
    </div>
    <div class="rows">


        <?php
        $query_di = mysqli_query($conn, "SELECT * FROM dishes WHERE r_id = {$_SESSION['r_id']} AND timings = 'dinner'");
        while ($r = mysqli_fetch_array($query_di)) {


            echo '
    <form action="manage_cart.php" method="post">
    
    <div class="card">
    <div class="image">
        <img src="images/' . $r['image'] . '.jpg" alt="">
        <input type="hidden" name="image" value="' . $r['image'] . '">

    </div>
    <div class="summary">
        <div class="summary-1">
    
            <h2>' . $r['title'] . '</h2>
            <h3>$' . $r['price'] . '</h3>
            <p>' . $r['description'] . '</p>
            <input type="hidden" name="itemname" value="' . $r['title'] . '">
            <input type="hidden" name="price" value="' . $r['price'] . '">
            <input type="hidden" name="d_id" value="' . $r['d_id'] . '">
        </div>
        <div class="cart-btn">
            <button name="add_to_cart" type="submit">Add to Cart</button>
        </div>
    </div>
    
    </div>
    </form>';
        }

        ?>











</body>

</html>