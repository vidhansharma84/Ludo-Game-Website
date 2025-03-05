<?php
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoMaster - User Profile</title>
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
<body class="bg-gray-50">
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">User Profile</h1>

        <!-- Profile Information -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-8">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 md:mb-0 md:mr-8">
                    <img src="/placeholder.svg?height=128&width=128" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2"><?php echo $name;?></h2>
                    <p class="text-gray-600 mb-2"><?php echo $email; ?></p>
                    <p class="text-gray-600 mb-4">Joined: January 1, 2023</p>
                    <button class="bg-ludo-blue text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit Profile</button>
                </div>
            </div>
        </div>

        <!-- Game Statistics -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Game Statistics</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <i class="fas fa-trophy text-4xl text-ludo-yellow mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Games Won</h4>
                    <p class="text-3xl font-bold text-ludo-blue">152</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <i class="fas fa-gamepad text-4xl text-ludo-green mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Games Played</h4>
                    <p class="text-3xl font-bold text-ludo-blue">287</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <i class="fas fa-percentage text-4xl text-ludo-red mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Win Rate</h4>
                    <p class="text-3xl font-bold text-ludo-blue">52.96%</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <i class="fas fa-coins text-4xl text-ludo-yellow mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Total Coins</h4>
                    <p class="text-3xl font-bold text-ludo-blue">5,280</p>
                </div>
            </div>
        </div>

        <!-- Recent Games -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Recent Games</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 font-semibold text-gray-700">Date</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Game Type</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Result</th>
                            <th class="py-3 px-4 font-semibold text-gray-700">Coins</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">2023-06-15</td>
                            <td class="py-3 px-4">4 Players</td>
                            <td class="py-3 px-4 text-ludo-green">Won</td>
                            <td class="py-3 px-4">+100</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">2023-06-14</td>
                            <td class="py-3 px-4">2 Players</td>
                            <td class="py-3 px-4 text-ludo-red">Lost</td>
                            <td class="py-3 px-4">-50</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">2023-06-13</td>
                            <td class="py-3 px-4">4 Players</td>
                            <td class="py-3 px-4 text-ludo-green">Won</td>
                            <td class="py-3 px-4">+150</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">2023-06-12</td>
                            <td class="py-3 px-4">2 Players</td>
                            <td class="py-3 px-4 text-ludo-green">Won</td>
                            <td class="py-3 px-4">+75</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Account Settings -->
        <div class="bg-white rounded-xl shadow-md p-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800">Account Settings</h3>
            <form class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" value="johndoe@example.com" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" id="username" name="username" value="johndoe" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                </div>
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="notifications" name="notifications" class="rounded text-ludo-blue focus:ring-ludo-blue">
                    <label for="notifications" class="ml-2 text-sm text-gray-700">Receive email notifications</label>
                </div>
                <div>
                    <button type="submit" class="bg-ludo-blue text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>