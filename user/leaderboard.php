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
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Leaderboard</h1>
        
        <!-- Leaderboard Tabs -->
        <div class="mb-8">
            <div class="flex justify-center border-b border-gray-200">
                <button onclick="changeTab('global')" id="globalTab" class="py-2 px-6 text-ludo-blue border-b-2 border-ludo-blue font-semibold transition duration-300">Global</button>
                <button onclick="changeTab('weekly')" id="weeklyTab" class="py-2 px-6 text-gray-500 hover:text-ludo-blue transition duration-300">Weekly</button>
                <button onclick="changeTab('monthly')" id="monthlyTab" class="py-2 px-6 text-gray-500 hover:text-ludo-blue transition duration-300">Monthly</button>
            </div>
        </div>
        
        <!-- Top 3 Players -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- 2nd Place -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center order-2 md:order-1 transform hover:scale-105 transition duration-300">
                <div class="w-24 h-24 rounded-full bg-ludo-blue mb-4 flex items-center justify-center">
                    <img src="https://i.pravatar.cc/150?img=2" alt="2nd Place" class="w-20 h-20 rounded-full border-4 border-white">
                </div>
                <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                <p class="text-gray-500 mb-2">Rank: 2</p>
                <p class="text-2xl font-bold text-ludo-blue">
                    <i class="fas fa-trophy mr-2"></i>9800
                </p>
            </div>
            
            <!-- 1st Place -->
            <div class="bg-gradient-to-b from-yellow-300 to-yellow-100 rounded-xl shadow-lg p-6 flex flex-col items-center justify-center transform scale-110 order-1 md:order-2 hover:shadow-2xl transition duration-300">
                <div class="w-32 h-32 rounded-full bg-white mb-4 flex items-center justify-center border-4 border-yellow-400">
                    <img src="https://i.pravatar.cc/150?img=1" alt="1st Place" class="w-28 h-28 rounded-full border-4 border-yellow-300">
                </div>
                <h3 class="text-2xl font-bold mb-2">John Doe</h3>
                <p class="text-gray-700 mb-2">Rank: 1</p>
                <p class="text-3xl font-bold text-yellow-600">
                    <i class="fas fa-crown mr-2"></i>10000
                </p>
            </div>
            
            <!-- 3rd Place -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center order-3 transform hover:scale-105 transition duration-300">
                <div class="w-24 h-24 rounded-full bg-ludo-green mb-4 flex items-center justify-center">
                    <img src="https://i.pravatar.cc/150?img=3" alt="3rd Place" class="w-20 h-20 rounded-full border-4 border-white">
                </div>
                <h3 class="text-xl font-semibold mb-2">Bob Johnson</h3>
                <p class="text-gray-500 mb-2">Rank: 3</p>
                <p class="text-2xl font-bold text-ludo-green">
                    <i class="fas fa-trophy mr-2"></i>9500
                </p>
            </div>
        </div>
        
        <!-- Leaderboard Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rank</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Player</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Wins</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Games</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Win Rate</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Points</th>
                    </tr>
                </thead>
                <tbody id="leaderboardBody">
                    <!-- Leaderboard rows will be dynamically inserted here -->
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-ludo-blue hover:bg-blue-50">1</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>

    <script>
        const leaderboardData = {
            global: [
                { rank: 4, name: "Alice Williams", avatar: "https://i.pravatar.cc/150?img=4", wins: 450, totalGames: 500, winRate: "90%", points: 9200 },
                { rank: 5, name: "Charlie Brown", avatar: "https://i.pravatar.cc/150?img=5", wins: 425, totalGames: 480, winRate: "88.5%", points: 9000 },
                { rank: 6, name: "Diana Prince", avatar: "https://i.pravatar.cc/150?img=6", wins: 410, totalGames: 470, winRate: "87.2%", points: 8800 },
                { rank: 7, name: "Ethan Hunt", avatar: "https://i.pravatar.cc/150?img=7", wins: 400, totalGames: 460, winRate: "87%", points: 8700 },
                { rank: 8, name: "Fiona Gallagher", avatar: "https://i.pravatar.cc/150?img=8", wins: 390, totalGames: 450, winRate: "86.7%", points: 8600 },
            ],
            weekly: [
                { rank: 1, name: "George Bluth", avatar: "https://i.pravatar.cc/150?img=9", wins: 50, totalGames: 55, winRate: "90.9%", points: 1000 },
                { rank: 2, name: "Helen Cooper", avatar: "https://i.pravatar.cc/150?img=10", wins: 48, totalGames: 54, winRate: "88.9%", points: 980 },
                { rank: 3, name: "Ian Malcolm", avatar: "https://i.pravatar.cc/150?img=11", wins: 47, totalGames: 53, winRate: "88.7%", points: 970 },
                { rank: 4, name: "Julia Child", avatar: "https://i.pravatar.cc/150?img=12", wins: 46, totalGames: 52, winRate: "88.5%", points: 960 },
                { rank: 5, name: "Kevin Hart", avatar: "https://i.pravatar.cc/150?img=13", wins: 45, totalGames: 51, winRate: "88.2%", points: 950 },
            ],
            monthly: [
                { rank: 1, name: "Lara Croft", avatar: "https://i.pravatar.cc/150?img=14", wins: 200, totalGames: 220, winRate: "90.9%", points: 4000 },
                { rank: 2, name: "Michael Scott", avatar: "https://i.pravatar.cc/150?img=15", wins: 195, totalGames: 218, winRate: "89.4%", points: 3950 },
                { rank: 3, name: "Natasha Romanoff", avatar: "https://i.pravatar.cc/150?img=16", wins: 190, totalGames: 215, winRate: "88.4%", points: 3900 },
                { rank: 4, name: "Oscar Martinez", avatar: "https://i.pravatar.cc/150?img=17", wins: 185, totalGames: 212, winRate: "87.3%", points: 3850 },
                { rank: 5, name: "Pam Beesly", avatar: "https://i.pravatar.cc/150?img=18", wins: 180, totalGames: 210, winRate: "85.7%", points: 3800 },
            ]
        };

        function changeTab(tab) {
            // Update active tab styling
            document.querySelectorAll('button').forEach(btn => {
                btn.classList.remove('text-ludo-blue', 'border-b-2', 'border-ludo-blue', 'font-semibold');
                btn.classList.add('text-gray-500');
            });
            document.getElementById(`${tab}Tab`).classList.add('text-ludo-blue', 'border-b-2', 'border-ludo-blue', 'font-semibold');
            document.getElementById(`${tab}Tab`).classList.remove('text-gray-500');

            // Update leaderboard data
            const leaderboardBody = document.getElementById('leaderboardBody');
            leaderboardBody.innerHTML = ''; // Clear existing rows

            leaderboardData[tab].forEach(player => {
                const row = `
                    <tr class="hover:bg-gray-50 transition duration-300">
                        <td class="py-4 px-4 whitespace-nowrap">${player.rank}</td>
                        <td class="py-4 px-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full mr-3" src="${player.avatar}" alt="${player.name}">
                                <div class="text-sm font-medium text-gray-900">${player.name}</div>
                            </div>
                        </td>
                        <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">${player.wins}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">${player.totalGames}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-500">${player.winRate}</td>
                        <td class="py-4 px-4 whitespace-nowrap text-sm font-medium text-ludo-blue">${player.points}</td>
                    </tr>
                `;
                leaderboardBody.innerHTML += row;
            });
        }

        // Initialize with global leaderboard
        changeTab('global');
    </script>

    </body>
    </html>