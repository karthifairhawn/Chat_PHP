<?php
    session_start();
    if(isset($_SESSION['id'])){
        include "db_conn.php";
        $logout_id = mysqli_real_escape_string($conn,$_GET['user_id']);
        echo $logout_id;
        if(isset($logout_id)){
            $status = "Offline";
            $sql = mysqli_query($conn, "UPDATE user_info SET a_status='$status' WHERE id='$logout_id'");
            if($sql){
                session_start();
                session_destroy();
                header("Location: ../index.php");
            }else{
                echo "Error".mysqli_error($sql);
            }
        }

    }else{
        header('Location: ../index.php');
    }








?>