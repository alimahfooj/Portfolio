<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost","root","","portfolio_db");

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

$name    = $_POST['name'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO contact_form (name,email,subject,message) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$name,$email,$subject,$message);

if($stmt->execute()){
    echo "Message Sent Successfully 😊";
}else{
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
