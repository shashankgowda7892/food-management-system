
<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include 'database/db.php';
$message = false;
if(isset($_POST['submit']))  
{
	$email = $_POST['email'];
    $password = $_POST['password'];
	if(!empty($_POST["submit"]))   
     {

	$loginquery ="SELECT * FROM user WHERE email = '$email' && password = '$password'"; 
	$result=mysqli_query($conn, $loginquery); 
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
                                      $_SESSION["place"] = $row['address'];
										 header("refresh:0.1;url=index.php"); 
	                            } 
							else
							    {
                    $message = true;
                                }
	 }
	
  
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>LOGIN </title>
  <script>
    window.history.forward();
  </script>
  
  <style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
    .container {
      width: 100vw;
      height: 100vh;
      background: url(images/bcc.jpg);
      background-position: center;
      background-size: cover;
      display: flex;
      flex-direction:column;
      gap:20px;
      justify-content: center;
      align-items: center;
    }

    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background-color: #ffffff;
      box-shadow: 0 0 100px 10px white;
      padding: 30px;
      width: 450px;
      border-radius: 20px;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    ::placeholder {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .form button {
      align-self: flex-end;
    }

    .flex-column>label {
      color: #151717;
      font-weight: 600;
    }

    .inputForm {
      border: 1.5px solid #ecedec;
      border-radius: 10px;
      height: 50px;
      display: flex;
      align-items: center;
      padding-left: 10px;
      transition: 0.2s ease-in-out;
    }

    .input {
      margin-left: 0px;
      border-radius: 10px;
      padding: 0 0 0 10px;
      border: none;
      width: 85%;
      height: 100%;
    }

    .input:focus {
      outline: none;
    }

    .inputForm:focus-within {
      border: 1.5px solid #2d79f3;
    }

    /* .flex-row {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
      justify-content: space-between;
    }

    .flex-row>div>label {
      font-size: 14px;
      color: red;
      font-weight: 400;
    } */

    .span a {
      font-size: 14px;
      margin-left: 5px;
      color: #2d79f3;
      font-weight: 500;
      cursor: pointer;
    }

    .button-submit {
      margin: 20px 0 10px 0;
      background-color: #151717;
      margin: auto;
      display: block;
      border: none;
      color: white;
      font-size: 15px;
      font-weight: 500;
      border-radius: 10px;
      height: 50px;
      width: 100%;
      cursor: pointer;
    }

    .button-submit:hover {
      background-color: #252727;
    }

    .p {
      text-align: center;
      color: black;
      font-size: 14px;
      margin: 5px 0;
    }

    .btn {
      margin-top: 10px;
      width: 100%;
      height: 50px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 500;
      gap: 10px;
      border: 1px solid #ededef;
      background-color: white;
      cursor: pointer;
      transition: 0.2s ease-in-out;
    }

    .btn:hover {
      border: 1px solid #2d79f3;
      
    }
    .error {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  width: 320px;
  padding: 12px;
  display: flex;

  flex-direction: row;
  align-items: center;
  justify-content: start;
  border-radius: 50px;
  background: -webkit-linear-gradient(to right, #f45c43, #eb3349);
  background: linear-gradient(to right, #f45c43, #eb3349);
  box-shadow: 0 0px 10px #de1c3280;
}

.error__icon {
  width: 20px;
  height: 20px;
  transform: translateY(-2px);
  margin-right: 8px;
  filter: drop-shadow(2px 1px 2px rgb(0 0 0 / 0.4));
}

.error__icon path {

  fill: #fff;
}

.error__title {
  font-weight: 500;
  font-size: 14px;
  color: #fff;
}

.error__close {
  width: 20px;
  height: 20px;
  cursor: pointer;
  margin-left: auto;
  filter: drop-shadow(2px 1px 2px rgb(0 0 0 / 0.4));
}

.error__close path {
  fill: #fff;
}

  </style>

</head>

<body>
  <div class="container">
    <?php
    // $message = NULL;
    // echo $message;
    if($message){
      
      

      echo '<div id="error" class="error">
    <div class="error__icon">
      <svg
        fill="none"
        height="24"
        viewBox="0 0 24 24"
        width="24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 
  
  1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"
          fill="#393a37"
        ></path>
      </svg>
    </div>
    <div class="error__title">Invalid Username or Password</div>
    <div class="error__close">
      <svg
        height="20"
        viewBox="0 0 20 20"
        width="20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path id="close"
  
          d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"
          fill="#393a37"
        ></path>
      </svg>
    </div>
  </div>';
    }
    ?>

    <form class="form"  method="POST">
      <div class="flex-column">
        <label>Email </label>
      </div>
      <div class="inputForm">
        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
          <g id="Layer_3" data-name="Layer 3">
            <path
              d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
            </path>
          </g>
        </svg>
        <input type="email" name="email" class="input" placeholder="Enter your Email" required>
      </div>

      <div class="flex-column">
        <label>Password </label>
      </div>
      <div class="inputForm">
        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
          <path
            d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
          </path>
          <path
            d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
          </path>
        </svg>
        <input type="password" name="password" class="input" placeholder="Enter your Password" required>
        <!-- <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
          </path>
        </svg> -->
      </div>

      

      <div class="flex-row">
        <div>
          <!-- <input type="checkbox"> -->
          <!-- <label>Remember me </label> -->

          <input class="button-submit"  name="submit"type="submit" value="Sign In">
          <p class="p">Don't have an account? <span class="span"><a href="signup.php">Sign Up</a></span>

          </p>



        </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
  setTimeout(()=> {
    var errorMessage = document.getElementById('error');
    if (errorMessage) {
      errorMessage.style.display ="none";
    }
  },3000);
});
  </script>


</body>

</html>