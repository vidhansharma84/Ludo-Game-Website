<?php 
require_once('navbar.php');
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


<div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Play Ludo</h1>
        
        <!-- Game Selection -->
        <div id="gameSelection" class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Choose Your Game</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <a href="index.php">  <button  class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-chess-board mr-2"></i>Classic Ludo
                </button></a>
                <button disabled onclick="startMatchmaking('quick')" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                    <i class="fas fa-bolt mr-2"></i>Quick Play
                </button>
                <button disabled onclick="startMatchmaking('tournament')" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-300">
                    <i class="fas fa-trophy mr-2"></i>Tournament
                </button>
            </div>
        </div>

        <!-- Matchmaking -->
        <div id="matchmaking" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-2xl font-semibold mb-4">Finding Opponent</h2>
            <div class="flex items-center justify-center">
                <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-blue-500"></div>
            </div>
            <p class="text-center mt-4">Searching for a worthy opponent...</p>
        </div>

        <!-- Game Board (Simplified) -->
        <div id="gameBoard" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-2xl font-semibold mb-4">Ludo Game</h2>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="bg-red-100 p-4 rounded">
                    <p class="font-semibold">Player 1 (You)</p>
                    <p>Coins: 500</p>
                </div>
                <div class="bg-blue-100 p-4 rounded">
                    <p class="font-semibold">Player 2</p>
                    <p>Coins: 500</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded">
                    <p class="font-semibold">Game Pot</p>
                    <p>1000 Coins</p>
                </div>
            </div>
            <div class="border-4 border-gray-300 rounded-lg p-4 mb-4 aspect-square max-w-md mx-auto">
                <div class="grid grid-cols-3 gap-2 h-full">
                    <div class="bg-red-200 rounded"></div>
                    <div class="bg-white border border-gray-300 rounded"></div>
                    <div class="bg-green-200 rounded"></div>
                    <div class="bg-white border border-gray-300 rounded"></div>
                    <div class="bg-yellow-200 rounded"></div>
                    <div class="bg-white border border-gray-300 rounded"></div>
                    <div class="bg-blue-200 rounded"></div>
                    <div class="bg-white border border-gray-300 rounded"></div>
                    <div class="bg-purple-200 rounded"></div>
                </div>
            </div>
            <button onclick="endGame()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                End Game (Demo)
            </button>
        </div>

        <!-- Game Results -->
        <div id="gameResults" class="bg-white rounded-lg shadow-md p-6 mb-8 hidden">
            <h2 class="text-2xl font-semibold mb-4">Game Results</h2>
            <div class="text-center">
                <p class="text-4xl font-bold text-green-500 mb-4">You Win!</p>
                <p class="text-2xl mb-2">Coins Earned: <span class="font-semibold text-green-600">+500</span></p>
                <p class="text-xl mb-4">New Balance: <span class="font-semibold">1000 Coins</span></p>
                <button onclick="resetGame()" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-300">
                    Play Again
                </button>
            </div>
        </div>
    </div>

    <script>
        function startMatchmaking(gameType) {
            document.getElementById('gameSelection').classList.add('hidden');
            document.getElementById('matchmaking').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('matchmaking').classList.add('hidden');
                document.getElementById('gameBoard').classList.remove('hidden');
            }, 3000);
        }

        function endGame() {
            document.getElementById('gameBoard').classList.add('hidden');
            document.getElementById('gameResults').classList.remove('hidden');
        }

        function resetGame() {
            document.getElementById('gameResults').classList.add('hidden');
            document.getElementById('gameSelection').classList.remove('hidden');
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