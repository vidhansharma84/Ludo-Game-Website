<?php 
require_once('../backend/config.php');
$uid=$_SESSION['uid'];
$sql="SELECT * FROM user WHERE id='$uid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

$name=$row['name'];
$email=$row['email'];
$refcode=$row['code'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoMaster - Leaderboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ludo-red': '#FF6B6B',
                        'ludo-blue': '#4ECDC4',
                        'ludo-yellow': '#FFD93D',
                        'ludo-green': '#6BCB77',
                    }
                }
            }
        }
    </script>
</head>

<!-- Navbar -->
<nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="#" class="flex items-center py-4 px-2">
                            <!-- <i class="fas fa-dice text-blue-500 text-2xl mr-2"></i>
                            <span class="font-semibold text-gray-500 text-lg">LudoMaster</span> -->
                            <img src='../backend/assets/logo.png' 
                            class="h-16 w-24"
                            />
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3">
                    <a href="dashboard.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Home</a>
                    <a href="ludo.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Games</a>
                    <a href="referral.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Referral</a>
                    <a href="leaderboard.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Leaderboard</a>
                    <a href="coin.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Coin</a>
                    <a href="help.php" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Help & Support</a>
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300 flex items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1DIpd1kz9a3U1oAhsaqV9SSWCEuBl67kTfw&s" alt="Profile" class="w-8 h-8 rounded-full mr-2">
                            <span><?php echo $name;?></span>
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10 hidden">
                            <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <i class="fas fa-bars text-gray-500 text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu">
            <ul class="">
                <li><a href="dashboard.php" class="block text-sm px-2 py-4 hover:bg-blue-500 hover:text-white transition duration-300">Home</a></li>
                <li><a href="ludo.php" class="block text-sm px-2 py-4 hover:bg-blue-500 hover:text-white transition duration-300">Games</a></li>
                <li><a href="referral.php" class="block text-sm px-2 py-4 hover:bg-blue-500 hover:text-white transition duration-300">Referral</a></li>
                <li><a href="coin.php" class="block text-sm px-2 py-4 hover:bg-blue-500 hover:text-white transition duration-300">Coin</a></li>
            </ul>
        </div>
    </nav>


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