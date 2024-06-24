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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/filter.js"></script>
  
  <title>MY ORDERS</title>

  <style>
    
.navbar--main {
    position: fixed;
    top: 0%;
    /* background-color: rgb(248, 246, 246); */
    background-color: #A8DF8E;
    width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 4px 90px;
    box-shadow: 0px -10px 30px 10px black;
    z-index: 1;
}

.navbar--main .logo img {
    width: 150px;
    height: 60px;
    mix-blend-mode: difference;
    /* height: auto */
}

.navbar--main .navlist {
    display: flex;
    align-items: center;
    justify-content: center;
}

.navlist ul {
    display: flex ;
    padding-top:12px;
    align-items: center;
    justify-content: center;
    gap: 45px;
    list-style: none;
}

a {
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    color: black;
}

.navlist .nav-btn {
    padding: 5px 20px;
    font-size: 15px;
    border-radius: 12px;
    cursor: default;
    background-color: blue;
    color: white;
    font-weight: 700;
    border: none;
}
.navlist .nav-btn-logout{
    padding: 5px 20px;
    font-size: 15px;
    border-radius: 12px;
    cursor: default;
    background-color: red;
    color: white;
    font-weight: 700;
    border: none;

    & a{
        color: white;

    }
}
.nav-btn a{
    color: white;
  
}
td img { 
    height: 100px;
        object-fit: cover;
}

  </style>
</head>

<body>

<?php
    if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
?>




  <div class="navbar--main">
    <div class="logo">
      <img src="images/logo.jpg" alt="">
    </div>
    <div class="navlist">
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="index.php#foods">FOODS</a></li>
        <?php
        // echo $_SESSION["user_id"];
        if(empty($_SESSION["user_id"] )) // if user is not login
        {
          echo '<li><button class="nav-btn"><a href="login.php"><i>o</i>LOGIN</a></button></li>';
          echo  '<li>
          
          <button class="nav-btn"><a href="signup.php">REGISTER</a></button>
          </li>';
        }
        else
        {
          
          
         echo '<li><a href="cart.php">MY CART</a></li>';
        echo  '<li><a href="myorders.php">YOUR ORDERS</a></li>';
        echo  '<li><button class="nav-btn-logout"><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>   Profile</a></button></li>';
      }
      
      ?>
      </ul>

    </div>
  </div>



  <?php
    if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
?>




 <section class="resturant-main">

     <div class="container mt-5 pt-5">
         <div class="row">
                    
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="row">
                                <table class="table table-bordered table-hover ">
                                    <thead style="background: #404040; border:3px solid green; color:white;">
                                        <tr>

                                            <th>Image</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody style="background: #404040; border:2px solid green; color:white;">
                                        
                                    
                                    <?php 
				
                $query_res= mysqli_query($conn,"select * , image from user_orders u,dishes d where d.d_id=u.d_id and u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
                                                    {			      
                                                        
                                                        while($row=mysqli_fetch_array($query_res))
                                                        {
                                                
							?>
                                        <tr>
                                            <td > <img src='images/<?php echo $row['image']; ?>.jpg' alt='' >  </td></td>
                                            <td > <?php echo $row['title']; ?></td>
                                            <td > <?php echo $row['quantity']; ?></td>
                                            <td >$<?php echo $row['price']; ?></td>
                                             <td data-column="status">
                                                <?php 
																			$status=$row['status'];
                                                                            // echo $status;
																			if($status=="" or $status=="NULL")
																			{
                                                                                ?>
                                               <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button> 
                                               <?php 
																			  }
																			   if($status=="processing")
																			 { ?>
                                                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
                                                <?php
																				}
																			if($status=="finish")
																				{
                                                                                    ?>
                                                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
                                                <?php 
																			} 
																			?>
                                                <?php
																			if($status=="rejected")
																				{
																			?>
                                                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                                                <?php 
																			} 
																			?>






                                            </td> 
                                            <td > <?php echo $row['date']; ?></td>
                                            
                                            <td>
                                                <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>"><button type="button" class="btn btn-danger">Cancel  </button></a>
                                    </td>
                                </tr>
                                
                                
                                        <?php 
                                    }
                                    }
                                    ?>




                                    </tbody>
                                </table>

                                

                            </div>
                            
                        </div>

                        
                        
                    </div>

                    
                    
                </div>
                <h4>NOTE : If you  cancel the order after 30 minutes only 50% of money will be refunded. </h4>
            </div>
    </div>
</section>
<?php
include 'components/footer.php';
?>
    </body>
    </html>
    