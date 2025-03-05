<?php 


// Check if register button was clicked
if (isset($_POST['register_user'])) {

    // Get form data
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $refer_code = isset($_POST['refer_code']) ? trim($_POST['refer_code']) : null;

    // Check if email already exists
    $checkEmail = "SELECT id FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        echo "Error: Email already registered!";
        exit;
    }

    // Generate unique referral code
    $generated_code = strtoupper(substr(md5(uniqid($email, true)), 0, 8)); // Example: A1B2C3D4

    // Check if referral code was provided and find referrer
    $referred_by = NULL;
    if (!empty($refer_code)) {
        $checkReferrer = "SELECT id FROM user WHERE code='$refer_code'";
        $refResult = mysqli_query($conn, $checkReferrer);
        
        if (mysqli_num_rows($refResult) > 0) {
            $refRow = mysqli_fetch_assoc($refResult);
            $referred_by = $refRow['id']; // Store the referring user's ID
        }
    }

    // Hash password securely
    $hashed_password = md5($password);

    // Insert new user
    $sql = "INSERT INTO user (name, email, password, status, code, referred_by) 
            VALUES ('$name', '$email', '$hashed_password', '1', '$generated_code', '$referred_by')";
    
    $insertResult = mysqli_query($conn, $sql);

    if ($insertResult) {
        $query="SELECT * FROM user WHERE email = '$email'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
        $uid=$row['id'];

        $making_wallet="INSERT INTO wallet (uid,balance)VALUES('$uid', '$balance')";
        $result=mysqli_query($conn,$making_wallet);

        if($result==true)
        {
        header('Location: ../user/index.php');
        }else{
            echo "wallet creation error";
        }
        exit;
    } else {
        header('Location: ../user/register.php');
        exit;
    }
}


if(isset($_POST['login_user']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=md5($password);

    $sql="SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn,$sql);
    $present=mysqli_num_rows($result);

    if($present>0)
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['uid']=$row['id'];
        header('Location:../user/dashboard.php');
    }
    else
    {
        $_SESSION['login_error']='1';
        header('Location:../user/index.php');
    }

}





if(isset($_POST['login_admin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=md5($password);

    $sql="SELECT * FROM admin WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn,$sql);
    $present=mysqli_num_rows($result);

    if($present>0)
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['aid']=$row['id'];
        header('Location:../admin/dashboard.php');
    }
    else
    {
        $_SESSION['admin_login_error']='1';
        header('Location:../admin/index.php');
    }

}


if(isset($_POST['create_admin']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $password=md5($pass);

    $sql="INSERT INTO admin (name,email,password,status)VALUES('$name','$email','$password','1')";
    $result=mysqli_query($conn,$sql);

    if($result==true)
    {
        header('Location:../admin/admins.php');
    }else{
        echo "something went wrong";
    }

    
}



if(isset($_POST['delete_admin']))
{
    $id=$_POST['delete_admin'];

    $delete="DELETE FROM admin WHERE id='$id'";
    $result=mysqli_query($conn,$delete);
    if($result==true)
    {
        header('Location:../admin/admins.php');
        }else{
            echo "something went wrong";
            }
}
?>