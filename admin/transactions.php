
<?php include('sidebar.php'); ?>

          
 

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Transactions Table</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">ID</th>
                    
                    <th class="py-3 px-4 text-left">Type</th>
                    <th class="py-3 px-4 text-left">Amount</th>
                    <th class="py-3 px-4 text-left">Transaction ID</th>
                    <th class="py-3 px-4 text-left">Screenshot</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Time</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $sql = "SELECT * FROM transactions";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $screenshot = ($row['type'] == 'deposit' && !empty($row['screenshot'])) ? "<img src='../backend/" . $row["screenshot"] . "' class='w-12 h-12 rounded-lg shadow-md cursor-pointer' onclick='openModal(\"../backend/" . $row["screenshot"] . "\")'>" : "-";

            $statusColor = match ($row["status"]) {
                "Completed" => "bg-green-100 text-green-800",
                "Pending" => "bg-yellow-100 text-yellow-800",
                "Failed" => "bg-red-100 text-red-800",
                default => "bg-gray-100 text-gray-800",
            };

            echo "<tr class='border-b hover:bg-gray-50'>
                <td class='py-3 px-4'>" . $row["id"] . "</td>                
                <td class='py-3 px-4'>" . $row["type"] . "</td>
                <td class='py-3 px-4 font-semibold'>$" . $row["amount"] . "</td>
                <td class='py-3 px-4 text-blue-500'>" . $row["tid"] . "</td>
                <td class='py-3 px-4'>" . $screenshot . "</td>
                <td class='py-3 px-4'><span class='px-3 py-1 rounded-full text-xs font-semibold " . $statusColor . "'>" . $row["status"] . "</span></td>
                <td class='py-3 px-4'>" . $row["date"] . "</td>
                <td class='py-3 px-4'>" . $row["time"] . "</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='9' class='py-4 px-6 text-center'>No transactions found</td></tr>";
    }
    ?>
</tbody>

        </table>
    </div>
</div>

              



<!-- Modal Structure -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden">
    <div class="relative">
        <span class="absolute top-2 right-2 text-white text-3xl cursor-pointer" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="max-w-full max-h-screen rounded-lg shadow-lg">
    </div>
</div>

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