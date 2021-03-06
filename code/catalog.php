<?php
  include 'dbconnect.php';

  $get_items_sql = 'SELECT * FROM store_inventory;';
  $get_items_results = mysqli_query($mysqli, $get_items_sql)
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
    <p> Items available: </p>
    <table class="catalog">
        <tr>
          <td>Item ID</td><td>Category</td><td>Title</td><td>Price</td><td>Qty Available</td>
        </tr>
<?php

    if (mysqli_num_rows($get_items_results) < 1) {
      echo '<tr><td colspan="5"><p class="error_msg">Sorry, there are no available items.</p></td></tr>';
    }
    else {
    	
        while ($items = mysqli_fetch_array($get_items_results)){
            $item_id = $items['id'];
            $item_category = stripslashes($items['category']);
            $item_title = stripslashes($items['title']);
            $item_price = $items['price'];
            $item_qty = $items['qty'];
            echo'<tr><td>'.$item_id.'</td><td>'.$item_category.
        	    '</td><td><a href="item.php?item_id='.$item_id.'">'.$item_title.'</a></td><td>'.
        	    $item_price.'</td><td>'.$item_qty.'</td></tr>';
        } // end while
    } // end else
    mysqli_free_result($get_items_results);
?>

    </table>
</body>
</html>
