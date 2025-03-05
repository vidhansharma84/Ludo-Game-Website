<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoMaster Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include('navbar.php'); ?>


    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Coin Management</h1>

        <!-- Coin Balance Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Your Coin Balance</h2>
            <div class="flex items-center justify-center bg-yellow-100 p-6 rounded-lg">
                <i class="fas fa-coins text-yellow-500 text-4xl mr-4"></i>
                <?php $fetch="SELECT * from wallet WHERE uid='$uid'";
                $req=mysqli_query($conn,$fetch);
                $rowz=mysqli_fetch_array($req);
                ?>
                <span class="text-4xl font-bold text-yellow-600"><?php echo $rowz['balance']; ?></span>
            </div>
        </div>

        <!-- Add Coins Section -->
        <div class="flex flex-col xl:flex-row lg:flex-row justify-center space-x-4">
    <!-- Add Coins Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8 w-full max-w-lg">
        <h2 class="text-3xl font-bold text-blue-600 mb-4 text-center">Recharge Coins</h2>
        <p class="text-gray-600 text-center mb-6">Recharge your balance securely. Our support team will verify your request.</p>

        <?php 
        $sql="SELECT * from acc where id='1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <!-- QR Code & Payment Details Section -->
        <div class="bg-blue-50 p-4 rounded-lg shadow-sm text-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Payment Details</h3>
            <div class="flex justify-center mb-3">
                <img src="<?php echo $row['qr'];?>" alt="UPI QR Code" class="w-24 h-24 rounded-md shadow-md">
            </div>
            <p class="text-gray-700"><strong>UPI ID:</strong> <span class="text-blue-700 font-medium"><?php echo $row['upi'];?></span></p>
            <p class="text-gray-700"><strong>Bank Account:</strong> <?php echo $row['acc_no'];?></p>
            <p class="text-gray-700"><strong>IFSC Code:</strong> <?php echo $row['ifsc'];?></p>
        </div>

        <!-- Recharge Form -->
        <form action="../backend/backend.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <div>
                <label for="rechargeAmount" class="block text-sm font-semibold text-gray-700">Recharge Amount</label>
                <input type="number" id="rechargeAmount" name="amount" min="100" step="100"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-3"
                    placeholder="Enter amount in coins">
            </div>

            <div>
                <label for="transactionId" class="block text-sm font-semibold text-gray-700">Transaction ID</label>
                <input type="text" id="transactionId" name="tid"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-3"
                    placeholder="Enter UPI/Bank Transaction ID">
            </div>

            <div>
                <label for="screenshot" class="block text-sm font-semibold text-gray-700">Upload Payment Screenshot</label>
                <div class="relative mt-1">
                    <input type="file" id="screenshot" name="screenshot" accept="image/*"
                        class="">
                    
                </div>
            </div>

            <button type="submit"
            name="recharge"
            value="<?php echo $_SESSION['uid'];?>"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-3 rounded-lg text-lg font-semibold hover:from-blue-600 hover:to-blue-700 transition duration-300 shadow-md">
                Submit Recharge Request
            </button>
        </form>
    </div>



    <!-- Withdraw Coins Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Withdraw Coins</h2>
        <p class="mb-4">Request to withdraw your coins as cash. Our support team will review and process your request manually.</p>
        
        <form action="../backend/backend.php" method="post" class="space-y-4">
            <div>
                <label for="withdrawAmount" class="block text-sm font-medium text-gray-700">Withdrawal Amount</label>
                <input type="number" id="withdrawAmount" name="withdrawAmount" 
    min="100" max=<?php echo $rowz['balance'];?> 
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
    placeholder="Enter amount in coins" />

            </div>

            <div>
                <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="bank">Bank Transfer</option>
                    <option value="upi">UPI</option>
                </select>
            </div>

            <div>
                <label for="accountDetails" class="block text-sm font-medium text-gray-700">Account Details</label>
                <textarea id="accountDetails" name="accountDetails" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                    placeholder="Enter your bank account or UPI ID details"></textarea>
            </div>

            <button type="submit"
            name="withdraw"
            value="<?php echo $uid;?>"
                class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                Request Withdrawal
            </button>
        </form>
    </div>
</div>

<?php
$query = "SELECT date, type, amount, status FROM transactions WHERE uid = '$uid' ORDER BY date DESC";
$result = mysqli_query($conn, $query);
?>

<!-- Transaction History Section -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-semibold mb-4">Transaction History</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left">Date</th>
                    <th class="py-2 px-4 text-left">Type</th>
                    <th class="py-2 px-4 text-left">Amount</th>
                    <th class="py-2 px-4 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="<?= ($row['type'] == 'withdrawal') ? 'bg-gray-50' : '' ?>">
                        <td class="py-2 px-4"><?= $row['date']; ?></td>
                        <td class="py-2 px-4"><?= ucfirst($row['type']); ?></td>
                        <td class="py-2 px-4 <?= ($row['type'] == 'withdrawal') ? 'text-red-600' : 'text-green-600' ?>">
                            <?= ($row['type'] == 'withdrawal') ? '-' : '+'; ?><?= number_format($row['amount']); ?>
                        </td>
                        <td class="py-2 px-4">
                            <?php if ($row['status'] == 'pending'): ?>
                                <span class="bg-yellow-100 text-yellow-800 py-1 px-2 rounded-full text-xs">Pending</span>
                            <?php elseif ($row['status'] == 'success'): ?>
                                <span class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-xs">Completed</span>
                            <?php else: ?>
                                <span class="bg-red-100 text-red-800 py-1 px-2 rounded-full text-xs">Rejected</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
    </div>

    <script>
        // Navbar toggle
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        // Profile dropdown toggle
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close the dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
</body>

</html>