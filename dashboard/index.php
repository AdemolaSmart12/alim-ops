<?php
include "../includes/auth.php";
include "../includes/header.php";
include "../includes/sidebar.php";
?>

<div class="md:ml-64 p-6">

    <!-- Top section -->

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#07152B]">
            Dashboard
        </h1>

        <p class="text-gray-500 mt-2">
            Welcome,
            <span class="font-semibold">
                <?php echo $_SESSION['name']; ?>
            </span>

            | Role:

            <span class="text-blue-600">
                <?php echo ucfirst($_SESSION['role']); ?>
            </span>
        </p>
    </div>


    <!-- Cards -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-lg p-6">
            <p class="text-gray-500 text-sm">
                Total Stock
            </p>

            <h2 class="text-3xl font-bold mt-3 text-[#07152B]">
                0
            </h2>
        </div>


        <div class="bg-white rounded-2xl shadow-lg p-6">
            <p class="text-gray-500 text-sm">
                Daily Sales
            </p>

            <h2 class="text-3xl font-bold mt-3 text-green-600">
                ₦0
            </h2>
        </div>


        <div class="bg-white rounded-2xl shadow-lg p-6">
            <p class="text-gray-500 text-sm">
                Monthly Sales
            </p>

            <h2 class="text-3xl font-bold mt-3 text-blue-600">
                ₦0
            </h2>
        </div>


        <div class="bg-white rounded-2xl shadow-lg p-6">
            <p class="text-gray-500 text-sm">
                Low Stock Alerts
            </p>

            <h2 class="text-3xl font-bold mt-3 text-red-600">
                0
            </h2>
        </div>

    </div>


    <!-- Recent activity -->

    <div class="mt-10 bg-white rounded-2xl shadow-lg p-6">

        <h2 class="font-bold text-xl mb-4">
            Recent Activity
        </h2>

        <ul class="space-y-3 text-gray-600">

            <li>Storekeeper stocked in 50 drinks</li>

            <li>Restaurant recorded a sale</li>

            <li>Accountant added an expense</li>

        </ul>

    </div>

</div>

<?php include "../includes/footer.php"; ?>