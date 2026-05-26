<?php
include "../includes/auth.php";
include "../includes/db.php";
include "../includes/header.php";
include "../includes/sidebar.php";

$message = "";

/* Fetch categories */

$categories = mysqli_query($conn,"SELECT * FROM categories");
$suppliers = mysqli_query($conn,"SELECT * FROM suppliers");


if($_SERVER['REQUEST_METHOD']=="POST"){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $low_stock = $_POST['low_stock'];

    $insert = mysqli_query($conn,"
        INSERT INTO products(
            category_id,
            supplier_id,
            name,
            quantity,
            unit_price,
            unit,
            low_stock_limit
        )

        VALUES(
            '$category',
            '$supplier',
            '$name',
            '$quantity',
            '$price',
            '$unit',
            '$low_stock'
        )
    ");

    if($insert){

        $message="Product added successfully";

    }else{

        $message="Error adding product";
    }

}
?>

<div class="md:ml-64 p-6">

<div class="bg-white p-8 rounded-2xl shadow-lg max-w-3xl">

<h1 class="text-2xl font-bold mb-6">
Add Product
</h1>


<?php if($message): ?>

<div class="bg-green-100 text-green-700 p-3 rounded mb-5">

<?php echo $message; ?>

</div>

<?php endif; ?>


<form method="POST" class="space-y-5">

<input
name="name"
placeholder="Product Name"
class="w-full border p-3 rounded-xl"
required
>


<select
name="category"
class="w-full border p-3 rounded-xl"
required
>

<option value="">Select Category</option>

<?php while($cat=mysqli_fetch_assoc($categories)): ?>

<option value="<?php echo $cat['id']; ?>">

<?php echo $cat['name']; ?>

</option>

<?php endwhile; ?>

</select>


<select
name="supplier"
class="w-full border p-3 rounded-xl"
required
>

<option value="">Select Supplier</option>

<?php while($sup=mysqli_fetch_assoc($suppliers)): ?>

<option value="<?php echo $sup['id']; ?>">

<?php echo $sup['name']; ?>

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


<input
type="number"
step="0.01"
name="price"
placeholder="Unit Price"
class="w-full border p-3 rounded-xl"
required
>


<input
name="unit"
placeholder="pcs/carton/bottle"
class="w-full border p-3 rounded-xl"
required
>


<input
type="number"
name="low_stock"
placeholder="Low stock alert level"
class="w-full border p-3 rounded-xl"
required
>


<button
class="bg-[#07152B] text-white px-6 py-3 rounded-xl w-full"
>

Save Product

</button>

</form>

</div>

</div>

<?php include "../includes/footer.php"; ?>