<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lalo's Place</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>

<?php
	function pf_validate_number($value, $function, $redirect) {
	if(isset($value) == TRUE) {
	if(is_numeric($value) == FALSE) {
	$error = 1;
	}
	if(@$error == 1) {
	header("Location: " . $redirect);
	}
	else {
	$final = $value;
	}
	}
	else {
	if($function == 'redirect') {
	header("Location: " . $redirect);
	}
	if($function == "value") {
	$final = 0;
	}
	}
	return $final;
}

function showcart()
{
if(isset($_SESSION['SESS_ORDERNUM']))
{
	if(isset($_SESSION['login_user']))
	{
		$custsql = "SELECT id, status from orders WHERE customer_id = ". $_SESSION['SESS_USERID']. " AND status < 2;";
		$custres = mysql_query($custsql)or die(mysql_error());;
		$custrow = mysql_fetch_assoc($custres);

		$itemssql = "SELECT products.*, orderitems.*, orderitems.id AS itemid FROM products, orderitems WHERE orderitems.product_id =products.product_id AND order_id = " . $custrow['id'];
		$itemsres = mysql_query($itemssql);
		$itemnumrows = mysql_num_rows($itemsres);
	}
	else
	{
		$custsql = "SELECT id, status from orders WHERE session = '" . session_id(). "' AND status < 2;";
		$custres = mysql_query($custsql)or die(mysql_error());;
		$custrow = mysql_fetch_assoc($custres);
		$itemssql = "SELECT products.*, orderitems.*, orderitems.id AS itemid FROM products, orderitems WHERE orderitems.product_id = products.product_id AND order_id = " . $custrow['id'];
		$itemsres = mysql_query($itemssql);
		$itemnumrows = mysql_num_rows($itemsres);

	}
}
	else
	{
		$itemnumrows = 0;
	}
	if($itemnumrows == 0)
	{
		echo "You have not added anything to your shopping cart yet.";
	}

else
{
	echo "<table cellpadding='10'>";
	echo "<tr>";
	echo "<td></td>";
	echo "<td><strong>Item</strong></td>";
	echo "<td><strong>Quantity</strong></td>";
	echo "<td><strong>Unit Price</strong></td>";
	echo "<td><strong>Total Price</strong></td>";
	echo "<td></td>";
	echo "</tr>";
while($itemsrow = mysql_fetch_assoc($itemsres))
{
$quantitytotal = $itemsrow['price'] * $itemsrow['quantity'];
echo "<tr>";
if(empty($itemsrow['picture'])) {
echo "<td><img src='productimages/dummy.jpg' width='50' alt='" . $itemsrow['name'] . "'></td>";
}
else {
echo "<td><img src='" .$itemsrow['picture'] . "' width='50' alt='". $itemsrow['name'] . "'></td>";
}
echo "<td>" . $itemsrow['name'] . "</td>";
		

echo "<td>" .$itemsrow['quantity']  . "</td>"; "&nbsp;";									 
											
echo "<a class='ccc' href='ChangeQty.php?id='".$itemsrow['product_id']."<i class='fa fa-minus-square fa-fw'></i></a>&nbsp;";
echo "<a class='ccc' href='AddToCart.php?id='".$itemsrow['product_id']."<i class='fa fa-minus-square fa-fw'></i></a>&nbsp;";
										
echo "<td><strong>Php " . sprintf('%.2f', $itemsrow['price']) . "</strong></td>";
echo "<td><strong>Php ". sprintf('%.2f', $quantitytotal) . "</strong></td>";
echo "<td>[<a href='delete.php?id=". $itemsrow['itemid'] . "'>X</a>]</td>";
echo "</tr>";
@$total = $total + $quantitytotal;
$totalsql = "UPDATE orders SET total = ". $total . " WHERE id = ". $_SESSION['SESS_ORDERNUM'];
$totalres = mysql_query($totalsql)or die(mysql_error());;
}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>TOTAL</td>";
echo "<td><strong>&pound;". sprintf('%.2f', $total) . "</strong></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";
echo "<p><a href='Checkout.php'>Place your order</a></p>";
}
}
?>
</html>
