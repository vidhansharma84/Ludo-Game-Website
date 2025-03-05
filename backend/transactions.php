<?php 


if (isset($_POST['recharge'])) {

    // Get form data
    $uid = isset($_POST['recharge']) ? trim($_POST['recharge']) : "";
    $amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    $tid = isset($_POST['tid']) ? trim($_POST['tid']) : "";

    // Validate input
    if (empty($uid) || empty($tid) || $amount < 100) {
        die("Invalid input! Please enter correct details.");
    }

    // File upload handling
    $uploadDir = "uploads/"; // Directory for screenshots
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = $_FILES["screenshot"]["name"];
    $fileTmp = $_FILES["screenshot"]["tmp_name"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

    if (!in_array($fileExt, $allowedExtensions)) {
        die("Invalid file format! Only JPG, JPEG, PNG, and GIF are allowed.");
    }

    // Generate unique file name
    $newFileName = time() . "_" . uniqid() . "." . $fileExt;
    $targetFilePath = $uploadDir . $newFileName;

    if (!move_uploaded_file($fileTmp, $targetFilePath)) {
        die("File upload failed!");
    }

    

       
            // Store recharge details in transactions table
            $insertQuery = "INSERT INTO transactions (uid,type, amount, tid, screenshot,status) VALUES ('$uid','deposit', '$amount', '$tid', '$targetFilePath','pending')";
           $result= mysqli_query($conn, $insertQuery);

           $_SESSION['recharge_request']=1;
           header('Location:../user/coin.php');
        
    
}



if (isset($_POST['withdraw'])) {
    $uid=$_POST['withdraw'];
    $amount = intval($_POST['withdrawAmount']);
    $paymentMethod = trim($_POST['paymentMethod']);
    $accountDetails = trim($_POST['accountDetails']);

    // Validate input
    if ( empty($paymentMethod) || empty($accountDetails)) {
        die("Invalid input! Ensure all fields are filled and the amount is at least 1000.");
    }
    
    // Check user wallet balance
   
    // Insert withdrawal request into transactions table
    $withdrawQuery = "INSERT INTO transactions (uid, type, amount, tid, screenshot, status) 
                      VALUES ('$uid', 'withdrawal', '$amount', '$paymentMethod', '$accountDetails', 'pending')";
    
    if (mysqli_query($conn, $withdrawQuery)) {
        // echo "Withdrawal request submitted successfully!";
        header('Location:../user/coin.php');
    } else {
        echo "Error processing withdrawal: " . mysqli_error($conn);
    }

}


if(isset($_POST['process']))
{
    $tid=$_POST['process'];
    
    $sql="SELECT * from transactions where id='$tid'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    $uid=$rows['uid'];


  
    // Check if the user exists in wallet table
    $sql = "SELECT * FROM wallet WHERE uid = '$uid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if($rows['type']=='deposit')
        {
        $total = $row['balance'] + $rows['amount'];
        echo $total;
    }else{
        $total = $row['balance'] - $rows['amount'];
    }
        // Update wallet balance
        $updateQuery = "UPDATE wallet SET balance='$total' WHERE uid='$uid'";
        $updateRes = mysqli_query($conn, $updateQuery);


    $update="UPDATE transactions SET status='success' WHERE id='$tid'";
    $updateResult = mysqli_query($conn, $update);

    


    if($updateResult==true)
    {
        header('Location:../admin/dashboard.php');
    }else{
        header('Location:../admin/dashboard.php');
    }
}
}


?>