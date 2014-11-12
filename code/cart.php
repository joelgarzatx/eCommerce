<?php
    include 'dbconnect.php';

    $get_items_sql = 'SELECT * FROM shopping_cart;';
    $get_items_results = mysqli_query($mysqli, $get_items_sql)
                       or die(mysqli_error($mysqli));

    $cartid = 10101; // cartid hardcoded until we add session managment
    $carttotal = 0.00;
    //show list of inventory
    $get_items_sql = "SELECT * FROM shopping_cart WHERE cartid=$cartid";
    $get_items_res = mysqli_query($mysqli, $get_items_sql)
                     or die(mysqli_error($mysqli));

    if (mysqli_num_rows($get_items_res) < 1) {
        $display_block = '<p><em>Sorry, there are no items in your cart.</em></p>';
        $form_block = '';

    } 
    else {
        $display_block = '<table class="item">';
        $display_block .= '<tr><td>Category</td><td>Title</td><td>Item Price</td><td>Qty </td><td>Total Price</td><td>Remove</td></tr>';

        $form_block = '<form action="https://www.sandbox.paypal.com/cgibin/ webscr" method="post" method="post">';
        $form_block .= '<input type="hidden" name="cmd" value="_cart">';
        $form_block .= '<input type="hidden" name="upload" value="1">';
        $form_block .= '<input type="hidden" name="business" value="jagarz_1354233945_biz@broncs.utpa.edu">';
        $form_block .= '<input type="hidden" name="currency_code" value="USD">';    
        $form_block .= '<input type="hidden" name="custom" value="'.$cartid.'">';    
     
        $itemcount = 0;
        while ($items = mysqli_fetch_array($get_items_res)){
            $item_category = $items['category'];
            $item_id = $items['id'];
            $item_title = stripslashes($items['title']);
            $item_price = $items['price'];
            $item_qty = $items['qty'];

            if ( $item_qty > 0 ) {
               $itemcount += 1;
               $carttotal += $item_qty * $item_price;
               $display_block .= '<tr><td>' . $item_category . '</td><td>' . $item_title . '</td><td align="right">$ ' . $item_price . '</td><td>' . $item_qty . '</td><td align="right">$ ' . $item_qty * $item_price . '</td><td><a href="remove_from_cart.php?id='.$item_id.'">Delete Item</a></tr>';
          
               $form_block .= '<input type="hidden" name="item_name_'.$itemcount.'" value="'.$item_category.'-'.$item_title.'">';
               $form_block .= '<input type="hidden" name="amount_'.$itemcount.'" value="'.$item_price.'">';  
               $form_block .= '<input type="hidden" name="quantity_'.$itemcount.'" value="'.$item_qty.'">';         
            } //end if
        } // end while
        $display_block .= '<tr><td colspan="4" align="right">Grand Total</td><td colspan="2" align="right">$ '.$carttotal.'</td></tr>';
        $display_block .= '</table>';
    
        $form_block .= '<INPUT TYPE="hidden" NAME="return" value="https://csci6314.frozencactus.com/MyStore/purchase_complete.php">';
        $form_block .= '<INPUT TYPE="hidden" NAME="rm" value="2">';
        $form_block .= '<INPUT TYPE="hidden" NAME="cancel_return" value="https://csci6314.frozencactus.com/MyStore/show_cart.php">';
        $form_block .= '<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">';
        $form_block .= '</form>';
    } // end else

    mysqli_free_result($get_items_res);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999" lang="en" xml:lang="en">
<head>
<meta charset="utf-8"/>
<title>My Store</title>
<link rel="stylesheet" type="text/css" href="ecommerce.css" />
</head>
<body> 
    <p> Items in your cart: </p>
<?php
    echo $display_block;
    echo $form_block;
 ?>    
    <p><a href="catalog.php">Continue Shopping</a></p>
</body>
</html>
