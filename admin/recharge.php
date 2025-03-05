

<?php include('sidebar.php'); ?>

          
 

                <!-- User Requests -->
                <section id="requests" class="mt-8 lg:mt-12">
                    <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-gray-800">Recharge Requests</h2>
                    <div class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction Id</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <form action='../backend/backend.php' method="post">
                                    <?php
                                    $query = "SELECT * FROM transactions WHERE  status='pending' and type='deposit'";
                                    $result = mysqli_query($conn, $query);
                                    $present = mysqli_num_rows($result);
                                    if ($present > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900"><?php echo $row['tid']; ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Recharge
                                                    </span>
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $row['amount']; ?></td>
                                                <td class="px-4 py-4 whitespace-nowrap">

                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                                    <button
                                                        type="submit"
                                                        name="process"
                                                        value="<?php echo $row['id']; ?>"
                                                        class="bg-primary hover:bg-primary-dark text-white font-bold py-1 px-3 lg:py-2 lg:px-4 rounded transition duration-300 ease-in-out transform hover:scale-105">
                                                        Process
                                                    </button>
                                                </td>
                                            </tr>

                                        <?php }
                                    } else {
                                        ?>
                                    <?php } ?>
                                </form>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </section>


              






<!-- JavaScript -->
<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>






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