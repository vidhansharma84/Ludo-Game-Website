

<?php include('sidebar.php'); ?>

          
 

<div class=" mx-auto my-12 bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Update Account Details</h2>
        
        <form action="../backend/backend.php" method="POST" class="space-y-4">
            <!-- Always updating ID 1 -->
            <input type="hidden" name="id" value="1">

            <div>
                <label class="block text-gray-700 font-semibold">Account Number</label>
                <input type="text" name="acc_no" value="<?php echo $rowe['acc_no']; ?>" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Bank Name</label>
                <input type="text" name="bank_name" value="<?php echo $rowe['bank_name']; ?>" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">IFSC Code</label>
                <input type="text" name="ifsc" value="<?php echo $rowe['ifsc']; ?>" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">UPI ID</label>
                <input type="text" name="upi" value="<?php echo $rowe['upi']; ?>" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">QR Code (URL)</label>
                <input type="text" name="qr" value="<?php echo $rowe['qr']; ?>" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300">
            </div>

            <button type="submit" 
            name="acc_upd"
                    class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">
                Update Account
            </button>
        </form>
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