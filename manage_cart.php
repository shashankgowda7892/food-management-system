<?php
session_start();
// session_destroy();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['add_to_cart'])){
        

    if(isset($_SESSION['cart'] )){

            $myitems = array_column($_SESSION['cart'],'d_id');
            if(in_array($_POST['d_id'],$myitems)){
            echo "
            <script>alert('Item already added');
            window.location.href='explorefood.php';
            </script>
                " ;
            }
    else{
        
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array('item_name'=>$_POST['itemname'],'Price'=>$_POST['price'],'Quantity'=>1,'d_id'=>$_POST['d_id'],'image'=>$_POST['image']);
        echo "
        <script>alert('Item added');
        window.location.href='explorefood.php';
        </script>
        " ;
    }
}
else{
    echo " hello";
    $_SESSION['cart'][0] = array('item_name'=>$_POST['itemname'],'Price'=>$_POST['price'],'Quantity'=>1,'d_id'=>$_POST['d_id'],'image'=>$_POST['image']);
    echo "
    <script>alert('Item added');
    window.location.href='explorefood.php';
    </script>
    " ;       
    }
}

if(isset($_POST['removeitem'])){

    foreach($_SESSION['cart'] as $key=>$value){
        if($value['d_id'] == $_POST['d_id']){
            unset($_SESSION['cart'][$key]);
            $_SESSION[ 'cart'] = array_values($_SESSION['cart']);
            echo "
            <script>alert('Item Removed');
            window.location.href='cart.php';
            </script>
            " ;
        }
    }

}

if(isset($_POST['mod_quantity'])){
    foreach($_SESSION['cart'] as $key=>$value)
    {
        if($value['d_id'] == $_POST['d_id']) 
        {
            $_SESSION['cart'][$key]['Quantity'] = $_POST['mod_quantity'];
            
            echo "
            <script>
            window.location.href='cart.php';
            </script>
            " ;
        }
    }

}

}





?>