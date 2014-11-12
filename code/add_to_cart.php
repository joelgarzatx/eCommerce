<?php
    include 'dbconnect.php';

    $itemid = $_POST['id'];
    $cartid = 10101; //cart_id hardcoded until session management added
  
    $query = 'SELECT qty FROM shopping_cart WHERE id='.$itemid.';';
    $resultcart = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
                
   $query = 'SELECT * FROM store_inventory WHERE id='.$itemid.';';  
   $resultstore = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));           
   $storedata = mysqli_fetch_array($resultstore);
   
   $id =  $storedata['id'];
   $title =  $storedata['title'];
   $price =  $storedata['price'];
   $category = $storedata['category'];
   
   
if (mysqli_num_rows($resultcart) < 1) {
    $query = "INSERT INTO shopping_cart ( cartid, id, category, title, price, qty ) VALUES ( $cartid, $id, '$category', '$title', $price, 1 )";
    $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
    $query = "UPDATE store_inventory SET qty = qty - 1 WHERE id = ". $itemid . ";";
    $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
    }
else
    {
    	$query = "UPDATE store_inventory SET qty = qty - 1 WHERE id = ". $itemid . ";";
    	  $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
    	
    	$query = "UPDATE shopping_cart SET qty = qty + 1 WHERE id = ". $itemid .";";
    	  $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
    }
header('Location: cart.php');   
?> <!-- end php script -->
