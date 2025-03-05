<?php
include 'config.php';


include('auth.php');

include('transactions.php');




if(isset($_POST['acc_upd']))
{
    $acc_no = $_POST['acc_no'];
$bank_name = $_POST['bank_name'];
$ifsc = $_POST['ifsc'];
$upi = $_POST['upi'];
$qr = $_POST['qr'];

// Update Query for single row (ID = 1)
$sql = "UPDATE acc SET acc_no='$acc_no', bank_name='$bank_name', ifsc='$ifsc', upi='$upi', qr='$qr' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    header("Location:../admin/dashboard.php");
    
    // echo "<script>alert('Account details updated successfully!'); window.location.href='form_page.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

}
?>