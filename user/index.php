<?php 
session_start();
if(isset($_SESSION['login_error']))
{
  $msg="Email Id or Password Invalid";
}else{
$msg='';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <!-- component -->
<!-- component -->
<div class="bg-sky-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
<div class="w-1/2 h-screen hidden lg:block">
  <img src="https://img.freepik.com/fotos-premium/imagen-fondo_910766-187.jpg?w=826" alt="Placeholder Image" class="object-cover w-full h-full">
</div>
<!-- Right: Login Form -->
<div class= "lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
  <h1 class="text-2xl font-semibold mb-4">Login</h1>
  <h1 class="text-center text-red-500 font-bold"><?php echo $msg;?></h1>
  <form action="../backend/backend.php" method="post">
    <!-- Username Input -->
    <div class="mb-4 bg-sky-100">
      <label for="username" class="block text-gray-600">Email</label>
      <input type="email" id="username" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="on">
    </div>
    <!-- Password Input -->
    <div class="mb-4">
      <label for="password" class="block text-gray-800">Password</label>
      <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="on">
    </div>
    <!-- Remember Me Checkbox -->
    <div class="mb-4 flex items-center">
      <input type="checkbox" id="remember" name="remember" class="text-red-500">
      <label for="remember" class="text-green-900 ml-2">Remember Me</label>
    </div>
    <!-- Forgot Password Link -->
    <div class="mb-6 text-blue-500">
      <a href="#" class="hover:underline">Forgot Password?</a>
    </div>
    <!-- Login Button -->
    <button type="submit" name="login_user" class="bg-red-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button> 
</form>
  <!-- Sign up  Link -->
  <div class="mt-6 text-green-500 text-center">
    <a href="register.php" class="hover:underline">Sign up Here</a>
  </div>
</div>
</div>

<?php unset($_SESSION['login_error']);?>
</body>
</html>