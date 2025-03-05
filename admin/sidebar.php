<?php
include('../backend/config.php');
if(!isset($_SESSION['aid']))
{
header('Location:index.php');
}
$aid = $_SESSION['aid'];


$sql = "SELECT * from admin WHERE id='$aid' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);




$sqls = "SELECT * FROM acc WHERE id = 1";
$results = $conn->query($sqls);
$rowe = $results->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#10B981',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex flex-col h-screen">


        <div class="flex flex-1 overflow-hidden">
            <!-- Sidebar -->
            <aside class="bg-gray-800 text-white w-64 flex-shrink-0 hidden md:block">
                <div class=" flex flex-row p-4 items-center justify-center space-x-2">
                <img src='../backend/assets/logo.png' 
                            class="size-16"
                            />
                    <h1 class="text-2xl font-bold">Admin Panel</h1>
                </div>
                <nav class="mt-6">
                    <a href="dashboard.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-dashboard-line mr-3 text-lg"></i> Dashboard
                    </a>
                    <a href="recharge.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-user-received-line mr-3 text-lg"></i> Recharge Requests
                    </a>
                    <a href="withdrawal.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-user-received-line mr-3 text-lg"></i> Withdrawal Requests
                    </a>
                    <a href="transactions.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-exchange-dollar-line mr-3 text-lg"></i> Transactions
                    </a>
                    <a href="acc-settings.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-coins-line mr-3 text-lg"></i> Account Settings
                    </a>
                    <a href="admins.php" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                        <i class="ri-gift-line mr-3 text-lg"></i> Admins
                    </a>
                </nav>
            </aside>


              <!-- Main Content -->
              <main class="flex-1 overflow-y-auto bg-gray-100 p-4 lg:p-4 lg:px-8">
                <!-- Navbar -->
                <nav class="bg-white shadow-md rounded-lg">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex-shrink-0 flex items-center">
                                <!-- <img class="h-8 w-auto" src="" alt="Workflow"> -->
                                <h1 class="font-bold">Welcome,<span><?php echo $row['name'] ?></span></h1>
                            </div>
                            <div class="ml-3 relative flex items-center">
                                <div>
                                    <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </button>
                                </div>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right absolute right-0 mt-16 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                                    <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="acc-settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Account-Settings</a>
                                    <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>