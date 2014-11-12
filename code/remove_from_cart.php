<?php
include 'dbconnect.php';

  $itemid = $_GET['id'];
  $cartid = 10101;
  
  // get qty from item to be removed from cart
  $query = 'SELECT qty FROM shopping_cart WHERE id='.$itemid.';';
  $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
  $cartdata = mysqli_fetch_array($result); 
  
  $qty = $cartdata['qty'];            
  
  // return qty to store inventory
  $query = "UPDATE store_inventory SET qty = qty + $qty WHERE id = ". $itemid . ";";              
  $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
  
  // delete item from cart
  $query = 'DELETE FROM shopping_cart WHERE id='.$itemid.';';
  $result = mysqli_query($mysqli, $query)
                or die(mysqli_error($mysqli));
                
header('Location: cart.php');   
?> <!-- end php script -->