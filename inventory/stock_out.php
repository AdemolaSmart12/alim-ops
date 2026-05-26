<?php
include "../includes/auth.php";
include "../includes/db.php";
include "../includes/header.php";
include "../includes/sidebar.php";

$message="";

$products=mysqli_query(
$conn,
"SELECT * FROM products
WHERE status='active'
ORDER BY name ASC"
);

if($_SERVER['REQUEST_METHOD']=="POST"){

$product_id=$_POST['product_id'];
$quantity=intval($_POST['quantity']);
$note=mysqli_real_escape_string(
$conn,
$_POST['note']
);

$user_id=$_SESSION['user_id'];

$product_query=mysqli_query(
$conn,
"SELECT * FROM products
WHERE id='$product_id'
LIMIT 1"
);

$product=mysqli_fetch_assoc(
$product_query
);

if($product){

$previous_quantity=
$product['quantity'];

if($quantity<=$previous_quantity){

$new_quantity=
$previous_quantity-$quantity;


mysqli_query(
$conn,
"UPDATE products
SET quantity='$new_quantity'
WHERE id='$product_id'"
);


mysqli_query(
$conn,
"
INSERT INTO stock_movements(

product_id,
user_id,
movement_type,
quantity,
previous_quantity,
new_quantity,
note

)

VALUES(

'$product_id',
'$user_id',
'stock_out',
'$quantity',
'$previous_quantity',
'$new_quantity',
'$note'

)
"
);

$message=
"Stock removed successfully";

}else{

$message=
"Insufficient stock available";

}

}else{

$message=
"Product not found";

}

}
?>

<div class="md:ml-64 p-6">

<div class="bg-white p-8 rounded-2xl shadow-lg max-w-3xl">

<h1 class="text-2xl font-bold mb-6 text-[#07152B']">
Stock Out
</h1>


<?php if($message): ?>

<div class="bg-blue-100 p-3 rounded mb-4">

<?php echo $message; ?>

</div>

<?php endif; ?>


<form method="POST" class="space-y-5">


<select
name="product_id"
class="w-full border p-3 rounded-xl"
required
>

<option>

Select Product

</option>

<?php while(
$row=mysqli_fetch_assoc($products)
): ?>


<option
value="<?php echo $row['id']; ?>"
>

<?php echo $row['name']; ?>

(Current:

<?php echo $row['quantity']; ?>

)

</option>

<?php endwhile; ?>

</select>


<input
type="number"
name="quantity"
placeholder="Quantity"
class="w-full border p-3 rounded-xl"
required
>


<textarea
name="note"
placeholder="Reason for stock out"
class="w-full border p-3 rounded-xl"
></textarea>


<button
class="bg-red-600 text-white px-6 py-3 rounded-xl w-full"
>

Remove Stock

</button>

</form>

</div>

</div>

<?php include "../includes/footer.php"; ?>