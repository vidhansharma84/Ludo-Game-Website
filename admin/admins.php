

<?php include('sidebar.php'); ?>

          
 

<div class=" mx-auto my-12 bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Add Admin</h2>
        
        <form action="../backend/backend.php" method="POST" class="space-y-4">
            

            <div>
                <label class="block text-gray-700 font-semibold">Admin Name</label>
                <input type="text" name="name" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="text" name="email"  
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Password</label>
                <input type="text" name="password" 
                       class="w-full p-2 border rounded-md focus:ring-blue-300" required>
            </div>          

          

            <button type="submit" 
            name="create_admin"
                    class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">
                Update Account
            </button>
        </form>
    </div>
              



    <!-- component -->
<div class="text-gray-900 bg-gray-200">
    <div class="p-4 flex">
        <h1 class="text-3xl">
           Admins
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th></th>
                </tr>              

<?php 
$sql="SELECT * from admin";
$result=mysqli_query($conn,$sql);

$present=mysqli_num_rows($result);
if($present>0){
    while($row=mysqli_fetch_assoc($result)){
        ?>
        
        <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5"><h1><?php echo $row['name'];?></h1></td>
                    <td class="p-3 px-5"><h1><?php echo $row['email'];?> </h1></td>
                    <td class="p-3 px-5"><h1>admin</h1></td>
                    <td class="p-3 px-5 flex justify-end"><form action="../backend/backend.php" method="post"><button type="submit" name="delete_admin" value="<?php echo $row['id'];?>" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></form></td>
                </tr>

                <?php }}else{ ?>

                    <?php }?>
               
            </tbody>
        </table>
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