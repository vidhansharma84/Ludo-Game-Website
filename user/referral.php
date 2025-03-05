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
        <h1 class="text-3xl font-bold text-center mb-8">Referral Program</h1>
        
        <!-- Referral Code Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Your Referral Code</h2>
            <div class="flex items-center justify-between bg-gray-100 p-4 rounded-lg">

                <span class="text-xl font-mono" id="referralCode"><?php echo $refcode; ?></span>
                <button onclick="copyReferralCode()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-copy mr-2"></i>Copy
                </button>
            </div>
        </div>

        <!-- Share Referral Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Share Your Referral Code</h2>
            <p class="mb-4">Invite friends and earn rewards for each successful referral!</p>
            <div class="flex space-x-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                    <i class="fab fa-facebook-f mr-2"></i>Share on Facebook
                </button>
                <button class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500 transition duration-300">
                    <i class="fab fa-twitter mr-2"></i>Share on Twitter
                </button>
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                    <i class="fab fa-whatsapp mr-2"></i>Share on WhatsApp
                </button>
            </div>
        </div>

        <!-- Referral Stats Section -->
         <?php 
$sq="SELECT * from user WHERE referred_by='$uid'";
$re=mysqli_query($conn,$sq);
$recount=mysqli_num_rows($re);
if($recount>0)
{
    $ro=mysqli_fetch_array($re);
}else{
    
}

?>
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Your Referral Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg text-center">
                    <p class="text-3xl font-bold text-blue-600"><?php echo $recount; ?></p>
                    <p class="text-gray-600">Total Referrals</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg text-center">
                    <p class="text-3xl font-bold text-green-600"><?php echo $recount; ?></p>
                    <p class="text-gray-600">Successful Referrals</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg text-center">
                    <p class="text-3xl font-bold text-yellow-600">500</p>
                    <p class="text-gray-600">Coins Earned</p>
                </div>
            </div>
        </div>

        <!-- Referral Bonus Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Referral Bonuses</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Earn <span class="font-semibold text-green-600">50 coins</span> for each successful referral</li>
                <li>Your friend gets <span class="font-semibold text-blue-600">100 coins</span> as a welcome bonus</li>
                <li>Unlock special achievements for multiple referrals</li>
            </ul>
        </div>
    </div>

    <script>
        function copyReferralCode() {
            const referralCode = document.getElementById('referralCode').textContent;
            navigator.clipboard.writeText(referralCode).then(() => {
                alert('Referral code copied to clipboard!');
            });
        }
    </script>

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