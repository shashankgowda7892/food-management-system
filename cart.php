<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include 'database/db.php'
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cart.css">

    <title>MY Cart</title>



</head>

<body>
    <?php
    if (empty($_SESSION["user_id"])) {
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
                    echo '<li><button class="nav-btn-logout"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>   Profile</a></button></li>';
                }

                ?>
            </ul>

        </div>
    </div>







    <div class="main">
        <h1 class='heading'>MY CART</h1>

        <table>
            <thead>
                <tr>
                    <td>IMAGE</td>
                    <td>TITLE</td>
                    <td>PRICE</td>
                    <td>QUANTITY</td>
                    <td>TOTAL PRICE</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                <?php
                //    print_r($_SESSION['cart']);
                
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {

                        echo "
                    <tr>
                                    <td>
                                    <img src='images/$value[image].jpg' alt='' >  </td>
                                    <td>$value[item_name] </td>
                                    <td>$value[Price]<input type='hidden' class='iprice' value=$value[Price]></td>
                                    <td> 
                                    <form action='manage_cart.php' method='post'> 
                                    <input type='number' class='iquantity' name='mod_quantity' onchange='this.form.submit()' value=$value[Quantity] min='1'  >
                                    <input type='hidden' name='d_id' value='$value[d_id]'>
                                    </form>
                                    </td>

                                    <td class='totalprice'></td>
                                    <td>
                                    <form action='manage_cart.php' method='post'> 
                                    <button class='r-btn' name='removeitem'>REMOVE</button>
                                    <input type='hidden' name='d_id' value='$value[d_id]'>
                                    </td>
                                    </form>
                                    </tr>";

                    }





                }
                else if(empty($_SESSION['cart']) ) {

                    echo '<td colspan="6"><center>You have Not Added Anything To Cart. </center></td>';
                }
                
                else {
                    echo '<td colspan="6"><center>You have Not Added Anything To Cart. </center></td>';
                }


                ?>



            </tbody>
        </table>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {


            ?>



            <form action='purchase.php' method='post' class="summary-card">
                <div class="main-summary">
                    <div class="summary-content">
                        <h2>NO OF ITEMS :</h2>
                        <BR><BR>
                        <h2>TOTAL PRICE :</h2>
                        <BR><BR>
                        <h2>DELIVARY CHARGE :</h2>
                        <BR><BR>
                        <h2>FINAL PRICE :</h2>
                    </div>


                    <div class="summary-price">
                        <h2>
                            <?php echo count($_SESSION['cart']); ?>
                        </h2>
                        <BR><BR>
                        <h2 id='gtotal' name='gtotal'></h2>
                        <input id='g_total' type="hidden" name="g_total">
                        <BR><BR>
                        <h2>&#8377 25</h2>
                        <BR><BR>
                        <h2 id='ftotal' name='fprice'></h2>
                        <input id='f_total' type="hidden" name="f_total">
                    </div>
                </div>
                <div class="payment">
                    <input type="radio" id="cod" onclick="toggle()" name="pay_method" value="COD" checked>
                    <label for="cod">Cash On Delivary</label>
                    <br><br>
                    <input id="online" type="radio" onclick="toggle()" name="pay_method" value="UPI">
                    <label for="online">Online / UPI Payment</label>
                    <br><br>
                    <div id="trans_id">

                        <img src="images/payment.jpeg" alt=""><br>
                        <span>
                            Transaction Id:
                            <input type="text" id="trans_id" name="trans_id" >
                        </span>
                    </div>
                    <div class="order-btn">
                        <button name='order'>ORDER NOW</button>
                    </div>
                </div>
            </form>

            <?php

        }
        ?>
        <script src="js/cart.js"></script>

</body>

</html>