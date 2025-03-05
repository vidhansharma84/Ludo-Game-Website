

<?php include('sidebar.php'); ?>

          
                <!-- Dashboard -->
                <section id="dashboard" class="my-4">
                    <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-gray-800">Dashboard</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 border-l-4 border-primary">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-primary rounded-full p-3">
                                    <i class="ri-user-received-line text-white text-xl lg:text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-base lg:text-lg font-semibold text-gray-600">Pending Requests</h3>
                                    <?php
                                    $prequest = "SELECT * FROM transactions WHERE status='pending';";
                                    $res = mysqli_query($conn, $prequest);
                                    $pending = mysqli_num_rows($res);

                                    ?>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-800"><?php echo $pending ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 border-l-4 border-secondary">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-secondary rounded-full p-3">
                                    <i class="ri-exchange-dollar-line text-white text-xl lg:text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <?php
                                    $prequest = "SELECT * FROM transactions ";
                                    $res = mysqli_query($conn, $prequest);
                                    $tot = mysqli_num_rows($res);

                                    ?>
                                    <h3 class="text-base lg:text-lg font-semibold text-gray-600">Total Transactions</h3>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-800"><?php echo $tot; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 border-l-4 border-yellow-500">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-yellow-500 rounded-full p-3">
                                    <i class="ri-coins-line text-white text-xl lg:text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <?php
                                    $prequest = "SELECT SUM(balance) AS total_coins FROM wallet";
                                    $res = mysqli_query($conn, $prequest);
                                    $row = mysqli_fetch_assoc($res); // Fetch the sum value
                                    $total_coins = $row['total_coins'] ?? 0; // Default to 0 if no data
                                    ?>
                                    <h3 class="text-base lg:text-lg font-semibold text-gray-600">Total Coins</h3>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-800"><?php echo number_format($total_coins); ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-4 lg:p-6 border-l-4 border-purple-500">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                                    <i class="ri-gift-line text-white text-xl lg:text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <?php
                                    $prequest = "SELECT * FROM user";
                                    $res = mysqli_query($conn, $prequest);
                                    $users = mysqli_num_rows($res);

                                    ?>
                                    <h3 class="text-base lg:text-lg font-semibold text-gray-600">Total Users</h3>
                                    <p class="text-2xl lg:text-3xl font-bold text-gray-800"><?php echo $users ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

  

                

                









            </main>
        </div>
    </div>

    <script>
        // Toggle user menu
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });

        // Close the menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>