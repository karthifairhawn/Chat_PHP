<?php
    // echo $_POST['outgoing_id'].$_POST['incoming_id'].$_POST['message'];
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location:index.php');
    }else{
        include 'db_conn.php';
        $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST['message']);
        if(!empty($message)){
            $store_message = "INSERT INTO messages(incoming_msg_id,outgoing_msg_id,message) VALUES ('$incoming_id','$outgoing_id','$message')";
            mysqli_query($conn,$store_message);
            
        }
    }
?>