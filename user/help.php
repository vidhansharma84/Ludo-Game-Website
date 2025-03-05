<?php 
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LudoMaster - Help and Support</title>
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
    <style>
        html {
            scroll-padding-top: 80px; /* Adjust this value based on your navbar height */
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <?php include 'navbar.php';?>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Help and Support</h1>

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative">
                <input type="text" placeholder="Search for help..." class="w-full py-3 px-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent shadow-sm">
                <button class="absolute right-3 top-3 text-gray-400 hover:text-ludo-blue transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <a href="#faq" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="bg-ludo-blue bg-opacity-10 rounded-full p-4 mb-4">
                    <i class="fas fa-question-circle text-4xl text-ludo-blue"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">FAQ</h3>
            </a>
            <a href="#game-rules" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="bg-ludo-green bg-opacity-10 rounded-full p-4 mb-4">
                    <i class="fas fa-book text-4xl text-ludo-green"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Game Rules</h3>
            </a>
            <a href="#contact-support" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="bg-ludo-yellow bg-opacity-10 rounded-full p-4 mb-4">
                    <i class="fas fa-headset text-4xl text-ludo-yellow"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Contact Support</h3>
            </a>
            <a href="#account-issues" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-lg transition duration-300 transform hover:-translate-y-1">
                <div class="bg-ludo-red bg-opacity-10 rounded-full p-4 mb-4">
                    <i class="fas fa-user-cog text-4xl text-ludo-red"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Account Issues</h3>
            </a>
        </div>

        <!-- FAQ Section -->
        <div id="faq" class="bg-white rounded-xl shadow-md p-8 mb-12 scroll-mt-20">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Frequently Asked Questions</h2>
            <div class="space-y-6">
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <h3 class="text-lg font-semibold text-gray-700">How do I create an account?</h3>
                        <i class="fas fa-chevron-down text-ludo-blue transition-transform duration-300"></i>
                    </button>
                    <p class="text-gray-600 mt-2 hidden">To create an account, click on the "Sign Up" button in the top right corner of the homepage. Fill in your details, including a valid email address, and follow the verification process.</p>
                </div>
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <h3 class="text-lg font-semibold text-gray-700">How can I add coins to my account?</h3>
                        <i class="fas fa-chevron-down text-ludo-blue transition-transform duration-300"></i>
                    </button>
                    <p class="text-gray-600 mt-2 hidden">You can add coins to your account by visiting the "Coin Management" page. Choose your preferred payment method and follow the instructions to complete the transaction.</p>
                </div>
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <h3 class="text-lg font-semibold text-gray-700">What should I do if I encounter a bug during gameplay?</h3>
                        <i class="fas fa-chevron-down text-ludo-blue transition-transform duration-300"></i>
                    </button>
                    <p class="text-gray-600 mt-2 hidden">If you encounter a bug, please take a screenshot of the issue and contact our support team through the "Contact Support" section below. Provide as much detail as possible about the problem.</p>
                </div>
                <div>
                    <button class="flex justify-between items-center w-full text-left focus:outline-none" onclick="toggleFAQ(this)">
                        <h3 class="text-lg font-semibold text-gray-700">How does the referral system work?</h3>
                        <i class="fas fa-chevron-down text-ludo-blue transition-transform duration-300"></i>
                    </button>
                    <p class="text-gray-600 mt-2 hidden">Our referral system allows you to earn coins by inviting friends. Share your unique referral code with others, and when they sign up and play their first game, both you and your friend will receive bonus coins.</p>
                </div>
            </div>
        </div>

        <!-- Game Rules Section -->
        <div id="game-rules" class="bg-white rounded-xl shadow-md p-8 mb-12 scroll-mt-20">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Game Rules</h2>
            <div class="space-y-4">
                <p class="text-gray-600">LudoMaster follows the classic Ludo rules with some additional features:</p>
                <ul class="list-disc list-inside space-y-2 text-gray-600">
                    <li>Each player has 4 tokens that must be moved from the starting area to the center of the board.</li>
                    <li>Players take turns rolling a die and moving their tokens clockwise around the board.</li>
                    <li>To move a token out of the starting area, you must roll a 6.</li>
                    <li>If you land on a space occupied by an opponent's token, that token is sent back to its starting area.</li>
                    <li>The first player to get all 4 tokens to the center wins the game.</li>
                    <li>Special power-ups may be available in certain game modes, adding extra strategy to the gameplay.</li>
                </ul>
                <p class="text-gray-600 mt-4">For a more detailed explanation of the rules, including special game modes and tournaments, please visit our comprehensive <a href="#" class="text-ludo-blue hover:underline">Game Rules Guide</a>.</p>
            </div>
        </div>

        <!-- Contact Support Section -->
        <div id="contact-support" class="bg-white rounded-xl shadow-md p-8 mb-12 scroll-mt-20">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Contact Support</h2>
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                    <select id="subject" name="subject" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent">
                        <option>Technical Issue</option>
                        <option>Account Problem</option>
                        <option>Billing Question</option>
                        <option>Game Feedback</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-ludo-blue focus:border-transparent"></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-ludo-blue text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 transform hover:-translate-y-1">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Account Issues Section -->
        <div id="account-issues" class="bg-white rounded-xl shadow-md p-8 scroll-mt-20">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Account Issues</h2>
            <div class="space-y-4">
                <p class="text-gray-600">If you're experiencing issues with your account, here are some quick links that might help:</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                        <div class="bg-ludo-blue bg-opacity-10 rounded-full p-2 mr-4">
                            <i class="fas fa-key text-ludo-blue"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Reset Password</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                        <div class="bg-ludo-green bg-opacity-10 rounded-full p-2 mr-4">
                            <i class="fas fa-envelope text-ludo-green"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Verify Email Address</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                        <div class="bg-ludo-red bg-opacity-10 rounded-full p-2 mr-4">
                            <i class="fas fa-ban text-ludo-red"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Report a Bug</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                        <div class="bg-ludo-yellow bg-opacity-10 rounded-full p-2 mr-4">
                            <i class="fas fa-shield-alt text-ludo-yellow"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Account Security</span>
                    </a>
                </div>
                <p class="text-gray-600 mt-4">If you need further assistance, please don't hesitate to contact our support team using the form above.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-xl font-semibold mb-4">LudoMaster</h3>
                    <p class="text-gray-400">The ultimate online Ludo gaming experience.</p>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Play Now</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Leaderboard</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Help & Support</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="w-full md:w-1/4">
                    <h4 class="text-lg font-semibold mb-4">Download Our App</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">
                            <i class="fab fa-apple mr-2"></i> App Store
                        </a>
                        <a href="#" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">
                            <i class="fab fa-google-play mr-2"></i> Google Play
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2023 LudoMaster. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleFAQ(element) {
            const answer = element.nextElementSibling;
            const icon = element.querySelector('i');
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>