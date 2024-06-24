<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include 'database/db.php';

?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="js/filter.js"></script>
  
  <title>HUNGURY HIVE.COM</title>
  
  <style>
    .card {
            display: none;
        }

        .card.active {
            display: block;
        }
  </style>
</head>

<body>

  <div class="navbar">
    <div class="logo">
      <img src="images/logo.jpg" alt="">
    </div>
    <div class="navlist">
      <ul>
        <li><a href="#main">HOME</a></li>
        <li><a href="#foods">FOODS</a></li>
        <?php
        // echo $_SESSION["user_id"];
        if(empty($_SESSION["user_id"] )) // if user is not login
        {
          echo '<li><button class="nav-btn"><a href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGIN</a></button></li>';
          echo  '<li>
          
          <button class="nav-btn"><a href="signup.php"><i class="fa fa-user" aria-hidden="true"></i>   REGISTER</a></button>
          </li>';
        }
        else
        {
          
          
         echo '<li><a href="cart.php">MY CART</a></li>';
        echo  '<li><a href="myorders.php">YOUR ORDERS</a></li>';
        echo  '<li><button class="nav-btn-logout"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></button></li>';
      }
      
      ?>
      </ul>

    </div>
  </div>


  <div class="main" id="main">
    <div class="content">
      <h1><span>Welcome</span> to The World of Tasty & Fresh Food.</h1>
      <p>Home-cooked meals offer a sense of comfort and familiarity that is hard to replicate elsewhere. 
        The process of preparing and enjoying food in the comfort of one's own home can be a deeply satisfying experience.
         From the aroma of spices filling the kitchen to the joy of sharing a meal with loved ones, home-cooked food holds a special place in many people's hearts.</p>
      <div class="btn-order">
        <button ><a href="explorehome.php">Order Now</a></button>
      </div>
    </div>
    <div class="image">
      <img src="images/new_home_hero_img.png" alt="">
    </div>

  </div>



<section class="popular" id="foods">
    <div class="container">
        <h1>Featured Foods</h1>
        <div>
            <ul>
                <li><a href="#" class="selected" data-filter="*">all</a></li>
                <li><a href="#" data-filter="northkarnataka">North Karnataka</a></li>
                <li><a href="#" data-filter="southkarnataka">South Karnataka</a></li>
                <li><a href="#" data-filter="coastalkarnataka">Coastal Karnataka</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <?php
        $query_res = mysqli_query($conn, "select * from dishes ");
        while ($r = mysqli_fetch_array($query_res)) {
            echo '
            <div class="card ' . str_replace(' ', '-', $r['category']) . '">
                <img src="images/' . $r['image'] . '.jpg" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $r['title'] . '</h5>
                    <p class="card-text">' . $r['description'] . '</p>
                    
                </div>
            </div>';
        }

        ?>
    </div>
    <div class="explore-more">
      
      <div>
        <a href="explorehome.php">explore more by your city </a>
        
      </div>
    </div>

</section>




  

<?php
include 'components/footer.php';
?>

</body>

</html>