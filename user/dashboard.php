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
        <h1 class="text-3xl font-bold text-center mb-8">Game Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Play Ludo Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-dice text-blue-500 text-2xl mr-2"></i>
                  <h2 class="text-xl font-semibold">Play Ludo</h2>
                </div>
                <p class="text-gray-600 mb-4">Start a new Ludo game or join an existing one.</p>
                <a href="game.php"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Play Now</button></a>
            </div>

            <!-- Refer & Earn Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user-plus text-green-500 text-2xl mr-2"></i>
                    <h2 class="text-xl font-semibold">Refer & Earn</h2>
                </div>
                <p class="text-gray-600 mb-4">Invite friends and earn rewards for each referral.</p>
                <a href="referral.php"><button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Refer Friends</button></a>
            </div>

            <!-- Profile Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user-circle text-purple-500 text-2xl mr-2"></i>
                    <h2 class="text-xl font-semibold">Profile</h2>
                </div>
                <p class="text-gray-600 mb-4">View and edit your game profile and settings.</p>
                <a href="profile.php"> <button class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-300">View Profile</button></a>
            </div>

            <!-- Leaderboard Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-trophy text-yellow-500 text-2xl mr-2"></i>
                    <h2 class="text-xl font-semibold">Leaderboard</h2>
                </div>
                <p class="text-gray-600 mb-4">Check the top players and your ranking.</p>
                <a href="leaderboard.php"> <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">View Leaderboard</button></a>
            </div>

            <!-- Tournament Card
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-flag-checkered text-red-500 text-2xl mr-2"></i>
                    <h2 class="text-xl font-semibold">Tournaments</h2>
                </div>
                <p class="text-gray-600 mb-4">Join or create Ludo tournaments.</p>
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">Browse Tournaments</button>
            </div> -->

            <!-- Help & Support Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-question-circle text-indigo-500 text-2xl mr-2"></i>
                    <h2 class="text-xl font-semibold">Help & Support</h2>
                </div>
                <p class="text-gray-600 mb-4">Get assistance or read game rules.</p>
                <a href="help.php"> <button class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition duration-300">Get Help</button></a>
            </div>
        </div>
    </div>

    
</body>
</html>