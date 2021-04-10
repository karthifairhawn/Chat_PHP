<?php 



include 'db_conn.php';
$ot_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
$in_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);

$query ="SELECT * FROM messages WHERE (incoming_msg_id='$in_id' AND outgoing_msg_id='$ot_id') OR  (incoming_msg_id='$ot_id' AND outgoing_msg_id='$in_id')";
$output=[];
include 'db_conn.php';
$messages = mysqli_query($conn,$query);
if(mysqli_num_rows($messages>0)){}
    while ($row = mysqli_fetch_assoc($messages)){
        if($row['incoming_msg_id']==$in_id){}
            $output.=$row;
    }else{
        $output.=$row;
    }
    }
    print_r($output);
?>