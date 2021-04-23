<?php 
    session_start();
    $output="";
    include 'db_conn.php';
    $select_users_query=("SELECT * FROM user_info WHERE 1=1");
    $select_users_query_res = mysqli_query($conn,$select_users_query);

    if(mysqli_num_rows($select_users_query_res)==1){
        echo "No user data found";
    }elseif(mysqli_num_rows($select_users_query_res)>0){
        while($row=mysqli_fetch_assoc($select_users_query_res)){

            $row_id = $row['id'];
            $logged_in_user_id = $_SESSION['id'];
            $last_message_query = "SELECT * FROM messages WHERE 
            incoming_msg_id= '$row_id' OR 
            outgoing_msg_id='$row_id' AND 
            (incoming_msg_id='$logged_in_user_id' OR 
            incoming_msg_id='$logged_in_user_id') 
            ORDER BY id desc LIMIT 1";

            // $last_message_query_exec = mysqli_query($conn,$last_message_query);
            // $last_message_query_exec_result = mysqli_fetch_assoc($last_message_query_exec);
            // print_r($last_message_query_exec_result);
            // if(mysqli_num_rows($last_message_query_exec_result)==0){
            //     $last_msg = "No Message Available";
            // }else{
            //     $last_msg = $last_message_query_exec_result;
            // }
                

            $output.='<a href="chat_area.php?userid='.$row['id'].'" class="user-child">
                    <img class="own-img" src="img/user_images/'.$row['image'].'">
                    <div class="name_status">
                        <span class="own-name">'.$row['fname'].' '.$row['lname'].'</span>
                        <span class="own-status user-one-mesans">'.$last_msg.'</span>
                    </div>   
                    <div class="users-status">
                        <i class="fas fa-circle"></i>
                    </div>     
                    </a>';
        }
    }
    echo $output;

    








?>