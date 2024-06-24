<!DOCTYPE html>
<html lang="en">
<?php

include 'database/db.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/explorehome.css">
    <title>Explore Foods</title>
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
    
   

</head>

<body>




    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/logo.jpg" alt="Logo" width="150" height="60" class="logo ">

            </a>
            <form class="d-flex" METHOD="POST">
                <input class="form-control me-2" type="search" name="place" placeholder="Enter City Name" 
                    aria-label="B.C Road" required>
                <button class="btn btn-outline-success text-bg-success" name="submit" type="submit">Search</button>
            </form>

        </div>
    </nav>


    <section class="home-section">
        <div class="homes">
            <h1>HOMES NEAR YOU</h1>
        </div>
        <div class="home-cards">


            <?php
        
        if(isset($_POST['submit']) ){
           
            $place = $_POST['place'];
            
            
            $query_home = mysqli_query($conn,"SELECT * FROM special_user WHERE staus='active' and del_places LIKE '%$place%' ");
            // $row=mysqli_fetch_array($query_home);
            // echo var_dump($row);
            // echo mysqli_num_rows($row);
           
            while($h = mysqli_fetch_assoc($query_home)){


            
    
    
    echo '
    <form  class="main-card" action="explorefood.php" method="post">
            
                <div class="image" >
                <img src="images/'.$h['image'].'.jpg" alt="">
                </div>
                <div class="home-content">
                    <h2>'.$h['title'].' </h2>
                    <p>'.$h['address'].'</p>
                        <h3>TYPE : '.$h['category'].'</h3> 
                        <input type="hidden" name="r_id" value="'.$h['r_id'].'">
                        <a ><button type="submit" name="explorefood">EXPLORE FOODS</button></a>
                    </div>
                </form>';
            
        }

    }

    else{
        
        $defaultplace= 'kaikamba';
        $query_home = mysqli_query($conn,"SELECT * FROM special_user WHERE staus='active' and del_places LIKE '%,$defaultplace%' ");
        while($h = mysqli_fetch_assoc($query_home)){


            
    
    
            echo '
            <form  class="main-card" action="explorefood.php" method="post">
            
                <div class="image" >
                    <img src="images/'.$h['image'].'.jpg" alt="">
                </div>
                <div class="home-content">
                    <h2>'.$h['title'].' </h2>
                    <p>'.$h['address'].'</p>
                        <h3>TYPE : '.$h['category'].'</h3> 
                        <input type="hidden" name="r_id" value="'.$h['r_id'].'">
                        <a ><button type="submit" name="explorefood">EXPLORE FOODS</button></a>
                    </div>
                </form>
                ';
                    
                }
        // echo 'hai';
    }

    
    
    ?>



        </div>
    </section>





    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Add a class to show the search results with animation after the page has loaded
            document.querySelector('.home-cards').classList.add('show');
        });



        
   </script>
</body>

</html>