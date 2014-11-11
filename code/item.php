<?php
  include 'dbconnect.php';
  $item_id = $_GET['item_id'];

  $query = 'SELECT * FROM ecommerce.store_inventory WHERE id='.$item_id.';';
  $result = mysqli_query($mysqli, $query)
                       or die(mysqli_error($mysqli));

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999" lang="en" xml:lang="en">
<head>
<meta charset="utf-8"/>
<title>My Store</title>
<link rel="stylesheet" type="text/css" href="ecommerce.css" />
</head>
<body> 
    <p> Items detail: </p>

<?php
    if (mysqli_num_rows($result) < 1) {
        $display_block =  '<p class="error_msg">Sorry, there are no available items.</p>';
    } // end if
    else {
        $item = mysqli_fetch_array($result);
        $display_block = '<form method = "post" action = "add_to_cart.php">';
        $display_block .= '<input type="hidden" value="'.$item['id'].'" name="id"/>';
        $display_block .= '<input type="hidden" value="'.stripslashes($item['title']).'" name="title"/>';
        $display_block .= '<input type="hidden" value="'.$item['price'].'" name="price"/>';
  
        $display_block .= '<table class="item">';

        $display_block .= '<tr><td>Title</td><td>'.$item['title'].'</td></tr>';
        $display_block .= '<tr><td>Description</td><td>'.stripslashes($item['description']).'</td></tr>';  
        $display_block .= '<tr><td>Category</td><td>'.stripslashes($item['category']).'</td></tr>';
        $display_block .= '<tr><td>Price</td><td>'.$item['price'].'</td></tr>';
        $display_block .= '<tr><td>Quantity Available</td><td>'.$item['qty'].'</td></tr>'; 
  
        if ( $item['qty'] > 0) {
  	        $display_block .= '<tr><td>&nbsp;</td><td><input type = "submit" value = "Add to Cart"></td></tr>';  
  	    }
        else {
  	        $display_block .= '<tr><td>&nbsp;</td><td>Out of Stock</td></tr>';    
  	    }  
 
        $display_block .= '</table></form>';
    } // end else
    echo $display_block;
?>

    <p><a href="catalog.php">Continue Shopping</a></p>
</body>
</html>
