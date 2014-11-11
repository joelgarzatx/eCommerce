<?php
  include 'dbconnect.php';

  $get_items_sql = 'SELECT * FROM ecommerce.store_inventory;';
  $get_items_results = mysqli_query($mysqli, $get_items_sql)
                       or die(mysqli_error($mysqli));

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999" lang="en" xml:lang="en">
<head>
<meta charset="utf-8"/>
<title>My Store</title>
</head>
<body> 
    <p> Items available: </p>
    <table>
        <tr>
          <th>Item ID</th><th>Category</th><th>Title</th><th>Price</th><th>Qty Available</th>
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
            $item_description = stripslashes($items['description']);
            $item_qty = $items['qty'];
            echo'<tr><td>'.$item_id.'</td><td>'.$item_category.
        	    '</td><td><a href="item.php?item_id='.$item_id.'">'.$item_title.'</a></td><td>'.
        	    $item_price.'</td><td>'.$item_description.'</td><td>'.$item_qty.'</td></tr>';
        } // end while
    } // end else
?>

    </table>
</body>
</html>
